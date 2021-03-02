const lista_articulos = document.getElementById ("lista_articulos")
lista_articulos.addEventListener ('click', seleccionar_producto )

function seleccionar_producto (e) {
  e.preventDefault ()
  if (e.target.classList.contains ('comprar')) {
    const producto = e.target.parentElement.parentElement
    obtener_informacion_producto (producto)
  }
}
  
function obtener_informacion_producto (producto) {
  const objeto_articulo = {
    dni: 1,
    nombre: producto.querySelector ('.id_producto').textContent
  }
  let objeto_articulonombre = objeto_articulo.nombre
  AJAXSetTransaccion (objeto_articulonombre)
}

function AJAXObject () {
  if (window.XMLHttpRequest) {
    return new XMLHttpRequest ()
  } else if (window.ActiveXObject) {
    return new ActiveXObject ("Microsoft.XMLHTTP")
  }
}


function AJAXSetTransaccion (objeto_articulonombre) {
  usuasrionombre = document.getElementById ("usuarioname").dataset.id
  //alert (usuasrionombre)
  ajax = AJAXObject ()
  //alert (objeto_articulo.nombre)
  ajax.onreadystatechange = function () {
    if (ajax.readyState == 4) {
      if (ajax.status == 200) {
        document.getElementById ("disp").innerHTML = ajax.responseText
      } else {
      console.log ("El servidor no contestó/nError "+ajax.status+": "+ajax.statusText)
      }
    }
  }
  ajax.open ("POST", "http://localhost/setters/setTransaccionAjax.php",true)
  ajax.setRequestHeader ("Content-Type", "application/x-www-form-urlencoded")
  ajax.send ("gio="+objeto_articulonombre+"&& usuarionombre="+usuasrionombre)
}



