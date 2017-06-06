<!DOCTYPE HTML>

<html>
	<head>
		<title>Clínica Huellas</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="../assets/css/main.css" />
		<link rel="stylesheet" href="visuallightbox.css" type="text/css" />
		<link rel="stylesheet" href="vlightbox.css" type="text/css" />
		<script type="text/javascript" src="jquery.js"></script>
	</head>
	<body>

		<!-- MENU -->
			<header id="header" style="padding-top:0">
				<div class="inner" >
					<p class="logo" style="font-size:150%"><strong>Clínica Huellas</strong> </p><br/>
					<p class="logo" id="tipo" ><strong>CLIENTE</strong></p>
					<a id="cerrar"  href="../cerrarSesion.php"><img style="width:30%" src="../images/logout.png"></a>
                                        <nav id="menuNormal" style="padding-top:2%; width:90%;">
						<a href="clienteDatos.php">Datos</a>
						<a><strong>Galería</strong></a>
						<a href="ofertas.php">Ofertas</a>
						<a href="consulta/consulta.php">Consulta y Peluquería</a>
						<a href="tienda.php">Tienda online</a>
						<a href="opiniones.php">Opiniones</a>
						<a href="contacto.php">Contacto</a>
					</nav>
<ul id="menu" style="color:black;list-style: none; float:left; margin-left:0; width:70%; margin-top:2%;" >
                                            <li id="etiquetaMenu" onclick="return abrirMenu(0);" style="padding:0; margin:0; float:left"><a href ><img src="../images/menu.png" style="width:70%; margin-bottom:3%; margin-left:0;"></a></li>
                                            <ul id="desplegable" style="display:none; list-style: none; margin-top:15% " >
                                                <li class="itemMenu"><a href="clienteDatos.php "style="width:100%;">Datos</a></li>
						<li class="itemMenu"><a style="color:white; width:100%">Galería</a></li>
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
		<div id="vlightbox" style="margin:0 5% 0 5%">
<?php
$directorio = "images";
$gestor_dir = opendir($directorio);
while (false !== ($nombre_fichero = readdir($gestor_dir))) {
    $ficheros[] = $nombre_fichero;
}
sort($ficheros);
$num=count($ficheros);
 for($i=2; $i<$num; $i++){
 $imagen=$i-1;
$primero="";
 if($imagen==1) $primero="id='firstImage'";
 echo "<a $primero title='$ficheros[$i]' href='images/$ficheros[$i]' class='vlightbox'><img alt='$ficheros[$i]' src='images/$ficheros[$i]' /></a>\n";
}
?>
		</div>
		<script type="text/javascript">
			var $VisualLightBoxParams$ = {autoPlay:true,borderSize:21,enableSlideshow:true,overlayOpacity:0.4,startZoom:true};
		</script>
		<script type="text/javascript" src="visuallightbox.js"></script>	



	</body>
<?php
session_start();
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