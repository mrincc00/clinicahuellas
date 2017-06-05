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
                                        <nav id="menuNormal" style="padding-top:2%; width:90%;" >
						<a href="clienteDatos.php">Datos</a>
						<a href="galeria.php">Galería</a>
						<a><strong>Ofertas</strong></a>
						<a href="consulta/consulta.php">Consulta y Peluquería</a>
						<a href="tienda.php">Tienda online</a>
						<a href="opiniones.php">Opiniones</a>
						<a href="contacto.php">Contacto</a>
					</nav>
<ul id="menu" style="color:black;list-style: none; float:left; margin-left:0; width:70%; margin-top:2%;" >
                                            <li id="etiquetaMenu" onclick="return abrirMenu(0);" style="padding:0; margin:0; float:left"><a href ><img src="../images/menu.png" style="width:70%; margin-bottom:3%; margin-left:0;"></a></li>
                                            <ul id="desplegable" style="display:none; list-style: none; margin-top:15% " >
                                                <li class="itemMenu"><a href="clienteDatos.php" style="width:100%">Datos</a></li>
						<li class="itemMenu"><a href="galeria.php" style="width:100%">Galería</a></li>
						<li class="itemMenu"><a style="color:white; width:100%">Ofertas</a></li>
						<li class="itemMenu"><a href="consulta/consulta.php" style="width:100%">Consulta y Peluquería</a></li>
						<li class="itemMenu"><a href="tienda.php" style="width:100%">Tienda online</a></li>
						<li class="itemMenu"><a href="opiniones.php" style="width:100%">Opiniones</a></li>
						<li class="itemMenu"><a href="contacto.php" style="width:100%">Contacto</a></li>
</ul>
                                              
                                        <ul>                            

				</div>
			</header>

		<!-- Banner -->
			<section class="cabecera" id="banner" style="background-image:url(../images/fondopeque.jpeg);">
			</section>


		<!-- Three -->
                <div id="ofertas" style="margin:5% 0 5% 0; color:black; text-align:center;">
                    <div class='ofertaMedia' style='background-color:rgba(255,154,52,0.7); /*width:$tam%; */border-radius:30px; margin-left:5%; margin-bottom:2%; border:1px solid black; float:left;'>
                       <h2><strong>oferta</strong></h2>
                       <p>El pack oferta incluye:</p>
                       <ul style='text-align:left; margin-left:15%;' >
                           <li>Bono 5 cortes de pelo</li>
                           <li>Saco 5kg de pienso</li>
                       </ul>
                       <h2><strong>58 €</strong></h2> 
                    </div>
                    <div class='ofertaMedia' style='background-color:rgba(255,154,52,0.7); /*width:$tam%; */border-radius:30px; margin-left:5%; margin-bottom:2%; border:1px solid black; float:left;'>
                       <h2><strong>oferta 2</strong></h2>
                       <p>El pack oferta 2 incluye:</p>
                       <ul style='text-align:left; margin-left:15%;' >
                           <li>Colocacion de chip de tu mascota</li>
                           <li>Primeras vacunas necesarias</li>
                       </ul>
                       <h2><strong>39 €</strong></h2> 
                    </div>
		    
                       

                                     
                </div>


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