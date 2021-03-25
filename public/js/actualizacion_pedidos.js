function AJAXObject () {
    if (window.XMLHttpRequest) {
      return new XMLHttpRequest ()
    } else if (window.ActiveXObject) {
      return new ActiveXObject ("Microsoft.XMLHTTP")
    }
  }

function AJAXActualizarTabla () {
usuario = document.getElementById ("usuarioname").textContent
  //alert (usuario)
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
  ajaxGetTabla.send ("nombre_usuario="+usuario)
}

window.addEventListener ("load", AJAXActualizarTabla)