<?php session_start(); ?>
<html>
<head>
		<title>Clínica Huellas</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="../assets/css/main.css" />

	</head>
   <body>
 
       <table style="margin:auto; ">
          <thead>
            <tr>
              <th>Fecha</th>
              <th>Tipo</th>
              <th>Descripcion</th>
              <th>Veterinario</th>
            </tr>
          </thead>
          <tbody>
<?php
include '../connect.php';

$idMascota=$_GET['id'];

if (!($sentencia = $conn->prepare("SELECT Usuario, tipoConsulta, Description, Veterinario, StartTime FROM `Consultas` WHERE `idMascota`='$idMascota' ORDER BY StartTime DESC"))) {
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
array_push($nombres,$row[0],$row[1],$row[2],$row[3],$row[4]);

                  $usuario=$row[0];
                  $tipo=$row[1];
                  $descripcion=$row[2];
                  $vet=$row[3];
                  $fecha=date("d-m-Y", strtotime($row[4]));
                
                  echo "<tr><td>$fecha</td><td>$tipo</td><td>$descripcion</td><td>$vet</td></tr>";
             }
        }
        else{
             echo "<tr><td colspan=5>No existen consultas de tu mascota hasta el momento</td></tr>";
        }

?>

</tbody>
</table>

</body>
<?php
if($_SESSION==null)  echo "<script>document.getElementsByTagName('body')[0].onload=function(){setTimeout(\"location.href='../index.php'\", 1);}</script>";
?>

</html>