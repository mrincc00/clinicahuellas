<?php
      session_start();
      include_once 'connect.php';
      
      $tipo=1;
      $nombre=$_POST['nombre'];
      $usuario=$_POST['usuario'];
      $password=$_POST['contrasena'];
      $email=$_POST['email'];
 
      if (!($sentencia = $conn->prepare("INSERT INTO `Usuarios` (`id`, `tipo`, `nombre`,`email`, `usuario`, `password`) 
	         VALUES (NULL, '$tipo', '$nombre','$email', '$usuario', '$password')"))) {
          echo "Fallo en la preparación: (" . $conn->errno . ") " . $conn->error;
      }
      if (!$sentencia->execute()) {
          header ('Location: index.php?error=3');
      }else{
	  header ('Location: index.php?error=2');
      }
      
?>