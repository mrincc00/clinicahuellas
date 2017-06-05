<?php
session_start();
include_once 'connect.php';

$nombre=$_POST['nombre'];
$password=$_POST['password'];
$email=$_POST['email'];
$tipo=$_SESSION['tipo'];
$usuario=$_SESSION['usuario'];

echo "nombre:".$nombre." contraseña:".$password." email:".$email." tipo:".$tipo." usuario:".$usuario; 
if (!($sentencia = $conn->prepare("UPDATE `Usuarios` SET `password`='$password',`email`='$email',`nombre`='$nombre' WHERE `usuario`='$usuario'"))) {
          echo "Fallo en la preparación: (" . $conn->errno . ") " . $conn->error;
 }
 if (!$sentencia->execute()) {
       echo "Fallo en la ejecucion";
 }else{
      $_SESSION['password']=$password;
      $_SESSION['nombre']=$nombre;
      $_SESSION['email']=$email;

       if($tipo==1) header ('Location: cliente/clienteDatos.php?accion=1');
       if($tipo==2) header ('Location: admin/adminDatos.php?accion=1');
       if($tipo==3) header ('Location: personal/personalDatos.php?accion=1');
	 
 }

?>