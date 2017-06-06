<?php session_start(); ?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Clínica Huellas</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="../../assets/css/main.css" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    
	</head>
	<body id="body">
		<header id="header" style="padding-top:0;" >
			<div class="inner" >
				<p class="logo" style="font-size:150%"><strong>Clínica Huellas</strong> </p><br/>
				<p class="logo" id="tipo" style=""><strong>CLIENTE</strong></p>
				<a id="cerrar" style="" href="../../cerrarSesion.php"><img style="width:30%" src="../../images/logout.png"></a>
				<nav id="menuNormal" style="padding-top:2%; width:90%;" >
					<a href="../clienteDatos.php">Datos</strong></a>
					<a href="../galeria.php">Galería</a>
					<a href="../ofertas.php">Ofertas</a>
					<a><strong>Consulta y Peluquería</strong></a>
					<a href="../tienda.php">Tienda online</a>
					<a href="../opiniones.php">Opiniones</a>
					<a href="../contacto.php">Contacto</a>
				</nav>
				
				<ul id="menu" style="color:black;list-style: none; float:left; margin-left:0; width:70%; margin-top:2%;" >
					<li id="etiquetaMenu" onclick="return abrirMenu(0);" style="padding:0; margin:0; float:left"><a href ><img src="../../images/menu.png" style="width:70%; margin-bottom:3%; margin-left:0;"></a></li>
					<ul id="desplegable" style="display:none; list-style: none; margin-top:15% " >
						<li class="itemMenu"><a href="../clienteDatos.php" style="width:100%">Datos</a></li>
						<li class="itemMenu"><a href="../galeria.php" style="width:100%">Galería</a></li>
						<li class="itemMenu"><a href="../ofertas.php" style="width:100%">Ofertas</a></li>
						<li class="itemMenu"><a style="color:white">Consulta y Peluquería</a></li>
						<li class="itemMenu"><a href="../tienda.php" style="width:100%">Tienda online</a></li>
						<li class="itemMenu"><a href="../opiniones.php" style="width:100%">Opiniones</a></li>
						<li class="itemMenu"><a href="../contacto.php" style="width:100%">Contacto</a></li>
					</ul>
				</ul>
			</div>
		</header>
		
		<!--BANNER-->
		<section class="cabecera" id="banner" style="background-image:url(../../images/fondopeque.jpeg);  ">
				
		</section>
		
		<div class="inner" style="margin-top:5%" >
			<form id="frm" method="post" action="consulta.php" >
				<label for="tipo">Tipo de consulta:</label>
				<select name="tipo" id="tipo" required>
					<option disabled selected value>---Seleccione el tipo de consulta---</option>
					<option value="consulta">Consulta</option>
					<option value="peluqueria">Peluquería</option>
				</select></br>
				<label for="fecha" >Fecha:</label><input type="date" required placeholder="Seleccione la fecha" name="fecha" id="fecha" style="width:70%; float:center;"></br>
				<input type="submit" value="CONSULTAR" name="consulta"  id="consulta" />
			</form>
		</div>
		
		<div id="citas" >
			<h3 style="font-weight:900; text-align:center;"><strong> CITAS </strong></h3>
			<table id="myTable" >
				<thead>
					<tr>
						<th> Fecha </th>
						<th> Veterinario </th>
					</tr>
				</thead>
				<tbody id="listaconsulta">
					<?php
 include '../../connect.php';
						if($_POST!=NULL){
							if($_POST['consulta']=="CONSULTAR"){

								$tipo=$_POST['tipo'];
								$fecha=$_POST['fecha'];

								if (!($sentencia = $conn->prepare("SELECT Veterinario, StartTime FROM `Consultas` WHERE `fecha`='$fecha' AND `tipoConsulta`='$tipo'"))) {
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
										array_push($nombres,$row[0],$row[1]);
										$vet=$row[0];
										$fechaEscogida=date("d-m-Y h:i", strtotime($row[1]));
										echo"<tr><td>$fechaEscogida</td><td>$vet</td>";
								
								
									}
								}
								else  echo "<tr><td colspan=2>No hay consultas para el día seleccionado</td></tr>";
						
								
							}
						}
					?>
				</tbody>
			</table>
	</div>
	<div id="formulario" >
		<h3 style="font-weight:900; text-align:center;"><strong> SOLICITAR </strong></h3>
		<form id="frm" method="post" action="consulta.php"  style="width:80%" onSubmit="document.getElementById('fechaSeleccionada').removeAttribute('disabled');">
				<label for="fechaSeleccionada">Fecha:</label><input type="date" id="fechaSeleccionada" name="fechaSeleccionada"/></br>
				<label for="tipoSolicita" style="margin-top:2%">Tipo de consulta:</label>
				<select name="tipoSolicita" id="tipoSolicita" required>
					<option disabled selected value>---Seleccione el tipo de consulta---</option>
					<option value="consulta">Consulta</option>
					<option value="peluqueria">Peluquería</option>
				</select></br>
				<label for="fechaSolicita" style="margin-top:2%">Hora:</label><input type="time" required list="listaHoras" name="fechaSolicita" id="fechaSolicita" style="width:70%; float:center;"/></br>
				<label for="mascotaSolicita" style="margin-top:2%">Mascota:</label>
				<select id="mascotaSolicita" name="mascotaSolicita" required>
					<option disabled selected value>---Seleccione su mascota---</option>
					<?php
						include '../../connect.php';
						$usuario=$_SESSION['usuario'];
					
						if (!($sentencia = $conn->prepare("SELECT nombre,id FROM `Mascotas` WHERE `usuario`='$usuario'"))) {
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
								array_push($nombres,$row[0],$row[1]);

								$nombre=$row[0];
                  
								$id=$row[1];
								echo "<option value='$nombre&$id'>$nombre</option>";
								
							}
						}
					
						else{
							echo "<option disabled value> No existen mascotas aún, añade los datos de tu mascota</option>";
						}
		
					?>
				</select>
				<label for="vetSolicita" style="margin-top:2%">Veterinario:</label>
					<select id="vetSolicita" name="vetSolicita" required>
						<option disabled selected value>---Seleccione el veterinario---</option>
						<?php
						include '../../connect.php';
					
						if (!($sentencia = $conn->prepare("SELECT usuario FROM `Usuarios` WHERE `tipo`=3"))) {
							echo "Fallo en la preparación: (" . $conn->errno . ") " . $conn->error;
						}

						if (!$sentencia->execute()) {
							echo "Fallo la ejecución: (" . $sentencia->errno . ") " . $sentencia->error;
						}
						if (!($result = $sentencia->get_result())) {
							echo "<script>window.onload=function(){alert('No se ha podido establecer la conexion con el servidor');}</script>"; 
						}
						if ($result->num_rows > 0) {
							$nombres = array();

							while($row = $result->fetch_array()){	    
								array_push($nombres,$row[0]);

								$usuario=$row[0];
								echo "<option value='$usuario'>$usuario</option>";
								
							}
						}
						else{
							echo "<option disabled value> No existen veterinarios</option>";
						}
		
					?>
					</select>
				<label for="descripcionSolicita" style="margin-top:2%">Descripcion:</label><input type="text" required id="descripcionSolicita" name="descripcionSolicita" />
				<input type="submit" value="SOLICITAR" name="solicita" style="font-weight:900; font-size:70%; text-align:center;" id="solicita" />
			</form>
			<datalist id="listaHoras">
				<option value="09:00">
				<option value="09:30">
				<option value="10:00">
				<option value="10:30">
				<option value="11:00">
				<option value="11:30">
				<option value="12:00">
				<option value="12:30">
				<option value="13:00">
				<option value="13:30">
				<option value="14:00">
				<option value="14:30">
				<option value="17:00">
				<option value="17:30">
				<option value="18:00">
				<option value="18:30">
				<option value="19:00">
				<option value="19:30">
				<option value="20:00">
				<option value="20:30">
			</datalist>
				
				
	</div>
	</body>
	
	<?php
		include '../../connect.php';
		$nombre=$_SESSION['usuario'];
		if($_SESSION==null)  echo "<script>document.getElementsByTagName('body')[0].onload=function(){setTimeout(\"location.href='../../index.php'\", 1);}</script>";
		
		if($_POST!=NULL){
			if($_POST['consulta']=="CONSULTAR"){
					$fecha=$_POST['fecha'];
					echo "<script>window.onload=function(){document.getElementById('fechaSeleccionada').value='$fecha';document.getElementById('fechaSeleccionada').disabled=true;document.getElementById('citas').style.display='block';document.getElementById('formulario').style.display='block';}</script>";
			}
			if($_POST['solicita']=="SOLICITAR"){
				$consulta=false;
				$veterinarioHora=false;
				$mascotaHora=false;
				$fecha=$_POST['fechaSeleccionada'];
				list($year, $mes, $dia)=explode("-", $fecha);
				$horaEscogida=$_POST['fechaSolicita'];
				list ($hora, $minuto)=explode(":", $horaEscogida);
				$guion="-";
				$espacio=" ";
				$dospuntos=":";
				$segundos="00";
				$fechaTotal=$year.$guion.$mes.$guion.$dia.$espacio.$hora.$dospuntos.$minuto.$dospuntos.$segundos;
				$vet=$_POST['vetSolicita'];
				
				$tipo=$_POST['tipoSolicita'];
				$descripcion=$_POST['descripcionSolicita'];				
				$mascotaId=$_POST['mascotaSolicita'];
				list($mascota, $idMascota)=explode("&", $mascotaId);
								
				echo "<script>window.onload=function(){document.getElementById('citas').style.display='block';document.getElementById('formulario').style.display='block';}</script>";
				
				if($minuto == "00" || $minuto == "30"){
					if($hora =="09" || $hora =="10" || $hora == "11" || $hora == "12" || $hora == "13" || $hora == "14" || $hora == "17" || $hora == "18" || $hora == "19" || $hora == "20"){
						if (!($sentencia = $conn->prepare("SELECT Veterinario, StartTime FROM `Consultas` WHERE (`Veterinario`='$vet') AND (`StartTime`='$fechaTotal') "))) {
							echo "Fallo en la preparación: (" . $conn->errno . ") " . $conn->error;
						}

						if (!$sentencia->execute()) {
							echo "Fallo la ejecución: (" . $sentencia->errno . ") " . $sentencia->error;
						}
						if (!($result = $sentencia->get_result())) {
							echo "No se ha podido establecer la conexion con el servidor";
						}
						if ($result->num_rows > 0) {
							$veterinarioHora=true;
						}
						if($veterinarioHora==true) echo "<script>window.onload=function(){alert('Ese veterinario tiene otra consulta en esa hora');}</script>";
						
						if($veterinarioHora==false){
							if (!($sentencia = $conn->prepare("SELECT Mascota, StartTime FROM `Consultas` WHERE (`Mascota`='$mascota') AND (`StartTime`='$fechaTotal') "))) {
								echo "Fallo en la preparación: (" . $conn->errno . ") " . $conn->error;
							}

							if (!$sentencia->execute()) {
								echo "Fallo la ejecución: (" . $sentencia->errno . ") " . $sentencia->error;
							}
							if (!($result = $sentencia->get_result())) {
								echo "No se ha podido establecer la conexion con el servidor";
							}
							if ($result->num_rows > 0) {
								$mascotaHora=true;
							}
							if($mascotaHora==true) echo "<script>window.onload=function(){alert('Ese mascota tiene otra consulta en esa hora');}</script>";
							
							if($mascotaHora==false){
					
				
								if (!($sentencia = $conn->prepare("SELECT tipoConsulta, Veterinario, StartTime, fecha FROM `Consultas` WHERE (`Veterinario`='$vet') AND (`fecha`='$fecha') AND (`StartTime`='$fechaTotal') AND(`tipoConsulta`='$tipo')"))) {
									echo "Fallo en la preparación: (" . $conn->errno . ") " . $conn->error;
								}

								if (!$sentencia->execute()) {
									echo "Fallo la ejecución: (" . $sentencia->errno . ") " . $sentencia->error;
								}
								if (!($result = $sentencia->get_result())) {
									echo "No se ha podido establecer la conexion con el servidor";
								}
								if ($result->num_rows > 0) {
									$consulta=true;
								}
						
						
								if($consulta==false){
									if (!($sentencia = $conn->prepare("INSERT INTO `Consultas` (`Id`, `Usuario`,`tipoConsulta`, `Description`, `idMascota`, `Mascota`, `Veterinario`, `StartTime`, `fecha`) 
										VALUES (NULL, '$nombre', '$tipo','$descripcion', '$idMascota', '$mascota', '$vet', '$fechaTotal', '$fecha')"))) {
										echo "Fallo en la preparación: (" . $conn->errno . ") " . $conn->error;
									}
									if (!$sentencia->execute()) {
										echo "Fallo en la ejecucion";
									}
								}
								if($consulta==true) echo "<script>window.onload=function(){alert('Esa hora en ese día, ese veterinario está ocupado');}</script>";
							}
						}
					}
				}
				
				
			}
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