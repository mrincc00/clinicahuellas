
<!DOCTYPE HTML>
<html>
	<head>
		<title>Clínica Huellas</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="../assets/css/main.css" />
               
	</head>
	<body id="body">

		<!-- MENU -->
			<header id="header" style="padding-top:0;" >
				<div class="inner" >
					<p class="logo" style="font-size:150%"><strong>Clínica Huellas</strong> </p><br/>
					<p class="logo" id="tipo" style=""><strong>CLIENTE</strong></p>
					<a id="cerrar" style="" href="../cerrarSesion.php"><img style="width:30%" src="../images/logout.png"></a>
                                        <nav id="menuNormal" style="padding-top:2%; width:90%;" >
						<a><strong>Datos</strong></a>
						<a href="galeria.php">Galería</a>
						<a href="ofertas.php">Ofertas</a>
						<a href="consulta/consulta.php">Consulta y Peluquería</a>
						<a href="tienda.php">Tienda online</a>
						<a href="opiniones.php">Opiniones</a>
						<a href="contacto.php">Contacto</a>
					</nav>       
                                        <ul id="menu" style="color:black;list-style: none; float:left; margin-left:0; width:70%; margin-top:2%;" >
                                            <li id="etiquetaMenu" onclick="return abrirMenu(0);" style="padding:0; margin:0; float:left"><a href ><img src="../images/menu.png" style="width:70%; margin-bottom:3%; margin-left:0;"></a></li>
                                            <ul id="desplegable" style="display:none; list-style: none; margin-top:15% " >
                                                <li class="itemMenu"><a style="color:white;">Datos</a></li>
						<li class="itemMenu"><a href="galeria.php" style="width:100%">Galería</a></li>
						<li class="itemMenu"><a href="ofertas.php" style="width:100%">Ofertas</a></li>
						<li class="itemMenu"><a href="consulta/consulta.php" style="width:100%">Consulta y Peluquería</a></li>
						<li class="itemMenu"><a href="tienda.php" style="width:100%">Tienda online</a></li>
						<li class="itemMenu"><a href="opiniones.php" style="width:100%">Opiniones</a></li>
						<li class="itemMenu"><a href="contacto.php" style="width:100%">Contacto</a></li>
</ul>
                                              
                                        <ul>                            
				</div>
			</header>

		<!-- Banner -->
			<section class="cabecera" id="banner" style="background-image:url(../images/fondopeque.jpeg);  ">
				
			</section>


		<!-- Three -->
				<div class="inner" style="margin-top:5%" >
					<h3 style="font-weight:900; text-align:center;"> Visualizar y modificar datos de usuario</h3>
					<form style="" method="post" action="../guardarCambios.php" onSubmit="return cambiar();" id="datos">
                                                <label style="width:30%;float:left;text-align:right;padding-right:5%" for="usuario">Usuario:</label><input disabled type="text" name="usuario" placeholder="Usuario" id="usuario" style="width:70%; float:right;"/><br/><br/><br/>
						<label style="width:30%;float:left;text-align:right;padding-right:5%" for="nombre">Nombre:</label><input disabled type="text" name="nombre" placeholder="Nombre y Apellidos" id="nombre" style="width:70%; float:right;"/><br/><br/><br/>
						<label style="width:30%;float:left;text-align:right;padding-right:5%" for="email">E-mail:</label><input disabled type="text" name="email" placeholder="E-mail" id="email" style="width:70%; float:right;"/><br/><br/><br/>
						<label style="width:30%;float:left;text-align:right;padding-right:5%" for="password">Contraseña:</label><input disabled type="password" name="password" placeholder="Contraseña" id="password" style="width:70%; float:right;"/><br/><br/><br/>
						<button type="button" style=" font-size:70%;" onclick="editarCliente();" id="botonEditar">Modificar datos</button>
						<input type="submit" value="GUARDAR CAMBIOS" name="registrar" style="font-weight:900; font-size:70%;" disabled id="guardarCambios" onclick="guardarCambios();" />	
                                                 
					</form>
					
				</div>
	</body>
              
              
</html>