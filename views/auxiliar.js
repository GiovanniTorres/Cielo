function condiciones () {
  let idArticulo = null
  let precio = null
  let usuario = document.getElementById ("usuario").dataset.id
  getCarrito (idArticulo, precio, usuario)
}

function AJAXObject () {
  if (window.XMLHttpRequest) {
    return new XMLHttpRequest ()
  } else if (window.ActiveXObject) {
    return new ActiveXObject ("Microsoft.XMLHTTP")
  }
}

function getCarrito (idArticulo, precio, usuario) {
  ajaxGetTablaCarrito = AJAXObject ()
  ajaxGetTablaCarrito.onreadystatechange = function () {
    if (ajaxGetTablaCarrito.readyState == 4) {
      if (ajaxGetTablaCarrito.status == 200) {
        document.getElementById ("disp").innerHTML = ajaxGetTablaCarrito.responseText
        status = document.getElementById ("status").dataset.id
        analizado = document.getElementById ("analizado").dataset.id
        if (analizado == 1 ) {
          idCarrito = document.getElementById ('idCarrito').dataset.id
          cantidad = document.getElementById ('cantidad').dataset.id
          precio = document.getElementById ('precio').dataset.id
          if (status != "Pendiente") {
            alert("usuario: "+usuario+"\status: "+status+"\nidArticulo: "+idArticulo+"\ncantidad: "+cantidad)
            setVenta (usuario)
          }
          if (status === "Pendiente") {
            setTransaccion (usuario, idCarrito, idArticulo, cantidad, precio)
          }
        }
        total = document.getElementById ('tottal').dataset.id
        iva = (total * .016)
        iva2Decimales = iva.toFixed (2)
        subtotal = Number(total) - Number(iva2Decimales)
        document.getElementById ("subtotal").innerHTML = subtotal
        document.getElementById ("iva").innerHTML = iva2Decimales
        document.getElementById ("total").innerHTML = total
      } else {
      console.log ("El servidor no contestó/nError "+ajaxGetTablaCarrito.status+": "+ajaxGetTablaCarrito.statusText)
      }
    }
  }
  ajaxGetTablaCarrito.open ("POST", "http://localhost/getters/getCarritoAJAX.php",true)
  ajaxGetTablaCarrito.setRequestHeader ("Content-Type", "application/x-www-form-urlencoded")
  ajaxGetTablaCarrito.send ("usuario="+usuario+"&&idArticulo="+idArticulo+"&&precio="+precio)
  const lista_articulos = document.getElementById ("lista_articulos")
  lista_articulos.addEventListener ('click', seleccionarProducto )
}

function seleccionarProducto (e) {
  e.preventDefault ()
  if (e.target.classList.contains ('comprar')) {
    const producto = e.target.parentElement.parentElement
    getVenta ()
    obtenerInformacionProducto (producto)
  }
}

function obtenerInformacionProducto (producto) {
  const objeto_articulo = {
    arprecio: producto.querySelector ('.precio_ar').dataset.id,
    id_producto: producto.querySelector ('.id_producto').dataset.id
  }
  let precio = objeto_articulo.arprecio
  let idArticulo = objeto_articulo.id_producto
  getCarrito (idArticulo, precio)
}

function setTransaccion (usuario, idCarrito, idArticulo, cantidad, precio) {
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
  ajaxSetTransaccion.send ("usuario="+usuario+"&&idCarrito="+idCarrito+"&&idArticulo="+idArticulo+"&&cantidad="+cantidad+"&&precio="+precio)
}

function getVenta () {
  usuario = document.getElementById ("usuario").dataset.id
  ajaxGetVenta = AJAXObject ()
  ajaxGetVenta.onreadystatechange = function () {
    if (ajaxGetVenta.readyState == 4) {
      if (ajaxGetVenta.status == 200) {
        document.getElementById ("id_venta").innerHTML = ajaxGetVenta.responseText
      } else {
        console.log ("El servidor no contestó/nError "+ajaxGetVenta.status+": "+ajaxGetVenta.statusText)
      }
    }
  }
  ajaxGetVenta.open ("POST", "http://localhost/getters/getVentaAjax.php",true)
  ajaxGetVenta.setRequestHeader ("Content-Type", "application/x-www-form-urlencoded")
  ajaxGetVenta.send ("usuario="+usuario)
}

function setVenta () {
  alert ("Set Venta")
  /*ajaxSetVenta = AJAXObject ()
  ajaxSetVenta.onreadystatechange = function () {
    if (ajaxSetVenta.readyState == 4) {
      if (ajaxSetVenta.status == 200) {
        document.getElementById ("id_venta").innerHTML = ajaxSetVenta.responseText
      } else {
        console.log ("El servidor no contestó/nError "+ajaxSetVenta.status+": "+ajaxSetVenta.statusText)
      }
    }
  }
  ajaxSetVenta.open ("POST", "http://localhost/setters/setVentaAjax.php",true)
  ajaxSetVenta.setRequestHeader ("Content-Type", "application/x-www-form-urlencoded")
  ajaxSetVenta.send ()*/
}

window.addEventListener ("load", condiciones)