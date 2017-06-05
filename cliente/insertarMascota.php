<?php
include '../connect.php';
session_start();
$usuario=$_SESSION['usuario'];
$nombre=$_GET['nombre'];
$edad=$_GET['edad'];
$raza=$_GET['raza'];

 if (!($sentencia = $conn->prepare("INSERT INTO `Mascotas` (`id`, `nombre`,`edad`, `raza`, `usuario`) 
	         VALUES (NULL, '$nombre', '$edad','$raza', '$usuario')"))) {
          echo "Fallo en la preparación: (" . $conn->errno . ") " . $conn->error;
      }
      if (!$sentencia->execute()) {
          echo "Fallo en la ejecucion";
      }else{
	  header ('Location: clienteDatos.php');;
      }

?>