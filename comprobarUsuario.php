<?php
session_start();
include_once'connect.php';
 $usuario=$_POST['usuario'];
 $pass=$_POST['contrasena'];
 $tipo=$_POST['tipo'];

 
  if (!($sentencia = $conn->prepare("SELECT usuario,password,nombre,email FROM Usuarios WHERE usuario='$usuario' AND password='$pass' AND tipo=$tipo"))) {
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
		    array_push($nombres,$row[0],$row[1],$row[2],$row[3]);
	     }
             if($nombres!=null){
                  $usuario=$nombres[0];
                  $password=$nombres[1];
                  $nombre=$nombres[2];
                  $email=$nombres[3];  
                  $_SESSION['nombre']=$nombre;
                  $_SESSION['usuario']=$usuario;
                  $_SESSION['password']=$password;
                  $_SESSION['email']=$email;
                  $_SESSION['tipo']=$tipo;
             }
             if(isset($_POST['recordar']) && !empty($_POST['recordar'])){
                 setcookie("usuarioCliente", $usuario, time()+3600); 
                 setcookie("passCliente", $pass, time()+3600); 
             }
             if($tipo==1) header('Location: cliente/clienteDatos.php');
             if($tipo==2) header('Location: admin/adminDatos.php');
             if($tipo==3) header('Location: personal/personalDatos.php');
        }
        else{
             header ('Location: index.php?error=1');
        }
      
?>