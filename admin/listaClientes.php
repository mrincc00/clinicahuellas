<!DOCTYPE HTML>

<html>
	<head>
		<title>Clínica Huellas</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="../assets/css/main.css" />
	</head>
	<body>

		<!-- MENU -->
			<header id="header" style="padding-top:0;">
				<div class="inner" >
					<p class="logo" style="font-size:150%"><strong>Clínica Huellas</strong> </p><br/>
					<p class="logo" id="tipo"><strong>ADMINISTRADOR</strong></p>
					<a id="cerrar" href="../cerrarSesion.php"><img style="width:30%" src="../images/logout.png"></a>
                                        <nav id="menuNormal" style="padding-top:2%; width:90%;">
						<a href="adminDatos.php">Datos</a>
						<a href="registrar.php">Registrar y Editar</a>
                                                <a><strong>Clientes</strong></a>
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
						<li class="itemMenu"><a style="width:100%;" href="registrar.php">Registrar y Editar</a></li>
                                                <li class="itemMenu"><a style="width:100%;color:white;">Clientes</a></li>
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

                        <p style="margin-top:5%;  text-align:center;"> En esta tabla se muestran todos los datos de los clientes que se encuentran en la base de datos: <a href="generarPdf.php" target="_blank"><button>Guardar en pdf</button></a></p>
			<table style="margin:auto; width:80%; text-align:center;">
                           <thead style=" font-size:130%;">
                              <tr >
                                 <th style=" text-align:center;">USUARIO</td>
                                 <th style=" text-align:center;">NOMBRE</td>
                                 <th style=" text-align:center;">EMAIL</td>
                              </tr>
                           </thead>
                           <tbody>
      <?php
include '../connect.php';

$usuario=$_SESSION['usuario'];
if (!($sentencia = $conn->prepare("SELECT nombre,email,usuario FROM `Usuarios` WHERE `tipo`=1"))) {
          echo "Fallo en la preparación: (" . $conn->errno . ") " . $conn->error;
        }

        if (!$sentencia->execute()) {
          echo "Fallo la ejecución: (" . $sentencia->errno . ") " . $sentencia->error;
        }
        if (!($result = $sentencia->get_result())) {
		      echo "No se ha podido establecer la conexion con el servidor";
	}
	if ($result->num_rows > 0) {
             $nombres = array();

	     while($row = $result->fetch_array()){	    
array_push($nombres,$row[0],$row[1],$row[2]);

                  $nombre=$row[0];
                  $email=$row[1];
                  $usuario=$row[2];
                  echo "<tr><td><h1>$usuario</h1></td><td>$nombre</td><td>$email</td></tr>";
             }
        }
        else{
             echo "<p> No existen clientes en la base de datos aún</p>";
        }

?>                      


                           </tbody>
                        </table>
<?php
session_start();
if($_SESSION==null)  echo "<script>document.getElementsByTagName('body')[0].onload=function(){setTimeout(\"location.href='../index.php'\", 1);}</script>";
?>

	</body>
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