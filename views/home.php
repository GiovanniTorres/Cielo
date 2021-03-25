<div class="degradado1">
<br><br><br><br><br><br><br><br><br><br><br>
    <div class="container col-md-12 borde">
        <div class="row p-5">
                <img src="./imagenes/logotipo.png" width="600px" class="logotipo">
        </div>
    </div>
    <br><br>
</div>

<div class="row nomargin bg-1">
    <div class="col-md-4 nopadding pr-4">
        <div class="p-5 bg- text-right letter-small rounde">
            <div class="p-3">
                <spam class="text-light"><b>Repostería fina.</b></spam> <spam class="text-4">Con el suculento sabor de casa.</spam>
            </div>
        </div>
    </div>
    <div class="col-md-8 nopadding">
        <img src="./imagenes/postres2.jpg" width="100%" height="100%" alt="">
    </div>
</div>

<div class="bg-4 p-5 degradado2">
    <div class="container borde">
        <div class="row">
            <div class="col-md-4 p-5">
                <div class="height-2 borde">
                    <img src="./imagenes/imagen2.jpg" width="100%" height="100%" alt="">
                </div>
                <div class="bg- p-2 text-center text-5">
                    <b>Pastel</b>
                </div>
            </div>
            <div class="col-md-4 p-5">
                <div class="height-2 borde">
                    <img src="./imagenes/imagen5.jpg" width="100%" height="100%" alt="">
                </div>
                <div class="bg- p-2 text-center text-5">
                    <b>Pays</b>
                </div>
            </div>
            <div class="col-md-4 p-5">
                <div class="height-2 borde">
                    <img src="./imagenes/imagen18.jpg" width="100%" height="100%" alt="">
                </div>
                <div class="bg- p-2 text-center text-5">
                    <b>Gelatina</b>
                </div>
            </div>
            <div class="col-md-12 text-center borde p-5">
                <a href="#" class="btn-5 p-1 pr-4 pl-4 rounded">Ver Menú</a>
            </div>
        </div>
    </div>
</div>

<div class="row nomargin bg-1">
    <div class="col-md-5 nopadding">
            <img src="./imagenes/chef.jpg" width="100%" height="100%" alt="">
    </div>
    <div class="col-md-7 nopadding pl-4">
        <div class="p-5 bg- text-left letter-small rounde">
            <div class="p-5 borde">
                <spam class="text-light"><b>Sobre Nosotros.</b></spam> <spam class="text-4">Somos un equipo de trabajo, dedicados a hacer de ese momento especial, algo único. </spam>
            </div>
        </div>
    </div>
</div>

<div class="bg-light p-5 degrad3">
    <div class="container col-md-5 bg-4">
        <form action="" method="post" id="send">
        <div class="row p-2">
            <div class="col-md-12 p-2 text-center">Contactanos</div>
            <div class="col-md-12 p-2"><input type="text" id="cl_nombre" name="cl_nombre" class="col-md-12 small bg-light border border-light rounde" placeholder="Nombre"></div>
            <div class="col-md-12 p-2"><input type="text" id="cl_apellidos" name="cl_apellidos" class="col-md-12 small bg-light border border-light rounde" placeholder="Apellidos"></div>
            <div class="col-md-12 p-2"><input type="text" id="cl_usuario" name="cl_usuario" class="col-md-12 small bg-light border border-light rounde" placeholder="Usuario"></div>
            <div class="col-md-12 p-2"><input type="text" id="cl_password" name="cl_password" class="col-md-12 small bg-light border border-light rounde" placeholder="Password"></div>
            <div class="col-md-12 p-2"><input type="text" id="cl_telefono" name="cl_telefono" class="col-md-12 small bg-light border border-light rounde" placeholder="Telefono"></div>
            <div class="col-md-12 p-2"><input type="text" id="cl_mail" name="cl_mail" class="col-md-12 small bg-light border border-light rounde" placeholder="Mail"></div>
            <div class="col-md-12 p-2">
                <div class="form-group">
                    <textarea class="formulario-control textborder1 bg-light border-msj" id="cl_mensaje" name="cl_mensaje" id="exampleFormControlTextarea1" rows="3" placeholder="Escribe aquí tu mensaje"></textarea>
                </div>
            </div>
            <div class="col-md-12 p-2"><input type="submit" value="Registrarse" id="send" class="col-md-12 bg-1 text-light border-1"></div>
        </div>
        </form>

    </div>
</div>

<script src="./public/js/validar_reg_usuario.js"></script>

<?php require_once ("./setters/setCliente.php") ; ?>