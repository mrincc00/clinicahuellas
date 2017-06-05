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
					<p class="logo" id="tipo" ><strong>ADMINISTRADOR</strong></p>
					<a id="cerrar" href="../cerrarSesion.php"><img style="width:30%" src="../images/logout.png"></a>
                                        <nav id="menuNormal" style="padding-top:2%; width:90%;" >
						<a href="adminDatos.php">Datos</a>
						<a><strong>Registrar y Editar</strong></a>
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
                                                <li class="itemMenu"><a href="adminDatos.php" style="width:100%;">Datos</a></li>
						<li class="itemMenu"><a style="width:100%;color:white;">Registrar y Editar</a></li>
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
		<article id="registro" style="background-color:rgba(181, 177, 177,0.2); padding:1%; border-radius:30px; float:left; width:90%; border: 3px solid #000; margin:5% 5% 5% 5%;">
		       <header>
			<h4 style="text-align:center"><button id="botonRegistrar" onclick="registrarNuevo();" disabled><strong>REGISTRAR</strong> NUEVO USUARIO</button><button id="botonModificarUsuario" onclick="modificarUsuario();"><strong>MODIFICAR</strong> USUARIO</button><button id="botonEliminar" onclick="eliminarUsuario();"><strong>ELIMINAR</strong> USUARIO</button></h4>
		       </header>
                       <form id="formBusqueda" method="post" action="registrar.php" style="display:none; text-align:center; margin:0 15% 0 15%; padding:2% 5% 2% 5%; border: 3px solid #000; border-radius:30px;">
                           <input style="float:left; width:50%; " type="text" id="usuarioBusqueda" name="usuarioBusqueda" placeHolder="Usuario que desea editar" />
                           <input type="submit" name="modificar" value="Modificar" id="boton"/>
                       </form>
<br/>
			<div>
				<img id="imagenRegAdmin" src="../images/registro.png" style="width:25%; float:right; padding-right:3%; ">
				<form method="post" id="formRegistro" >

                                        <select name="tipo" id="tipoUsuario">
                                              <option disabled selected value> -- Selecciona el tipo de usuario -- </option>
                                              <option value="2">Administrador</option>
                                              <option value="3">Personal</option>
                                        </select><br/>
                                       <div style="position:relative; padding:0; margin:0;">
						<input type="text" name="usuario" id="usuario" placeholder="Usuario" style="margin:0; padding-left: 15%"/>
						<img src="../images/add.png" class="input_imgAdm" >
					</div><br/>
					<div style="position:relative; padding:0; margin:0;">
						<input type="text" name="nombre" id="nombre" placeholder="Nombre y Apellidos" style="margin:0; padding-left: 15%"  />
						<img src="../images/nombre.png" class="input_imgAdm" >
					</div><br/>
					<div style="position:relative; padding:0; margin:0;">
						<input type="text" name="email" placeholder="E-mail" id="email" style="margin:0; padding-left: 15%"  />
						<img src="../images/email.png" class="input_imgAdm" >
					</div><br/>
					
					<div style="position:relative; padding:0; margin:0;">
						<input type="password" name="password" id="password" placeholder="Contraseña" style="margin:0; padding-left: 15%"  />
						<img src="../images/password.png" class="input_imgAdm" >
					</div><br/>
                                        <div style="position:relative; padding:0; margin:0;">
						<input type="password" name="confirmPassword" id="confirmPassword" placeholder="Repita contraseña" style="margin:0; padding-left: 15%"  />
						<img src="../images/password.png" class="input_imgAdm" >
					</div><br/>
					<input type="submit" value="registrar" name="registrar" style="font-weight:900; font-size:90%;" id="submitRegistrar" onClick="subir(this.value);"/>					
                                        <input type="submit" value="guardarCambios" name="guardar" style="font-weight:900; font-size:90%;" id="submitGuardar" disabled onClick="subir(this.value);"/>	
                                        <button type="button" id="cancelarRegistrar" onclick="limpiar();">Cancelar</button>										
				</form>
			</div>
		</article>	

	</body>
<?php 
include '../connect.php';
if($_GET!=null){$valor=$_GET['accion'];
echo"<script>window.onload=function(){ if($valor==1) alert('Registro completo'); if($valor==2) alert('Usuario ocupado, pruebe con otro'); if($valor==3) alert('Usuario modificado');}</script>";
}
if($_POST!=null){
   $modo=$_POST['modificar'];
   $usuario=$_POST['usuarioBusqueda'];

  if($modo=="modificar"){
   if (!($sentencia = $conn->prepare("SELECT password, nombre, email, tipo FROM `Usuarios` WHERE `usuario`='$usuario'"))) {
              echo "Falló la preparación: (" . $conn->errno . ") " . $conn->error;
            }
             if (!$sentencia->execute()) {
              echo "Falló la ejecución: (" . $sentencia->errno . ") " . $sentencia->error;
            }
            if (!($result = $sentencia->get_result())) {
              echo "No se ha podido establecer la conexión con el servidor";
            }
            if ($result->num_rows > 0) {
             $nombres = array();

	     while($row = $result->fetch_array()){
		    array_push($nombres,$row[0],$row[1],$row[2],$row[3]);
	     }
             if($nombres!=null){
                  $password=$nombres[0];
                  $nombre=$nombres[1];
                  $email=$nombres[2];
                  $tipo=$nombres[3];  
echo "<script> window.onload=function(){ document.getElementById('usuario').value='$usuario';
document.getElementById('password').value='$password'; 
document.getElementById('confirmPassword').value='$password'; 
document.getElementById('nombre').value='$nombre';
document.getElementById('email').value='$email';
document.getElementById('tipoUsuario').style='display:none';
document.getElementById('submitRegistrar').disabled=true;
document.getElementById('submitGuardar').disabled=false;
document.getElementById('botonModificarUsuario').disabled=true;
document.getElementById('botonRegistrar').disabled=false;
document.getElementById('cancelarRegistrar').setAttribute('onclick','document.getElementById(\"formRegistro\").reset();modificarUsuario();'); 
document.getElementById('botonRegistrar').setAttribute('onclick','registrarNuevo(\"cambiar\");');
document.getElementById('usuario').disabled=true;
 }</script>";
             }
        }
        else  echo "<script> window.onload=function(){ alert('No existe $usuario');}</script>";
}
    if($modo=="eliminar"){
         if (!($sentencia = $conn->prepare("DELETE FROM `Usuarios` WHERE `usuario`='$usuario'"))) {
              echo "Falló la preparación: (" . $conn->errno . ") " . $conn->error;
         }
         if (!$sentencia->execute()) {
              echo "Falló la ejecución: (" . $sentencia->errno . ") " . $sentencia->error;
         }
         else if($sentencia->affected_rows==0) echo "<script> document.getElementsByTagName('body')[0].onload=function(){ alert(\"Este usuario $usuario no existe\");}</script>";
         else echo "<script> document.getElementsByTagName('body')[0].onload=function(){ alert('Usuario $usuario eliminado correctamente');}</script>";

    }
}
?>
<?php
if($_SESSION==null)  echo "<script>document.getElementsByTagName('body')[0].onload=function(){setTimeout(\"location.href='../index.php'\", 1);}</script>";
?>
        
<script>
function limpiar(){
document.getElementById('formRegistro').reset();
}
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