function AJAXObject () {
  if (window.XMLHttpRequest) {
    return new XMLHttpRequest ()
  } else if (window.ActiveXObject) {
    return new ActiveXObject ("Microsoft.XMLHTTP")
  }
}

function obtenerTablaCarrito () {
  usuario = document.getElementById ("usuarioname").textContent
  ajaxGetTabla = AJAXObject ()
  ajaxGetTabla.onreadystatechange = function () {
    if (ajaxGetTabla.readyState == 4) {
      if (ajaxGetTabla.status == 200) {
        document.getElementById ("disp").innerHTML = ajaxGetTabla.responseText
      } else {
      console.log ("El servidor no contestó/nError "+ajaxGetTabla.status+": "+ajaxGetTabla.statusText)
      }
    }
  }
  ajaxGetTabla.open ("POST", "http://localhost/getters/getCarritoAJAX.php",true)
  ajaxGetTabla.setRequestHeader ("Content-Type", "application/x-www-form-urlencoded")
  ajaxGetTabla.send ("nombre_usuario="+usuario+"&&accion=mostrar")
  const lista_articulos = document.getElementById ("lista_articulos")
  lista_articulos.addEventListener ('click', seleccionarProducto )
}

function seleccionarProducto (e) {
  e.preventDefault ()
  if (e.target.classList.contains ('comprar')) {
    const producto = e.target.parentElement.parentElement
    obtenerInformacionProducto (producto)
  }
}
  
function obtenerInformacionProducto (producto) {
  const objeto_articulo = {
    dni: 1,
    id_producto: producto.querySelector ('.id_producto').textContent
  }
  let objeto_articulo_id = objeto_articulo.id_producto
  comprobarExistencia (objeto_articulo_id)
}

function comprobarExistencia (objeto_articulo_id) {
  alert ("comprobar")
  usuario = document.getElementById ("usuarioname").textContent
  ajaxGetTabla = AJAXObject ()
  ajaxGetTabla.onreadystatechange = function () {
   if (ajaxGetTabla.readyState == 4) {
     if (ajaxGetTabla.status == 200) {
      document.getElementById ("disp").innerHTML = ajaxGetTabla.responseText
      existencia = document.getElementById ("exist").dataset.id
      if (existencia === '1' ) {
        //alert ("El articulo ya existe")
        modificarCantidades (objeto_articulo_id)
      } else {
        alert ("insertar")
        AJAXSetTransaccion (objeto_articulo_id)
      }
     } else {
     console.log ("El servidor no contestó/nError "+ajaxGetTabla.status+": "+ajaxGetTabla.statusText)
     }
   }
 }
 ajaxGetTabla.open ("POST", "http://localhost/getters/getCarritoAJAX.php",true)
 ajaxGetTabla.setRequestHeader ("Content-Type", "application/x-www-form-urlencoded")
 ajaxGetTabla.send ("nombre_usuario="+usuario+"&&accion=verificar&&objeto_seleccionado="+objeto_articulo_id)
}

function modificarCantidades (objeto_articulo_id) {
  alert ("Modificar cantidades we")
  usuasrionombre = document.getElementById ("usuarioname").dataset.id
  ajaxSetTransaccion = AJAXObject ()
  ajaxSetTransaccion.onreadystatechange = function () {
    if (ajaxSetTransaccion.readyState == 4) {
      if (ajaxSetTransaccion.status == 200) {
        document.getElementById ("disp").innerHTML = ajaxSetTransaccion.responseText
      } else {
        console.log ("El servidor no contestó/nError "+ajaxSetTransaccion.status+": "+ajaxSetTransaccion.statusText)
      }
    }
  }
  ajaxSetTransaccion.open ("POST", "http://localhost/setters/setTransaccionAjax.php",true)
  ajaxSetTransaccion.setRequestHeader ("Content-Type", "application/x-www-form-urlencoded")
  ajaxSetTransaccion.send ("setAccion=modificar&&objeto_articulo="+objeto_articulo_id+"&& usuarionombre="+usuasrionombre)
}

function AJAXSetTransaccion (objeto_articulo_id) {
  alert ("enviar")
  usuasrionombre = document.getElementById ("usuarioname").dataset.id
  ajaxSetTransaccion = AJAXObject ()
  ajaxSetTransaccion.onreadystatechange = function () {
    if (ajaxSetTransaccion.readyState == 4) {
      if (ajaxSetTransaccion.status == 200) {
        existencia = document.getElementById ("exist").dataset.id
        document.getElementById ("disp").innerHTML = ajaxSetTransaccion.responseText
      } else {
      console.log ("El servidor no contestó/nError "+ajaxSetTransaccion.status+": "+ajaxSetTransaccion.statusText)
      }
    }
  }
  ajaxSetTransaccion.open ("POST", "http://localhost/setters/setTransaccionAjax.php",true)
  ajaxSetTransaccion.setRequestHeader ("Content-Type", "application/x-www-form-urlencoded")
  ajaxSetTransaccion.send ("setAccion=insertar&&objeto_articulo="+objeto_articulo_id+"&& usuarionombre="+usuasrionombre)
  obtenerTablaCarrito ()
}

window.addEventListener ("load", obtenerTablaCarrito)