<?php session_start(); ?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Clínica Huellas</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="../assets/css/main.css" />
                <script language="javascript" src="../assets/js/admin.js"></script>
	</head>
	<body>

		<!-- MENU -->
			<header id="header" style="padding-top:0;">
				<div class="inner" >
					<p class="logo" style="font-size:150%"><strong>Clínica Huellas</strong> </p><br/>
					<p class="logo" id="tipo"><strong>ADMINISTRADOR</strong></p>
					<a id="cerrar" href="../cerrarSesion.php"><img style="width:30%" src="../images/logout.png"></a>
                                        <nav id="menuNormal" style="padding-top:2%; width:90%;">
						<a><strong>Datos</strong></a>
						<a href="registrar.php">Registrar y Editar</a>
                                                <a href="listaClientes.php">Clientes</a>
                                                <a href="copiaBd.php">Copiar BD</a>
                                                <a href="eliminarComentarios.php">Eliminar comentarios</a>
                                                <a href="cambiarDatos.php">Datos clínica</a>
                                                <a href="cambiarOfertas.php">Modificar ofertas</a>
                                                <a href="insertarFotos.php">Actualizar galeria</a>
					</nav>
                                        <ul id="menu" style="color:black;list-style: none; float:left; margin-left:0; width:70%; margin-top:2%;" >
                                            <li id="etiquetaMenu" onclick="return abrirMenu(0);" style="padding:0; margin:0; float:left"><a href ><img src="../images/menu.png" style="width:70%; margin-bottom:3%; margin-left:0;"></a></li>
                                            <ul id="desplegable" style="display:none; list-style: none; margin-top:15% " >
                                                <li class="itemMenu"><a style="width:100%; color:white;">Datos</a></li>
						<li class="itemMenu"><a style="width:100%;" href="registrar.php">Registrar y Editar</a></li>
                                                <li class="itemMenu"><a style="width:100%;" href="listaClientes.php">Clientes</a></li>
                                                <li class="itemMenu"><a style="width:100%;" href="copiaBd.php">Copiar BD</a></li>
                                                <li class="itemMenu"><a style="width:100%;" href="eliminarComentarios.php">Eliminar comentarios</a></li>
                                                <li class="itemMenu"><a style="width:100%;" href="cambiarDatos.php">Datos clínica</a></li>
                                                <li class="itemMenu"><a style="width:100%;" href="cambiarOfertas.php">Modificar ofertas</a></li>
                                                <li class="itemMenu"><a style="width:100%;" href="insertarFotos.php">Actualizar galeria</a></li>
</ul>
</ul>
				</div>
			</header>

		<!-- Banner -->
			<section class="cabecera" id="banner" style="background-image:url(../images/fondopeque.jpeg);">			
			</section>


		<!-- Three -->
			<section id="three" class="wrapper align-center" style="padding:0">
				<div class="inner" style="margin-left:5%;">
					<h3 style="font-weight:900;"> Visualizar y modificar datos de usuario</h3>
					<form id="formulario" method="post" action="../guardarCambios.php" onSubmit="return cambiar();">
                                                <label style="width:30%;float:left;text-align:right;padding-right:5%" for="usuario">Usuario:</label><input disabled type="text" name="usuario" placeholder="Usuario" id="usuario" style="width:70%; float:right;"/><br/><br/><br/>
						<label style="width:30%;float:left;text-align:right;padding-right:5%" for="nombre">Nombre:</label><input disabled type="text" name="nombre" id="nombre" placeholder="Nombre y Apellidos" style="width:70%; float:right;"/><br/><br/><br/>
						<label style="width:30%;float:left;text-align:right;padding-right:5%" for="email">E-mail:</label><input disabled type="text" name="email" id="email" placeholder="E-mail" style="width:70%; float:right;"/><br/><br/><br/>
						<label style="width:30%;float:left;text-align:right;padding-right:5%"for="password">Contraseña:</label><input disabled type="password" name="password" id="password" placeholder="Contraseña" style="width:70%; float:right;"/><br/><br/><br/>
						<button type="button" style=" font-size:90%;" id="modificar" onclick="modificarDatos();"> Modificar datos</button>
						<input type="submit" value="GUARDAR CAMBIOS" name="registrar" style="font-weight:900; font-size:90%;" disabled  id="guardar" onclick="guardarCambios();"/>
                                                <?php session_start(); 
$usuario=$_SESSION['usuario']; 
$nombre=$_SESSION['nombre'];
$password=$_SESSION['password'];
$email=$_SESSION['email'];
echo "<button type='button' style='font-size:90%;' onclick='rellenar(\"$usuario\",\"$password\",\"$nombre\",\"$email\"); cancelar();' id='botonCancelar' disabled>Cancelar</button>";	
?>											
					</form>					
				</div>
			</section>

	</body>
        <script type="text/javascript">
                  function rellenar(usuario,password,nombre,email){
                      document.getElementById("nombre").value=nombre;
                      document.getElementById("email").value=email;
                      document.getElementById("usuario").value=usuario;
                      document.getElementById("password").value=password;
                  }
                  function cambiar(){
                      var usuario=document.getElementById("usuario").value;
                      var password=document.getElementById("password").value;
                      var nombre=document.getElementById("nombre").value;
                      var email=document.getElementById("email").value;
                
                      if(usuario.length==0 || password.length==0 || nombre.length==0 || email.length==0){
                           alert("Todos los datos deben estar completos");
                           return false;
                      }
                      return true;
                  }
                  function error( valor){
                      if(valor==1) alert("Usuario modificado");
                 }
	</script>
        <?php
           include_once 'connect.php';
           $usuario=$_SESSION["usuario"];
           $password=$_SESSION["password"];
           $nombre=$_SESSION["nombre"];
           $email=$_SESSION["email"];
           echo "<script>window.onload=function() {";
          if (!empty($_GET)) {
                $accion=$_GET['accion'];
                echo "error($accion);";
          }    
           echo "rellenar('".$usuario."','".$password."','".$nombre."','".$email."');";
           echo "}</script>";
        ?>
<?php
if($_SESSION==null)  echo "<script>document.getElementsByTagName('body')[0].onload=function(){setTimeout(\"location.href='../index.php'\", 1);}</script>";
?>
<script>
function abrirMenu(valor){
if(valor==0){
document.getElementById("desplegable").style.display='block';
document.getElementById("etiquetaMenu").onclick="return abrirMenu(1)";
}
if(valor==1){
document.getElementById("desplegable").style.display='none';
document.getElementById("etiquetaMenu").onclick="return abrirMenu(0)";
}
return false;
}
</script>     
</html>