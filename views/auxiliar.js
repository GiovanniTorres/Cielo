function condiciones () {
    alert ("1. Reiniciamos Condiciones")
    const objeto_articulo = { 
      arprecio: 6,
      id_producto: 0
    }
    let precio = objeto_articulo.arprecio
    let articulo_seleccionado = objeto_articulo.id_producto
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
    alert ("Consultar tabla")
    usuario = document.getElementById ("usuarioname").textContent
    ajaxGetTabla = AJAXObject ()
    ajaxGetTabla.onreadystatechange = function () {
      if (ajaxGetTabla.readyState == 4) {
        if (ajaxGetTabla.status == 200) {
          alert ("fin")
          document.getElementById ("disp").innerHTML = ajaxGetTabla.responseText
          existencia = document.getElementById ("exist").dataset.id
          //alert (existencia)
          if (existencia == 1) {
            alert ("3. El articulo existe")
            dni_art = document.getElementById ("dni_art").dataset.id
            articulo_seleccionado = document.getElementById ("articulo_seleccionado").dataset.id
            cantidad = document.getElementById ("cantidad").dataset.id
            alert (cantidad)
            alert (precio)
            alert ("4. Modificamos el articulo existente")
            setTransaccion (dni_art, articulo_seleccionado, cantidad, precio, preciocant)
          } else {
            alert ("El articulo no existe")
            alert ("4. Insertamos nuevo articulo")
            dni_art = document.getElementById ("dni_art").dataset.id
            articulo_seleccionado = document.getElementById ("articulo_seleccionado").dataset.id
            cantidad = document.getElementById ("cantidad").dataset.id
            //alert (precio)
            //setTransaccion (dni_art, articulo_seleccionado, cantidad, precio)
          }
        } else {
        console.log ("El servidor no contestó/nError "+ajaxGetTabla.status+": "+ajaxGetTabla.statusText)
        }
      }
    }
    ajaxGetTabla.open ("POST", "http://localhost/getters/getCarritoAJAX.php",true)
    ajaxGetTabla.setRequestHeader ("Content-Type", "application/x-www-form-urlencoded")
    ajaxGetTabla.send ("usuario="+usuario+"&&articulo_seleccionado="+articulo_seleccionado)
    
    //const agree = document.getElementById ("agree")
    //agree.addEventListener ('click', sagree )
  
    const lista_articulos = document.getElementById ("lista_articulos")
    lista_articulos.addEventListener ('click', seleccionarProducto )
    
  }
  
  function sagree (e) {
    e.preventDefault ()
    if (e.target.classList.contains ('mover')) {
      const agregar = e.target.parentElement.parentElement
    }
      alert ("agregar")
  }
  
  function seleccionarProducto (e) {
    alert ("1. Seleccionaste un articulo")
    e.preventDefault ()
    if (e.target.classList.contains ('comprar')) {
      const producto = e.target.parentElement.parentElement
      obtenerInformacionProducto (producto)
    }
    //alert ("Haz seleccionado un articulo")
  }
  
  function obtenerInformacionProducto (producto) {
    alert ("2. Obtenemos información del articulo")
    const objeto_articulo = {
      arprecio: producto.querySelector ('.precio_ar').textContent,
      id_producto: producto.querySelector ('.id_producto').textContent
    }
    let precio = objeto_articulo.arprecio
    let articulo_seleccionado = objeto_articulo.id_producto
  
    obtenerTablaCarrito (articulo_seleccionado, precio)
  }
  
  function setTransaccion (dni_art, articulo_seleccionado, cantidad, precio, preciocant) {
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
    ajaxSetTransaccion.send ("dni_art="+dni_art+"&&articulo_seleccionado="+articulo_seleccionado+"&&usuarionombre="+usuarionombre+"&&cantidad="+cantidad+"&&precio="+precio+"&&preciocant="+preciocant)
  
    comprobarExistencia (articulo_seleccionado)
    obtenerTablaCarrito (articulo_seleccionado, precio)
  }
  
  window.addEventListener ("load", condiciones)