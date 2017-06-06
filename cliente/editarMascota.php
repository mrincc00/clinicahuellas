<?php
session_start();
include '../connect.php';

$usuario=$_SESSION['usuario'];
$nombre=$_GET['nombre'];
$raza=$_GET['raza'];
$edad=$_GET['edad'];
$id=$_GET['id'];

if (!($sentencia = $conn->prepare("UPDATE `Mascotas` SET `nombre`='$nombre',`raza`='$raza',`edad`='$edad' WHERE `id`='$id'"))) {
          echo "Fallo en la preparación: (" . $conn->errno . ") " . $conn->error;
 }
 if (!$sentencia->execute()) {
       echo "Fallo en la ejecucion";
 }else{
       header ('Location: clienteDatos.php');      
 }
?>