
<!DOCTYPE HTML>
<html>
	<head>
		<title>Clínica Huellas</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		
	</head>
	<body style="margin-bottom:5%">
        
		<!-- Banner -->
			<section id="banner" style="padding-top:2%;" >
				<div class="inner" style="margin-top:0; padding:0;">
					<header>
						<h1>Bienvenido a Clínica Huellas</h1>
					</header>
					
					<!-- INICIO SESION -->
					<div class="flex ">
						
						<!-- ADMINISTRADOR -->
						<div id="adminLogin" style="" >
							<img src="images/admin.png" style="width:53%; opacity:1;"/>
							<h3 style="opacity:1;">Administrador</h3>
							<form method="post" action="comprobarUsuario.php" style="opacity:1;" onSubmit="return abrirPerfilAdmin();">
								<input type="text" name="usuario" id="userAdmin" value="" placeholder="Usuario" />
								<br>
								<input type="password" name="contrasena" id="passAdmin" value="" placeholder="Contraseña" /><br>		
								<input type="submit" name="admin"  value="acceder"  style="background-color:#939292; color:#ffffff; width:60%; padding:0;"/>
                                                                <input type="hidden" name="tipo" value="2"/>	
							</form>
						</div>
						
						<!-- CLIENTE -->
						<div id="clienteLogin" style="">
							<img src="images/cliente.png" style="width:33%"/>
							<h3 style="color:black; font-weight:900; font-size:200%;">CLIENTE</h3>
							<form method="post" action="comprobarUsuario.php" style="margin:0; margin-bottom:5%;" onSubmit="return abrirPerfilCliente();" id="formCliente">
								<input type="text" name="usuario" id="userCliente" value="" placeholder="Usuario" />
								</br>
								<input type="password" name="contrasena" id="passCliente" value="" placeholder="Contraseña" /><br>							
                                                                <input type="submit" name="cliente"  value="acceder"  style="background-color:#939292; color:#ffffff;"/>	
                                                                <input type="hidden" name="tipo" value="1"/>						
							</form>
						</div>

						<!-- VETERINARIO -->
						<div id="vetLogin" style="" >
							<img src="images/vet.png" style="width:60%;"/>
							<h3>Personal</h3>
							<form method="post" action="comprobarUsuario.php" onSubmit=" return abrirPerfilVet();" >
								<input type="text" name="usuario" id="userVet" value="" placeholder="Usuario" />
								</br>
								<input type="password" name="contrasena" id="passVet" value="" placeholder="Contraseña" /><br>		
								<input type="submit" name="vet"  value="acceder" style="background-color:#939292; color:#ffffff; width:60%; padding:0;"/>
                                                                <input type="hidden" name="tipo" value="3"/>	
							</form>
						</div>
						
						
						<br><br>Si aún no tienes tu propia cuenta: <a href="#registro">Registrate aquí.</a></p>
						
						
						

					</div>
				</div>
			</section>


		<!-- Three -->
			<section id="three" class="wrapper align-center">
				<div class="inner">
						<!--SOBRE NOSOTROS-->
						<article style="background-color:rgba(181, 177, 177,0.2); padding:1%; border-radius:30px; float:left; width:100%; border: 3px solid #000; margin-bottom:5%;">
							<header>
								<h3>SOBRE NOSOTROS</h3>
							</header>
							<div>
								<img id="imagenIndice" src="images/fonto.jpg" style="">
                                                                <p style='margin-right:5%; padding-top:2%; text-align: justify; color:black;'>Descripcion</p>
								
							</div>
							
						</article>	
						<!--REGISTRAR-->
						<article id="registro" style="background-color:rgba(181, 177, 177,0.2); padding:1%; border-radius:30px; float:left; width:100%; border: 3px solid #000; margin-bottom:5%;">
							<header>
								<h3>REGISTRAR <strong>NUEVO USUARIO</strong></h3>
							</header>
							<div>
								<img id="imagenIndex"src="images/registro.png" style="width:25%; float:right; padding-right:3%; ">
								<form id="formIndice" method="post" action="login.php" style="" onSubmit="return validarRegistro();">
									<div style="position:relative; padding:0; margin:0;">
										<input type="text" name="nombre" placeholder="Nombre y Apellidos" style="margin:0; padding-left: 15%" id="nombre" />
										<img src="images/nombre.png" class="input_img" style="">
									</div><br/>
									<div style="position:relative; padding:0; margin:0;">
										<input type="text" name="email" placeholder="E-mail" style="margin:0; padding-left: 15%"  id="email"/>
										<img src="images/email.png" class="input_img" style="">
									</div><br/>
									<div style="position:relative; padding:0; margin:0;">
										<input type="text" name="usuario" placeholder="Usuario" style="margin:0; padding-left: 15%" id="usuarioNuevo" />
										<img src="images/add.png" class="input_img" style="">
									</div><br/>
									<div style="position:relative; padding:0; margin:0;">
										<input type="password" name="contrasena" placeholder="Contraseña" style="margin:0; padding-left: 15%"  id="contraNueva"/>
										<img src="images/password.png" class="input_img" style="">
									</div><br/>
                                                                        <div style="position:relative; padding:0; margin:0;">
										<input type="password" name="confirmContrasena" placeholder="Repita contraseña" style="margin:0; padding-left: 15%"  id="confirm"/>
										<img src="images/password.png" class="input_img" style="">
									</div><br/>
									<input type="submit" value="registrar" name="registrar" style="font-weight:900; font-size:90%;"/>								
								</form>
							</div>
						</article>								
				</div>
			</section>
			<br/>


		
	</body>
	
</html>