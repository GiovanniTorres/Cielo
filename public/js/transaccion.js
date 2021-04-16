function main () {
  accion = "mostrar"
  getVenta (accion)
  
  const lista_articulos = document.getElementById ("lista_articulos")
  lista_articulos.addEventListener ('click', 
  function (e) {
    e.preventDefault ()
    if (e.target.classList.contains ('comprar')) {
      const producto = e.target.parentElement.parentElement
      getVenta (accion = "insertar", producto);
    }
  });
}

function AJAXObject () {
  if (window.XMLHttpRequest) {
    return new XMLHttpRequest ()
  } else if (window.ActiveXObject) {
    return new ActiveXObject ("Microsoft.XMLHTTP")
  }
}

function getVenta (accion, producto) {
  let usuario = document.getElementById ("usuario").dataset.id
  ajaxGetVenta = AJAXObject ()
  ajaxGetVenta.onreadystatechange = function () {
    if (ajaxGetVenta.readyState == 4) {
      if (ajaxGetVenta.status == 200) {
        document.getElementById ("id_venta").innerHTML = ajaxGetVenta.responseText
        idVentas = document.getElementById ("idVentas").dataset.id
        document.getElementById ("idventa").innerHTML = idVentas
        ventacuentas = document.getElementById ("countventas").dataset.id
        status = document.getElementById ("status").dataset.id
        if (accion === "mostrar") {
          let idArticulo = null
          let precio = null
          getCarrito (idVentas, idArticulo, precio)
        }
        if (accion === "insertar") {
          if (status != "Pendiente") {
            setVenta (usuario, ventacuentas, status, producto)
          } 
          if (status === "Pendiente") {
            obtenerInformacionProducto (idVentas, producto)
          }
        }
      } 
      else {
        console.log ("El servidor no contestó/nError "+ajaxGetVenta.status+": "+ajaxGetVenta.statusText)
      }
    }
  }
  ajaxGetVenta.open ("POST", "http://localhost/getters/getVentaAjax.php",true)
  ajaxGetVenta.setRequestHeader ("Content-Type", "application/x-www-form-urlencoded")
  ajaxGetVenta.send ("usuario="+usuario)
}

function setVenta (usuario, ventacuentas, status, producto) {
  ajaxSetVenta = AJAXObject ()
  ajaxSetVenta.onreadystatechange = function () {
    if (ajaxSetVenta.readyState == 4) {
      if (ajaxSetVenta.status == 200) {
        document.getElementById ("id_venta").innerHTML = ajaxSetVenta.responseText
        getVenta (accion = "insertar", producto)
      } else {
        console.log ("El servidor no contestó/nError "+ajaxSetVenta.status+": "+ajaxSetVenta.statusText)
      }
    }
  }
  ajaxSetVenta.open ("POST", "http://localhost/setters/setVentaAjax.php",true)
  ajaxSetVenta.setRequestHeader ("Content-Type", "application/x-www-form-urlencoded")
  ajaxSetVenta.send ("usuario="+usuario+"&&ventacuentas="+ventacuentas+"&&status="+status)
}

function getCarrito (idVentas, idArticulo, precio) {
  ajaxGetTablaCarrito = AJAXObject ()
  ajaxGetTablaCarrito.onreadystatechange = function () {
    if (ajaxGetTablaCarrito.readyState == 4) {
      if (ajaxGetTablaCarrito.status == 200) {
        document.getElementById ("disp").innerHTML = ajaxGetTablaCarrito.responseText
        analizado = document.getElementById ("analizado").dataset.id
        if (analizado == 1 ) {
          idCarrito = document.getElementById ('idCarrito').dataset.id
          cantidad = document.getElementById ('cantidad').dataset.id
          precio = document.getElementById ('precio').dataset.id
          setTransaccion (idCarrito, idArticulo, idVentas, cantidad, precio)
        }
      } else {
      console.log ("El servidor no contestó/nError "+ajaxGetTablaCarrito.status+": "+ajaxGetTablaCarrito.statusText)
      }
    }
  }
  ajaxGetTablaCarrito.open ("POST", "http://localhost/getters/getCarritoAJAX.php",true)
  ajaxGetTablaCarrito.setRequestHeader ("Content-Type", "application/x-www-form-urlencoded")
  ajaxGetTablaCarrito.send ("idVentas="+idVentas+"&&idArticulo="+idArticulo+"&&precio="+precio)
}

function obtenerInformacionProducto (idVentas, producto) {
  const objeto_articulo = {
    arprecio: producto.querySelector ('.precio_ar').dataset.id,
    id_producto: producto.querySelector ('.id_producto').dataset.id
  }
  let precio = objeto_articulo.arprecio
  let idArticulo = objeto_articulo.id_producto
  getCarrito (idVentas, idArticulo, precio)
}

function setTransaccion (idCarrito, idArticulo, idVentas, cantidad, precio) {
  ajaxSetTransaccion = AJAXObject ()
  ajaxSetTransaccion.onreadystatechange = function () {
    if (ajaxSetTransaccion.readyState == 4) {
      if (ajaxSetTransaccion.status == 200) {
        document.getElementById ("disp").innerHTML = ajaxSetTransaccion.responseText
        main (accion="mostrar")
      } else {
        console.log ("El servidor no contestó/nError "+ajaxSetTransaccion.status+": "+ajaxSetTransaccion.statusText)
      }
    }
  }
  ajaxSetTransaccion.open ("POST", "http://localhost/setters/setTransaccionAjax.php",true)
  ajaxSetTransaccion.setRequestHeader ("Content-Type", "application/x-www-form-urlencoded")
  ajaxSetTransaccion.send ("idCarrito="+idCarrito+"&&idArticulo="+idArticulo+"&&idVentas="+idVentas+"&&cantidad="+cantidad+"&&precio="+precio)
}

window.addEventListener ("load", main)