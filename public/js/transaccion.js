function condiciones () {
  //alert ("1. Limpiamos variables -> Obtener tabla")
  idcarrito = null
  articulo_seleccionado = null
  cantidad = null
  precio = null
  obtenerTablaCarrito (articulo_seleccionado, precio)
}

function AJAXObject () {
  if (window.XMLHttpRequest) {
    return new XMLHttpRequest ()
  } else if (window.ActiveXObject) {
    return new ActiveXObject ("Microsoft.XMLHTTP")
  }
}

function obtenerTablaCarrito (articulo_seleccionado, precio) {
  //alert ("Consultar tabla")
  usuario = document.getElementById ("usuarioname").textContent
  ajaxGetTabla = AJAXObject ()
  ajaxGetTabla.onreadystatechange = function () {
    if (ajaxGetTabla.readyState == 4) {
      if (ajaxGetTabla.status == 200) {
        document.getElementById ("disp").innerHTML = ajaxGetTabla.responseText
        existencia = document.getElementById ("exist").dataset.id
        //alert (existencia)
        if (existencia == 1) {
          //alert ("3. El articulo existe")
          idcarrito = document.getElementById ("idcarrito").dataset.id
          articulo_seleccionado = document.getElementById ("articulo_seleccionado").dataset.id
          cantidad = document.getElementById ("cantidad").dataset.id
          precio = document.getElementById ("precio").dataset.id
          //alert ("IdCarrito:   "+idcarrito+"\nArticulo:      "+articulo_seleccionado+"\nCantidad:   "+cantidad+"\nPrecio:        "+precio)
          //alert ("4. Modificamos el articulo existente")
          setTransaccion (idcarrito, articulo_seleccionado, cantidad, precio)
        } else {
          //alert ("El articulo no existe")
          //alert ("4. Insertamos nuevo articulo")
          idcarrito = document.getElementById ("idcarrito").dataset.id
          articulo_seleccionado = document.getElementById ("articulo_seleccionado").dataset.id
          cantidad = document.getElementById ("cantidad").dataset.id
          //precio = document.querySelector (".precio_ar").textContent
          //alert ("IdCarrito:   "+idcarrito+"\nArticulo:      "+articulo_seleccionado+"\nCantidad:   "+cantidad+"\nPrecio:        "+precio)
          setTransaccion (idcarrito, articulo_seleccionado, cantidad, precio)
        }
      } else {
      console.log ("El servidor no contestó/nError "+ajaxGetTabla.status+": "+ajaxGetTabla.statusText)
      }
    }
  }
  ajaxGetTabla.open ("POST", "http://localhost/getters/getCarritoAJAX.php",true)
  ajaxGetTabla.setRequestHeader ("Content-Type", "application/x-www-form-urlencoded")
  ajaxGetTabla.send ("usuario="+usuario+"&&articulo_seleccionado="+articulo_seleccionado+"&&precio="+precio+"&&cantidad="+cantidad)
  const lista_articulos = document.getElementById ("lista_articulos")
  lista_articulos.addEventListener ('click', seleccionarProducto )
}

function seleccionarProducto (e) {
  //alert ("1. Seleccionaste un articulo -> Obtener info de articulo")
  e.preventDefault ()
  if (e.target.classList.contains ('comprar')) {
    const producto = e.target.parentElement.parentElement
    obtenerInformacionProducto (producto)
  }
}

function obtenerInformacionProducto (producto) {
  //alert ("2. Obtenemos información del articulo")
  const objeto_articulo = {
    precio_ar: producto.querySelector ('.precio_ar').dataset.id,
    id_producto: producto.querySelector ('.id_producto').dataset.id
  }
  let precio = objeto_articulo.precio_ar
  let articulo_seleccionado = objeto_articulo.id_producto
  //alert ("3. Revisamos si el articulo ya existe en carrito")
  obtenerTablaCarrito (articulo_seleccionado, precio)
}


function setTransaccion (idcarrito, articulo_seleccionado, cantidad, precio) {  
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
  ajaxSetTransaccion.send ("idcarrito="+idcarrito+"&&articulo_seleccionado="+articulo_seleccionado+"&&usuarionombre="+usuarionombre+"&&cantidad="+cantidad+"&&precio="+precio)
  obtenerTablaCarrito (articulo_seleccionado, precio)
}

window.addEventListener ("load", condiciones)