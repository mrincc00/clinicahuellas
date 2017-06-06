<?php session_start() ?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Clínica Huellas</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="../assets/css/main.css" />
                <script language="javascript" src="../assets/js/cliente.js"></script>
	</head>
	<body>

		<!-- MENU -->
			<header id="header">
				<div class="inner" >
					<p class="logo" style="font-size:150%"><strong>Clínica Huellas</strong> </p><br/>	
                                        <nav id="nav" >
						<a href="index.php">Inicio</a>
					</nav>   				                                                                   
				</div>
			</header>

		<!-- Banner -->
			<section class="cabeccera" id="banner" style="background-image:url(../images/fondopeque.jpeg);">
			</section>


		<!-- Three -->
			<section id="three" class="wrapper align-center" style="padding-top:2%">
				<div class="inner">
					<form method="post" action="recuperarContra.php" onSubmit="return comprobar();" style="padding-top:5%">
                                              <p> Introduzca su usuario y su e-mail, en unos minutos recibirá una contraseña para que pueda acceder a su perfil:</p>
                                              <input type="text" name="usuario" id="user" placeholder="Usuario"/><br/>
                                              <input type="text" name="email" id="email" placeholder="E-mail"/><br/>
                                              <input type="submit" name="Recuperar" value="Recuperar"/>
				</div>
			</section>
	</body>
        <script>
        function comprobar(){
             var usuario=document.getElementById("user").value;
             var email=document.getElementById("email").value;
             if(usuario.length==0 || email.length==0){ alert('Debes completar todos los datos'); return false;}
             return true;
        }
        </script>
<?php
if($_GET!=null) echo "<script>window.onload=function(){alert('No existe ese usuario, inténtelo de nuevo');}</script>";
?>
              
</html>