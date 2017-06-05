<?php
session_start();
include '../connect.php';

$usuario=$_POST['usuario'];
$password=$_POST['password'];
$nombre=$_POST['nombre'];
$email=$_POST['email'];
$tipo=$_POST['tipo'];

//Guardar en la base de datos
 if (!($sentencia = $conn->prepare("INSERT INTO `Usuarios` (`id`, `tipo`, `nombre`,`email`, `usuario`, `password`) 
	         VALUES (NULL, '$tipo', '$nombre','$email', '$usuario', '$password')"))) {
          echo "Fallo en la preparación: (" . $conn->errno . ") " . $conn->error;
      }
      if (!$sentencia->execute()) {
          header ('Location: registrar.php?accion=2');
      }else{
	  header ('Location: registrar.php?accion=1');
      }

?>