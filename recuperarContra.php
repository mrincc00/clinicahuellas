<?php
include 'connect.php';
session_start();

$usuario=$_POST['usuario'];
$email=$_POST['email'];
$contra=substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 8); 

$correo=null;
if (!($sentencia = $conn->prepare("SELECT correo FROM Datos WHERE 1"))) {
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
		    array_push($nombres,$row[0]);
                    $correo=$row[0];                  
            }
        } 
//si existe cambiar password en BD
if (!($sentencia = $conn->prepare("UPDATE `Usuarios` SET `password`='$contra' WHERE `usuario`='$usuario'"))) {
          echo "Fallo en la preparación: (" . $conn->errno . ") " . $conn->error;
 }
 if (!$sentencia->execute()) {
       echo "Fallo en la ejecucion";
 }else{
    if($sentencia->affected_rows>0){
        //mandar correo
        $mensaje = "Ha solicitado recuperar su contraseña.\n La nueva contraseña de acceso a Clinica Huellas para el usuario $usuario es: $contra";
        $para      = $email;
        $titulo    = 'Recuperar contraseña (Clinica Huellas)';
        $cabeceras = "From: ".$correo . "\r\n" .
    "Reply-To: albaortegaflores95@gmail.com" . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
        mail($para, $titulo, $mensaje, $cabeceras);

        header('Location:index.php');
    }
    else header('Location:olvidoContra.php?error=1');
}
?>