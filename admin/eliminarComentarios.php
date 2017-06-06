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
			<header id="header"  style="padding-top:0;">
				<div class="inner" >
					<p class="logo" style="font-size:150%"><strong>Clínica Huellas</strong> </p><br/>
					<p class="logo" id="tipo"><strong>ADMINISTRADOR</strong></p>
					<a id="cerrar" href="../cerrarSesion.php"><img style="width:30%" src="../images/logout.png"></a>
                                        <nav id="menuNormal" style="padding-top:2%; width:90%;">
						<a href="adminDatos.php">Datos</a>
						<a href="registrar.php">Registrar y Editar</a>
                                                <a href="listaClientes.php">Clientes</a>
                                                <a href="copiaBd.html">Copiar BD</a>
                                                <a><strong>Eliminar comentarios</strong></a>
                                                <a href="cambiarDatos.php">Datos clínica</a>
                                                <a href="cambiarOfertas.php">Modificar ofertas</a>
                                                <a href="insertarFotos.php">Actualizar galeria</a>
					</nav>
<ul id="menu" style="color:black;list-style: none; float:left; margin-left:0; width:70%; margin-top:2%;" >
                                            <li id="etiquetaMenu" onclick="return abrirMenu(0);" style="padding:0; margin:0; float:left"><a href ><img src="../images/menu.png" style="width:70%; margin-bottom:3%; margin-left:0;"></a></li>
                                            <ul id="desplegable" style="display:none; list-style: none; margin-top:15% " >
                                                <li class="itemMenu"><a href="adminDatos.php" style="width:100%;">Datos</a></li>
						<li class="itemMenu"><a href="registrar.php" style="width:100%;">Registrar y Editar</a></li>
                                                <li class="itemMenu"><a style="width:100%;" href="listaClientes.php">Clientes</a></li>
                                                <li class="itemMenu"><a style="width:100%;" href="copiaBd.php">Copiar BD</a></li>
                                                <li class="itemMenu"><a style="width:100%;color:white;">Eliminar comentarios</a></li>
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

<div style='overflow-y:scroll; height:480px; margin:3% 0 3% 0;'>
<?php
include '../connect.php';
    if (!($sentencia = $conn->prepare("SELECT usuario, mensaje,fecha,id FROM `Comentarios` WHERE 1 ORDER BY id DESC"))) {
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
array_push($nombres,$row[0],$row[1],row[2],$row[3]);

                  $usuario=$row[0];
                  $mensaje=$row[1];
                  $fecha=$row[2];
                  $id=$row[3];
                  $fecha = date("d-m-Y", strtotime($fecha));
                  echo "<div style=' background-color:rgba(181, 177, 177,0.4); border-radius:10px; margin:1% 10% 0 10%; padding:1%;'>
				<h1><strong>$usuario</strong>    [$fecha]</h1><a style='float:right' href='eliminarComentarios.php?id=$id'>Eliminar</a>
				<p>$mensaje</p>
			</div>";
             }
        }
        else{
             echo "<p> No existen comentarios aún, sé el primero en dejar tu opinión</p>";
        }
			
?>
</div>
	</body>

<?php
session_start();
include '../connect.php';

if($_GET!=null){
$id=$_GET['id'];

if (!($sentencia = $conn->prepare("DELETE FROM `Comentarios` WHERE `id`='$id'"))) {
              echo "Falló la preparación: (" . $conn->errno . ") " . $conn->error;
         }
         if (!$sentencia->execute()) {
              echo "Falló la ejecución: (" . $sentencia->errno . ") " . $sentencia->error;
         }
else echo"<script>document.getElementsByTagName('body')[0].onload=function(){location.replace('eliminarComentarios.php');}</script>";
}
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