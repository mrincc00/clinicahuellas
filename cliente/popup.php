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
					<p class="logo" id="tipo"  ><strong>CLIENTE</strong></p>
					
			</header>

		<!-- Banner -->
			<section class="cabecera" id="banner" style="background-image:url(../images/fondopeque.jpeg);">				
			</section>


<?php 
$id=$_POST['mascota'];
echo"<iframe style=' overflow-x:scroll; width:80%; height:350px; margin:5% 10% 5% 10%;' src=\"historial.php?id=$id\"></iframe >";
?>
  </body>
 </html>