function condiciones () {
  const objeto_articulo = {
    id_producto: 0
  }
  let articulo_seleccionado = objeto_articulo.id_producto
  obtenerTablaCarrito (articulo_seleccionado)
}

function AJAXObject () {
  if (window.XMLHttpRequest) {
    return new XMLHttpRequest ()
  } else if (window.ActiveXObject) {
    return new ActiveXObject ("Microsoft.XMLHTTP")
  }
}

function obtenerTablaCarrito (articulo_seleccionado) {
  usuario = document.getElementById ("usuarioname").textContent
  ajaxGetTabla = AJAXObject ()
  ajaxGetTabla.onreadystatechange = function () {
    if (ajaxGetTabla.readyState == 4) {
      if (ajaxGetTabla.status == 200) {
        document.getElementById ("disp").innerHTML = ajaxGetTabla.responseText
        existencia = document.getElementById ("exist").dataset.id
        //alert (existencia)

        if (existencia == 1) {
          dni_art = document.getElementById ("dni_art").dataset.id
          articulo_seleccionado = document.getElementById ("articulo_seleccionado").dataset.id
          cantidad = document.getElementById ("cantidad").dataset.id
          //alert ("modifica")
          setTransaccion (dni_art, articulo_seleccionado, cantidad)
        } else {
          dni_art = document.getElementById ("dni_art").dataset.id
          articulo_seleccionado = document.getElementById ("articulo_seleccionado").dataset.id
          cantidad = document.getElementById ("cantidad").dataset.id
          //alert ("inserta")
          setTransaccion (dni_art, articulo_seleccionado, cantidad)
        }


      } else {
      console.log ("El servidor no contestó/nError "+ajaxGetTabla.status+": "+ajaxGetTabla.statusText)
      }
    }
  }
  ajaxGetTabla.open ("POST", "http://localhost/getters/getCarritoAJAX.php",true)
  ajaxGetTabla.setRequestHeader ("Content-Type", "application/x-www-form-urlencoded")
  ajaxGetTabla.send ("usuario="+usuario+"&&articulo_seleccionado="+articulo_seleccionado)
  
  const lista_articulos = document.getElementById ("lista_articulos")
  lista_articulos.addEventListener ('click', seleccionarProducto )
  
}

function seleccionarProducto (e) {
  e.preventDefault ()
  if (e.target.classList.contains ('comprar')) {
    const producto = e.target.parentElement.parentElement
    obtenerInformacionProducto (producto)
  }
  //alert ("Haz seleccionado un articulo")
}

function obtenerInformacionProducto (producto) {
  const objeto_articulo = {
    id_producto: producto.querySelector ('.id_producto').textContent
  }
  let articulo_seleccionado = objeto_articulo.id_producto

  obtenerTablaCarrito (articulo_seleccionado)
}

function setTransaccion (dni_art, articulo_seleccionado, cantidad) {
  //alert ("DniCarrito: "+dni_art+", ArticuloSeleccionado: "+articulo_seleccionado+", Cantidad: "+cantidad)
  
  usuarionombre = document.getElementById ("usuarioname").dataset.id
  ajaxSetTransaccion = AJAXObject ()
  ajaxSetTransaccion.onreadystatechange = function () {
    if (ajaxSetTransaccion.readyState == 4) {
      if (ajaxSetTransaccion.status == 200) {
        document.getElementById ("disp").innerHTML = ajaxSetTransaccion.responseText
        condiciones ()
      } else {
        console.log ("El servidor no contestó/nError "+ajaxSetTransaccion.status+": "+ajaxSetTransaccion.statusText)
      }
    }
  }
  ajaxSetTransaccion.open ("POST", "http://localhost/setters/setTransaccionAjax.php",true)
  ajaxSetTransaccion.setRequestHeader ("Content-Type", "application/x-www-form-urlencoded")
  ajaxSetTransaccion.send ("dni_art="+dni_art+"&&articulo_seleccionado="+articulo_seleccionado+"&&usuarionombre="+usuarionombre+"&&cantidad="+cantidad)


  comprobarExistencia (articulo_seleccionado)
  obtenerTablaCarrito ()
}









window.addEventListener ("load", condiciones)