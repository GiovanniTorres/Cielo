<?php 
$login_massage = '' ;
?>
<link rel="stylesheet" type="text/css" href="http://localhost/public/bootstrap-4.3.1-dist/css/bootstrap.min.css">
<link rel="stylesheet" href="http://localhost/public/css/app.css">
<div class="p-4 bg-1">
    <a href="http://localhost/tienda/1/1" class="text-light">Tienda</a>
</div>

<div class="container pt-0 borde">
    <div class="row justify-content-center pt-5 borde">
        <div class="col-md-5 pt-0">
        <form action="" method="post">
            <div class="borderborder-primary pt-0">
                <div class="col-md-12 text-center text-secondary p-0">Iniciar Sesión</div>
                <div class="col-md-12 p-2 borde">
                    <input type="text" name="usuario" id="usuario" class="col-md-12 bg-6 border border-white rounde" placeholder="Usuario">
                </div>
                <div class="col-md-12 p-2 borde">
                    <input type="password" name="contrasena" id="contrasena" class="col-md-12 bg-6 border border-white rounde" placeholder="Contraseña">
                </div>
                <div class="col-md-12 p-2 borde">
                    <input type="submit" class="col-md-12 bg-primary border border-primary text-light rounde" value="Enviar">
                </div>
                <div class="col-md-12 p-2 borde text-center">
                    <a href="" class="col-md-12 p-0 ">Registrate</a>
                </div>
                <?php 
                    if (!isset ($_POST ['usuario']) AND !isset ($_POST ['contrasena'])) {
                        $login_background = 'text-light' ;
                        $login_massage = ' ' ;
                    } else {
                        if (empty ($_POST['usuario']) AND empty ($_POST['contrasena'])) {
                            $login_background = 'text-warning' ;
                            $login_massage = 'Ingresa Usuario y Contraseña' ;
                        } else {
                            $login_session = new SessionController () ;
                            $session = $login_session->login ($_POST['usuario'], $_POST['contrasena']) ;
                            if (empty ($session)) {
                                $login_background = 'text-danger' ;
                                $login_massage = 'No existe Usuario o Contraseña' ;
                            } else {
                                $_SESSION['i'] = true ;
                                foreach ($session as $row) {
                                    $_SESSION['clienteDNI'] = $row['clienteDNI'] ;
                                    $_SESSION['cl_usuario'] = $row['cl_usuario'] ;
                                    $_SESSION['cl_password'] = $row['cl_password'] ;
                                    
                                }
                                header ('Location:http://localhost') ;
                            }
                            
                        }        
                    }
                ?>
                <div class="p-3 border <?php print $login_background ; ?>"><?php print $login_massage ; ?></div>
            </div>
        </form>
        </div>
    </div>
</div>

