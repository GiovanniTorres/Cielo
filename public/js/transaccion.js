function condiciones () {
  let id_articulo = null
  let precio = null
  obtenerTablaCarrito (id_articulo, precio)
}

function AJAXObject () {
  if (window.XMLHttpRequest) {
    return new XMLHttpRequest ()
  } else if (window.ActiveXObject) {
    return new ActiveXObject ("Microsoft.XMLHTTP")
  }
}

function obtenerTablaCarrito (id_articulo, precio) {
  usuario = document.getElementById ("usuario").dataset.id
  ajaxGetTabla = AJAXObject ()
  ajaxGetTabla.onreadystatechange = function () {
    if (ajaxGetTabla.readyState == 4) {
      if (ajaxGetTabla.status == 200) {
        document.getElementById ("disp").innerHTML = ajaxGetTabla.responseText
        existencia = document.getElementById ("existencia").dataset.id
        total = document.getElementById ('total').dataset.id
        alert ("total: "+total)
        if (existencia == 1 ) {
          id_carrito = document.getElementById ('id_carrito').dataset.id
          cantidad = document.getElementById ('cantidad').dataset.id
          precio = document.getElementById ('precio').dataset.id
          alert("usuario: "+usuario+"\nid_carrito: "+id_carrito+"\nid_articulo: "+id_articulo+"\ncantidad: "+cantidad+"\nprecio: "+precio)
          setTransaccion (usuario, id_carrito, id_articulo, cantidad, precio)
        }
      } else {
      console.log ("El servidor no contestó/nError "+ajaxGetTabla.status+": "+ajaxGetTabla.statusText)
      }
    }
  }
  ajaxGetTabla.open ("POST", "http://localhost/getters/getCarritoAJAX.php",true)
  ajaxGetTabla.setRequestHeader ("Content-Type", "application/x-www-form-urlencoded")
  ajaxGetTabla.send ("usuario="+usuario+"&&id_articulo="+id_articulo+"&&precio="+precio)
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
    arprecio: producto.querySelector ('.precio_ar').dataset.id,
    id_producto: producto.querySelector ('.id_producto').dataset.id
  }
  let precio = objeto_articulo.arprecio
  let id_articulo = objeto_articulo.id_producto
  obtenerTablaCarrito (id_articulo, precio)
}

function setTransaccion (usuario, id_carrito, id_articulo, cantidad, precio) {
  //alert ("setTransaCcion usuario: "+usuario+"\nid_carrito: "+id_carrito+"\nid_artiulo: "+id_articulo+"\ncantidad: "+cantidad+"\nprecio: "+precio)
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
  ajaxSetTransaccion.send ("usuario="+usuario+"&&id_carrito="+id_carrito+"&&id_articulo="+id_articulo+"&&cantidad="+cantidad+"&&precio="+precio)
}

window.addEventListener ("load", condiciones)