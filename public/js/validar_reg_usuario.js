function charger1 () {
    document.getElementById("send").addEventListener("submit", sendForm1);
}

function sendForm1 (event) {
    var vcl_nombre = document.getElementById("cl_nombre").value;
    var vcl_apellidos = document.getElementById("cl_apellidos").value;
    var vcl_usuario = document.getElementById("cl_usuario").value;
    var vcl_password = document.getElementById("cl_password").value;
    var vcl_telefono = document.getElementById("cl_telefono").value;
    var vcl_mail = document.getElementById("cl_mail").value;
    var vcl_mensaje = document.getElementById("cl_mensaje").value;
    

    var cl_nombre = document.getElementById("cl_nombre");
    var cl_apellidos = document.getElementById("cl_apellidos");
    var cl_usuario = document.getElementById("cl_usuario");
    var cl_password = document.getElementById("cl_password");
    var cl_telefono = document.getElementById("cl_telefono");
    var cl_mail = document.getElementById("cl_mail");
    var cl_mensaje = document.getElementById("cl_mensaje");

    if (vcl_nombre === "") {
        event.preventDefault () ;
        cl_nombre.style.setProperty("border-color","yellow","important") ;
        return false ;
    } else {
        cl_nombre.style.setProperty("border-color","#f8f9fa","important") ;
        if (vcl_apellidos === "") {
            event.preventDefault () ;
            cl_apellidos.style.setProperty("border-color","yellow","important") ;
            return false ;
        } else {
            cl_apellidos.style.setProperty("border-color","#f8f9fa","important") ;
            if (vcl_usuario === "") {
                event.preventDefault () ;
                cl_usuario.style.setProperty("border-color","yellow","important") ;
                return false ;
            } else {
                cl_usuario.style.setProperty("border-color","#f8f9fa","important") ;
                if (vcl_password === "") {
                    event.preventDefault () ;
                    cl_password.style.setProperty("border-color","yellow","important") ;
                    return false ;
                } else {
                    cl_password.style.setProperty("border-color","#f8f9fa","important") ;
                    if (vcl_telefono === "") {
                        event.preventDefault () ;
                        cl_telefono.style.setProperty("border-color","yellow","important") ;
                        return false ;
                    } else {
                        cl_telefono.style.setProperty("border-color","#f8f9fa","important") ;
                        if (vcl_mail === "") {
                            event.preventDefault () ;
                            cl_mail.style.setProperty("border-color","yellow","important") ;
                            return false ;
                        } else {
                            cl_mail.style.setProperty("border-color","#f8f9fa","important") ;
                            if (vcl_mensaje === "") {
                                event.preventDefault () ;
                                cl_mensaje.style.setProperty("border-color","yellow","important") ;
                                return false ;
                            } else {
                                cl_mensaje.style.setProperty("border-color","#f8f9fa","important") ;
                                
                            }
                        }
                    }
                }
            }
        }
    }
}

window.addEventListener ("load", charger1) ;