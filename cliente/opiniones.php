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
			<header id="header" style="padding-top:0;">
				<div class="inner" >
					<p class="logo" style="font-size:150%"><strong>Clínica Huellas</strong> </p><br/>
					<p class="logo" id="tipo" ><strong>CLIENTE</strong></p>
					<a id="cerrar"  href="../cerrarSesion.php"><img style="width:30%" src="../images/logout.png"></a>
                                        <nav id="menuNormal" style="padding-top:2%; width:90%;">
						<a href="clienteDatos.php">Datos</a>
						<a href="galeria.php">Galería</a>
						<a href="ofertas.php">Ofertas</a>
						<a href="consulta/consulta.php">Consulta y Peluquería</a>
						<a href="tienda.php">Tienda online</a>
						<a><strong>Opiniones</strong></a>
						<a href="contacto.php">Contacto</a>
					</nav>
<ul id="menu" style="color:black;list-style: none; float:left; margin-left:0; width:70%; margin-top:2%;" >
                                            <li id="etiquetaMenu" onclick="return abrirMenu(0);" style="padding:0; margin:0; float:left"><a href ><img src="../images/menu.png" style="width:70%; margin-bottom:3%; margin-left:0;"></a></li>
                                            <ul id="desplegable" style="display:none; list-style: none; margin-top:15% " >
                                                <li class="itemMenu"><a href="clienteDatos.php" style="width:100%">Datos</a></li>
						<li class="itemMenu"><a href="galeria.php" style="width:100%">Galería</a></li>
						<li class="itemMenu"><a href="ofertas.php" style="width:100%">Ofertas</a></li>
						<li class="itemMenu"><a href="consulta/consulta.php" style="width:100%">Consulta y Peluquería</a></li>
						<li class="itemMenu"><a href="tienda.php" style="width:100%">Tienda online</a></li>
						<li class="itemMenu"><a style="color:white; width:100%;">Opiniones</a></li>
						<li class="itemMenu"><a href="contacto.php" style="width:100%">Contacto</a></li>
</ul>
                                              
                                        <ul>       
				</div>
			</header>

		<!-- Banner -->
			<section class="cabecera" id="banner" style="background-image:url(../images/fondopeque.jpeg);">
				
			</section>
                        <div style='overflow-y:scroll; height:400px; margin:5% 10% 0 10%; background-color:#F2F2F2; border-radius:20px;'>

<?php
include '../connect.php';
    if (!($sentencia = $conn->prepare("SELECT usuario, mensaje,fecha FROM `Comentarios` WHERE 1 ORDER BY id DESC"))) {
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
array_push($nombres,$row[0],$row[1],row[2]);

                  $usuario=$row[0];
                  $mensaje=$row[1];
                  $fecha=$row[2];
                  $fecha = date("d-m-Y", strtotime($fecha));
                  echo "<div style=' background-color:rgba(181, 177, 177,0.4); border-radius:10px; margin:1% 10% 0 10%; padding:1%;'>
				<h1><strong>$usuario</strong>    [$fecha]</h1>
				<p>$mensaje </p>
			</div>";
             }
        }
        else{
             echo "<p> No existen comentarios aún, sé el primero en dejar tu opinión</p>";
        }
			
?>
</div>
                        

		<!-- Three -->
			<section id="three" class="wrapper align-center">
				<div class="inner">
					<h3 style="text-align:left;"> Escribe tu propio comentario: </h3>
					<form method="post" action="opiniones.php" onSubmit="return comprobar();" style="width:80%; margin: 0 auto; opacity:0.7;">
						<input id="nombre" type="text" name="nick" placeholder="Nombre" /><br>
						<textarea id="comentario" name="comentario" placeholder="Introduzca su comentario"  rows="4" ></textarea><br>
						<input type="submit" value="enviar" name="enviar" style="font-weight:900; font-size:90%;" />
					</form>					
				</div>
			</section>



	</body>
<script>
function comprobar(){
var nombre=document.getElementById("nombre").value;
var comentario=document.getElementById("comentario").value;
if(nombre.length==0 || comentario.length==0){ alert("Debes completar los datos"); return false;}
return true;
}
</script>

<?php
include '../connect.php';

if($_POST!=null){
$nombre=$_POST['nick'];
$comentario=$_POST['comentario'];
$fecha = date("Y-m-d");

if (!($sentencia = $conn->prepare("INSERT INTO `Comentarios`( `usuario`, `mensaje`,`fecha`) VALUES ('$nombre','$comentario','$fecha')"))) {
          echo "Fallo en la preparación: (" . $conn->errno . ") " . $conn->error;
        }

        if (!$sentencia->execute()) {
          echo "Fallo la ejecución: (" . $sentencia->errno . ") " . $sentencia->error;
        }
else echo"<script>document.getElementsByTagName('body')[0].onload=function(){location.replace('opiniones.php?accion=1');}</script>";
}
if($_GET!=null){
echo "<script>window.onload=function(){alert('Comentario guardado');}</script>";
}
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