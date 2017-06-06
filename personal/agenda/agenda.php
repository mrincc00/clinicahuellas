<?php session_start(); ?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Clínica Huellas</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="../../assets/css/main.css" />
		

	</head>

	<body id="body">
	<!-- Header -->
	<header id="header" style="padding-top:0;" >
		<div class="inner" >
			<p class="logo" style="font-size:150%"><strong>Clínica Huellas</strong> </p><br/>
			<p class="logo" id="tipo" style=""><strong>PERSONAL</strong></p>
			<a id="cerrar" style="" href="../../cerrarSesion.php"><img style="width:30%" src="../../images/logout.png"></a>
			<nav id="menuNormal" style="padding-top:2%; width:90%;" >
				<a href="../personalDatos.php">Datos</a>
				<a><strong>Agenda</strong></a>
			</nav>
			
			<ul id="menu" style="color:black;list-style: none; float:left; margin-left:0; width:70%; margin-top:2%;" >
				<li id="etiquetaMenu" onclick="return abrirMenu(0);" style="padding:0; margin:0; float:left"><a href ><img src="../../images/menu.png" style="width:70%; margin-bottom:3%; margin-left:0;"></a></li>
				<ul id="desplegable" style="display:none; list-style: none; margin-top:15% " >
					<li class="itemMenu"><a href="../personalDatos.php" style="width:100%">Datos</a></li>
					<li class="itemMenu"><a style="color:white">Agenda</a></li>
				</ul>
			</ul>						                            
		</div>			
	</header>
	
	<!--BANNER-->
	<section class="cabecera" id="banner" style="background-image:url(../../images/fondopeque.jpeg);  ">
	</section>
	
	<div class="inner" style="margin-top:5%" >
		<form id="frmPersonal" method="post" action="agenda.php" >
				<label for="tipo" >Tipo de consulta:</label>
				<select name="tipo" id="tipo">
					<option disabled selected value>---Seleccione el tipo de consulta---</option>
					<option value="consulta">Consulta</option>
					<option value="peluqueria">Peluquería</option>
				</select></br>
				<label for="fecha" >Fecha:</label><input type="date" placeholder="Seleccione la fecha" name="fecha" id="fecha" /></br>
				<input type="submit" value="CONSULTAR" name="consulta" style="font-weight:900; font-size:70%; text-align:center;" id="consulta" />
			</form>
	</div>
	
	<div id="citasPersonal" >
		<h3 style="font-weight:900; text-align:center;"><strong> CITAS </strong></h3>
		<div id="imprimir">
			<form id="frmAgenda" method="post" action="pdfAgenda.php" target= "_blank" style=" text-align:center; margin:0 15% 0 15%; padding:2% 5% 2% 5%;" onSubmit="document.getElementById('fechaSeleccionada').removeAttribute('disabled');">
				<label for="fechaSeleccionada">Fecha:</label><input type="date" id="fechaSeleccionada" name="fechaSeleccionada"/>
				<input type="submit" value="IMPRIMIR AGENDA" name="imprimir" style="font-weight:900; font-size:70%; text-align:center;" id="imprimir" />
			</form>		
		</div>
		<table id="myTable" >
			<thead>
				<tr>
					<th> Usuario </th>
					<th> Fecha </th>
					<th> Tipo de consulta </th>
					<th> Mascota </th>
					<th> Descripcion </th>
				</tr>
				</thead>
				<tbody id="listaconsulta">
					<?php
						include '../../connect.php';
						if($_POST!=NULL){
							if($_POST['consulta']=="CONSULTAR"){

								$tipo=$_POST['tipo'];
								$fecha=$_POST['fecha'];
								$usuario=$_SESSION['usuario'];
								if (!($sentencia = $conn->prepare("SELECT Usuario, tipoConsulta, Description, Mascota, StartTime FROM `Consultas` WHERE (`Veterinario`='$usuario') AND (`fecha`='$fecha') AND(`tipoConsulta`='$tipo')"))) {
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
										array_push($nombres,$row[0],$row[1], $row[2], $row[3], $row[4]);
										$nombre=$row[0];
										$tipo=$row[1];
										$descripcion=$row[2];
										$mascota=$row[3];
										$fecha=date("d-m-Y h:i", strtotime($row[4]));;
										
										echo "<tr id='$id'><td><h1>$nombre</h1></td><td><h1>$fecha</h1></td><td>$tipo</td><td><h1>$mascota</h1></td><td><h1>$descripcion</h1></td></tr>";
										echo"\n";
									}
								}
								else{
									echo "<tr><td colspan=2>No hay consultas para el día seleccionado</td></tr>";
								}
								
							}
						}
					?>
				</tbody>
			</table>
	</div>
	</body>
	
	<?php
		if($_SESSION==null)  echo "<script>document.getElementsByTagName('body')[0].onload=function(){setTimeout(\"location.href='../../index.php'\", 1);}</script>";
		
		if($_POST!=NULL){
			if($_POST['consulta']=="CONSULTAR"){
					$fecha=$_POST['fecha'];
					echo "<script>window.onload=function(){document.getElementById('fechaSeleccionada').value='$fecha';document.getElementById('fechaSeleccionada').disabled=true;document.getElementById('citasPersonal').style.display='block';}</script>";
			}
			
		}
	?>
</html>