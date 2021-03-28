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
    ajaxGetTabla.send ("accion=mostrar&&nombre_usuario="+usuario)
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
    let articulo_seleccionado = objeto_articulo.id_producto
    comprobarExistencia (articulo_seleccionado)
  }
  
  function comprobarExistencia (articulo_seleccionado) {
    alert ("comprobar")
    usuario = document.getElementById ("usuarioname").textContent
    ajaxGetTabla = AJAXObject ()
    ajaxGetTabla.onreadystatechange = function () {
     if (ajaxGetTabla.readyState == 4) {
       if (ajaxGetTabla.status == 200) {
        document.getElementById ("disp").innerHTML = ajaxGetTabla.responseText
        existencia = document.getElementById ("exist").dataset.id
        if (existencia === '1' ) {
          alert ("El articulo ya existe")
          modificarCantidades (articulo_seleccionado)
          
        } else {
          alert ("insertar")
          AJAXSetTransaccion (articulo_seleccionado)
        }
       } else {
       console.log ("El servidor no contestó/nError "+ajaxGetTabla.status+": "+ajaxGetTabla.statusText)
       }
     }
   }
   ajaxGetTabla.open ("POST", "http://localhost/getters/getCarritoAJAX.php",true)
   ajaxGetTabla.setRequestHeader ("Content-Type", "application/x-www-form-urlencoded")
   ajaxGetTabla.send ("nombre_usuario="+usuario+"&&accion=verificar&&articulo_seleccionado="+articulo_seleccionado)
  }
  
  function modificarCantidades (articulo_seleccionado) {
    alert ("Modificar cantidades we")
    cantidad = document.getElementById ("cantidad").textContent
    dni_arti = document.getElementById ("dni_arti").dataset.id
    alert ("id: "+dni_arti)
    alert ("Cantidad: "+cantidad)
   
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
    ajaxSetTransaccion.send ("setAccion=modificar&&articulo_seleccionado="+articulo_seleccionado+"&& usuarionombre="+usuasrionombre+"&&dni_arti="+dni_arti+"&&cantidad="+cantidad)
    obtenerTablaCarrito ()
  }
  
  function AJAXSetTransaccion (articulo_seleccionado) {
    alert ("enviar")
    existencia = document.getElementById ("exist").dataset.id
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
    ajaxSetTransaccion.send ("setAccion=insertar&&articulo_seleccionado="+articulo_seleccionado+"&& usuarionombre="+usuasrionombre)
    comprobarExistencia (articulo_seleccionado)
    obtenerTablaCarrito ()
  }
  


  
  window.addEventListener ("load", obtenerTablaCarrito)