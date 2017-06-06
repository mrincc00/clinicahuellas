<?php session_start() ?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Clínica Huellas</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="../assets/css/main.css" />
                <script language="javascript" src="../assets/js/cliente.js"></script>

	</head>
	<body id="body">

		<!-- MENU -->
			<header id="header" style="padding-top:0;" >
				<div class="inner" >
					<p class="logo" style="font-size:150%"><strong>Clínica Huellas</strong> </p><br/>
					<p class="logo" id="tipo" style=""><strong>CLIENTE</strong></p>
					<a id="cerrar" style="" href="../cerrarSesion.php"><img style="width:30%" src="../images/logout.png"></a>
                                        <nav id="menuNormal" style="padding-top:2%; width:90%;" >
						<a><strong>Datos</strong></a>
						<a href="galeria.php">Galería</a>
						<a href="ofertas.php">Ofertas</a>
						<a href="consulta/consulta.php">Consulta y Peluquería</a>
						<a href="tienda.php">Tienda online</a>
						<a href="opiniones.php">Opiniones</a>
						<a href="contacto.php">Contacto</a>
					</nav>       
                                        <ul id="menu" style="color:black;list-style: none; float:left; margin-left:0; width:70%; margin-top:2%;" >
                                            <li id="etiquetaMenu" onclick="return abrirMenu(0);" style="padding:0; margin:0; float:left"><a href ><img src="../images/menu.png" style="width:70%; margin-bottom:3%; margin-left:0;"></a></li>
                                            <ul id="desplegable" style="display:none; list-style: none; margin-top:15% " >
                                                <li class="itemMenu"><a style="color:white;">Datos</a></li>
						<li class="itemMenu"><a href="galeria.php" style="width:100%">Galería</a></li>
						<li class="itemMenu"><a href="ofertas.php" style="width:100%">Ofertas</a></li>
						<li class="itemMenu"><a href="consulta/consulta.php" style="width:100%">Consulta y Peluquería</a></li>
						<li class="itemMenu"><a href="tienda.php" style="width:100%">Tienda online</a></li>
						<li class="itemMenu"><a href="opiniones.php" style="width:100%">Opiniones</a></li>
						<li class="itemMenu"><a href="contacto.php" style="width:100%">Contacto</a></li>
</ul>
                                              
                                        <ul>                            
				</div>
			</header>

		<!-- Banner -->
			<section class="cabecera" id="banner" style="background-image:url(../images/fondopeque.jpeg);  ">
				
			</section>


		<!-- Three -->
				<div class="inner" style="margin-top:5%" >
					<h3 style="font-weight:900; text-align:center;"> Visualizar y modificar datos de usuario</h3>
					<form style="" method="post" action="../guardarCambios.php" onSubmit="return cambiar();" id="datos">
                                                <label style="width:30%;float:left;text-align:right;padding-right:5%" for="usuario">Usuario:</label><input disabled type="text" name="usuario" placeholder="Usuario" id="usuario" style="width:70%; float:right;"/><br/><br/><br/>
						<label style="width:30%;float:left;text-align:right;padding-right:5%" for="nombre">Nombre:</label><input disabled type="text" name="nombre" placeholder="Nombre y Apellidos" id="nombre" style="width:70%; float:right;"/><br/><br/><br/>
						<label style="width:30%;float:left;text-align:right;padding-right:5%" for="email">E-mail:</label><input disabled type="text" name="email" placeholder="E-mail" id="email" style="width:70%; float:right;"/><br/><br/><br/>
						<label style="width:30%;float:left;text-align:right;padding-right:5%" for="password">Contraseña:</label><input disabled type="password" name="password" placeholder="Contraseña" id="password" style="width:70%; float:right;"/><br/><br/><br/>
						<button type="button" style=" font-size:70%;" onclick="editarCliente();" id="botonEditar">Modificar datos</button>
						<input type="submit" value="GUARDAR CAMBIOS" name="registrar" style="font-weight:900; font-size:70%;" disabled id="guardarCambios" onclick="guardarCambios();" />	
                                                 <?php session_start(); 
$usuario=$_SESSION['usuario']; 
$nombre=$_SESSION['nombre'];
$password=$_SESSION['password'];
$email=$_SESSION['email'];
echo "<button type='button' style='font-size:60%;' onclick='rellenar(\"$usuario\",\"$password\",\"$nombre\",\"$email\"); cancelarUsuario();' id='botonCancelarUsuario' disabled>Cancelar</button>";	
?>						
					</form>
					<div id="mascotas" style="overflow-x:scroll; overflow-y:hidden;">
						<h1><strong> MASCOTAS </strong></h1>
						<table id="myTable">
							<tr>
								<th> Nombre </th>
								<th> Raza </th>
								<th> Edad </th>
								<th> Historial </th>
							</tr>
<?php
include '../connect.php';

$usuario=$_SESSION['usuario'];
if (!($sentencia = $conn->prepare("SELECT nombre,edad,raza,id FROM `Mascotas` WHERE `usuario`='$usuario'"))) {
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

                  $nombre=$row[0];
                  $edad=$row[1];
                  $raza=$row[2];
                  $id=$row[3];
                  echo "<tr id='$id'><td><h1>$nombre</h1></td><td>$raza</td><td>$edad</td><td><button onclick='abrir($id)' style='border-radius:15px; padding-left:2%; padding-right:2%;'>-historial-</button></td></tr>";
echo"\n";
             }
        }
        else{
             echo "<p> No existen mascotas aún, añade los datos de tu mascota</p>";
        }

?>
						</table>
						<button id="botonMascota" onclick="insertarMascota();"> Añadir</button>
						<button id="botonEditarMascota" onclick="editarMascota();"> Editar </button>
						<button id="botonEliminar" onclick="eliminar();"> Eliminar</button>	
						<button id="botonMascotaEditada"  disabled> Guardar cambios </button>
                                                <button id="botonCancelar" disabled>Cancelar</button>
					</div>
				</div>
	</body>
              <script>
                  function rellenar(usuario,password,nombre,email){
                      document.getElementById("nombre").value=nombre;
                      document.getElementById("email").value=email;
                      document.getElementById("usuario").value=usuario;
                      document.getElementById("password").value=password;
                  }
                  function cambiar(){
                      var usuario=document.getElementById("usuario").value;
                      var password=document.getElementById("password").value;
                      var nombre=document.getElementById("nombre").value;
                      var email=document.getElementById("email").value;
                
                      if(usuario.length==0 || password.length==0 || nombre.length==0 || email.length==0){
                           alert("Todos los datos deben estar completos");
                           return false;
                      }
                      return true;

                  }
                  function error( valor){
                      if(valor==1) alert("Usuario modificado");
                  }

                  function abrir(id){
document.getElementById('mascotas').innerHTML += "<form  id='formHistorial' method='POST' action='popup.php' target='nueva' >";
   var form=document.getElementById('formHistorial');
   form.style.display='none';
   var input=document.createElement('input');
   input.name='mascota';
   input.value=id;
   input.type='text';   
form.appendChild(input); 
form.submit();                      
                  }
                  function cambiarBotones(valor,id){
                      var fila=valor;
                      document.getElementById("botonMascota").disabled=true;
                      document.getElementById("botonEditarMascota").disabled=true;
                      document.getElementById("botonEliminar").disabled=true;
                      document.getElementById("botonCancelar").removeAttribute("disabled");
                      document.getElementById("botonMascotaEditada").removeAttribute("disabled");
                      document.getElementById("botonCancelar").setAttribute("onclick","cambio("+fila+");");
                      document.getElementById("botonMascotaEditada").setAttribute("onclick","mascotaEditada('editar','"+fila+"','"+id+"')");
                  }
                  function cambio(fila){
                      var row=document.getElementsByTagName("tr")[fila];
                      row.setAttribute("contenteditable","false");
                      row.removeAttribute("style");
                      //$('#mascotas').load('#mascotas');
                      location.href="clienteDatos.php";
                  }

	</script>
        <?php
           include_once 'connect.php';
           $usuario=$_SESSION["usuario"];
           $password=$_SESSION["password"];
           $nombre=$_SESSION["nombre"];
           $email=$_SESSION["email"];
           echo "<script>window.onload=function() {";
          if (!empty($_GET)) {
                if($_GET['accion']!=null){
                   $accion=$_GET['accion'];
                   echo "error($accion);";
                }
                if($_GET['mascota']!=null){
                    $fila=$_GET['mascota'];
                    $id=$_GET['id'];
                    echo "var filas=document.getElementsByTagName('tr');";
                    echo "filas[$fila].setAttribute('contenteditable', 'true');";
                    echo"filas[$fila].style='border: 2px solid black';";
                    echo "cambiarBotones(".$fila.",".$id.");";
                }
          }    
           echo "rellenar('".$usuario."','".$password."','".$nombre."','".$email."');";
           echo "}</script>";
        ?>
<?php
if($_SESSION==null)  echo "<script>document.getElementsByTagName('body')[0].onload=function(){setTimeout(\"location.href='../index.php'\", 1);}</script>";
?>

<script>
function abrirMenu(valor){
if(valor==0){
document.getElementById("desplegable").style.display='block';
document.getElementById("etiquetaMenu").onclick="return abrirMenu(1)";
}
if(valor==1){
document.getElementById("desplegable").style.display='none';
document.getElementById("etiquetaMenu").onclick="return abrirMenu(0)";
}
return false;
}
</script>          
              
</html>