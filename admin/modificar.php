<?php
include '../connect.php';

if($_POST!=null){ 
$nombre=$_POST['nombre'];
$password=$_POST['password'];
$email=$_POST['email'];
$usuario=$_POST['usuario'];
 

if (!($sentencia = $conn->prepare("UPDATE `Usuarios` SET `password`='$password',`email`='$email',`nombre`='$nombre' WHERE `usuario`='$usuario'"))) {
          echo "Fallo en la preparación: (" . $conn->errno . ") " . $conn->error;
 }
 if (!$sentencia->execute()) {
       echo "Fallo en la ejecucion";
 }else{
       header ('Location: registrar.php?accion=3');
       
 }
}
?>