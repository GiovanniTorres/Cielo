<?php 
$divide = isset ($_GET["r"]) ? explode ("/", $_GET["r"]) : " " ; 
//print $divide [0] ;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="http://localhost/public/bootstrap-4.3.1-dist/css/bootstrap.min.css">
	<!--script src="https://js.stripe.com/v3/"></script-->
	<script src="http://localhost/public/js/jquery-3.4.0.min.js"></script>
    <script src="http://localhost/public/bootstrap-4.3.1-dist/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="http://localhost/public/css/app.css">
	<link rel="stylesheet" href="./public/css/responsive.css">
</head>
<body>
<div class="col-md-12 navis bg-menu">
<nav class="navbar principal navbar-expand-lg navbar-light">
		<div class="container justify_content_center">
				<a class="navbar-brand text-4 borde-letra">El Cielo</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-control="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<img class="menu-style" src="http://localhost/imagenes/menu-lineas.svg">
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">

					<?php
					$text_color_1 = "text-4" ;
					$text_color_2 = "text-4" ;
					$text_color_3 = "text-4" ;
					if ($divide[0] == " ") { $text_color_1 = "text-white";	}
					if ($divide[0] == "tienda") { $text_color_2 = "text-white"; }
					if ($divide[0] == "cliente") { $text_color_3 = "text-white"; }
					?>				
					<li class="nav-item"><a href="/" class="nav-link <?php print "$text_color_1" ?> borde-letra1">Home</a></li>
					<li class="nav-item"><a href="http://localhost/tienda/1/1" class="nav-link <?php print "$text_color_2" ?> borde-letra1">Tienda</a></li>
					<li class="nav-item"><a href="http://localhost/cliente" class="nav-link <?php print "$text_color_3" ?> borde-letra1">Clientes</a></li> 
					<li class="nav-item"><a href="http://localhost/administrador" class="nav-link text-4 borde-letra1">Administrador</a></li> 
					<li class="nav-item"><div class="col-md-12 borde"></div></li>
					<li class="nav-item"><div class="col-md-12 borde"></div></li>
					<li class="nav-item"><div class="col-md-12 borde"></div></li>
					<li class="nav-item"><div class="col-md-12 borde"></div></li>
					<li class="nav-item"><div class="col-md-12 borde"></div></li>
					<li class="nav-item"><div class="col-md-12 borde"></div></li>
					<li class="nav-item"><div class="col-md-12 borde"></div></li>
					<li class="nav-item"><div class="col-md-12 borde"></div></li>
					<li class="nav-item"><div class="col-md-12 borde"></div></li>
					<li class="nav-item"><div class="col-md-12 borde"></div></li>
					<li class="nav-item"><div class="col-md-12 borde"></div></li>
					<li class="nav-item"><div class="col-md-12 borde"></div></li>
					<?php if (!$_SESSION ['i']) { ?>
					<li class="nav-item"><a href="http://localhost/iniciar_sesion" class="nav-link text-4 borde-letra1">Iniciar Sesión</a></li> 
					<?php } ?>
					<?php if ($_SESSION ['i']) { ?>
					<li class="nav-item"><div class="col-md-12 nav-link text-4 border-letra1 borde" id="usuarioname" data-id="<?php print $_SESSION["clienteDNI"] ; ?>"><?php print $_SESSION["cl_usuario"] ; ?></div></li>
					<li class="nav-item"><a href="http://localhost/exit" class="nav-link text-4 borde-letra1">Cerrar</a></li>
					<?php } ?>
				</ul>			
			</div>
		</div>
	</nav>
	</div>
	<?php if ($divide != " ") { ?>
	<div class=" pt-5 text-1">
		<div class="container pt-3">
			<a href="http://localhost" class="small text-1">Home</a> / <a href="http://localhost/<?php print $divide[0] ?>/1/1" class="small text-1"><?php print $divide[0] ?></a>
		</div>
	</div>
	<?php } ?>