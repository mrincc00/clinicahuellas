<?php session_start(); ?>
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
			<header id="header" style="padding-top:0;" >
				<div class="inner" >
					<p class="logo" style="font-size:150%"><strong>Clínica Huellas</strong> </p><br/>
					<p class="logo" id="tipo"><strong>CLIENTE</strong></p>
					<a id="cerrar" href="../cerrarSesion.php"><img style="width:30%" src="../images/logout.png"></a>
                                        <nav id="menuNormal" style="padding-top:2%; width:90%;">
						<a href="clienteDatos.php">Datos</a>
						<a href="galeria.php">Galería</a>
						<a href="ofertas.php">Ofertas</a>
						<a href="consulta/consulta.php">Consulta y Peluquería</a>
						<a><strong>Tienda online</strong></a>
						<a href="opiniones.php">Opiniones</a>
						<a href="contacto.php">Contacto</a>
					</nav>
<ul id="menu" style="color:black;list-style: none; float:left; margin-left:0; width:70%; margin-top:2%;" >
                                            <li id="etiquetaMenu" onclick="return abrirMenu(0);" style="padding:0; margin:0; float:left"><a href ><img src="../images/menu.png" style="width:70%; margin-bottom:3%; margin-left:0;"></a></li>
                                            <ul id="desplegable" style="display:none; list-style: none; margin-top:15% " >
                                                <li class="itemMenu"><a href="clienteDatos.php" style="width:100%">Datos</a></li>
						<li class="itemMenu"><a href="galeria.php" style="width:100%">Galería</a></li>
						<li class="itemMenu"><a href="ofertas.php" style="width:100%">Ofertas</a></li>
						<li class="itemMenu"><a href="consulta/consulta.php" style="width:100%">Consulta y Peluquería</a></li>
						<li class="itemMenu"><a style="width:100%; color:white;">Tienda online</a></li>
						<li class="itemMenu"><a href="opiniones.php" style="width:100%">Opiniones</a></li>
						<li class="itemMenu"><a href="contacto.php" style="width:100%">Contacto</a></li>
</ul>
                                              
                                        <ul>   
				</div>
			</header>

		<!-- Banner -->
			<section class="cabecera" id="banner" style="background-image:url(../images/fondopeque.jpeg);">
			</section>

                       <div style="width:90%; margin:5% 5% 5% 5%; border: 1px solid black; display:table;">
                     

<?php
include '../connect.php';
    if (!($sentencia = $conn->prepare("SELECT nombre,descripcion,imagen,url,precio FROM `Productos` WHERE 1"))) {
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
array_push($nombres,$row[0],$row[1],row[2],$row[3],$row[4]);

                  $nombre=$row[0];
                  $descripcion=$row[1];
                  $imagen=$row[2];
                  $url=$row[3];
                  $precio=$row[4];
                  echo "<div style='display:table-row; border:1px solid black;'>
                           <img style='width:70%; display:table-cell; margin:3% 5% 3% 5%;' src='$imagen'>
                           <p style='width:40%; display:table-cell; vertical-align: middle;'><strong>$nombre</strong><br/>$descripcion</p>
                           <p style='width:15%; display:table-cell; vertical-align:middle; padding-left:5%;'><strong>$precio €</strong></p>
                           <a href='$url' target='_blank' style='display:table-cell; vertical-align:middle; padding-right:5%'>Comprar</a>
                         </div>";
             }
        }
        else{
             echo "<p> No existen productos </p>";
        }
			
?>
                       </div>


<?php
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