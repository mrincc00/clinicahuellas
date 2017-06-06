<?php
session_start();
include '../connect.php';

$id=$_GET['id'];

if (!($sentencia = $conn->prepare("DELETE FROM `Mascotas` WHERE `id`='$id'"))) {
              echo "Falló la preparación: (" . $conn->errno . ") " . $conn->error;
         }
         if (!$sentencia->execute()) {
              echo "Falló la ejecución: (" . $sentencia->errno . ") " . $sentencia->error;
         }
else header('Location:clienteDatos.php');
?>