<!DOCTYPE HTML>
<html>
	<head>
		<title>Clínica Huellas</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="../assets/css/main.css" />
                <script language="javascript" src="../assets/js/admin.js"></script>
	</head>
	<body>

		<!-- MENU -->
			<header id="header" style="padding-top:0;">
				<div class="inner" >
					<p class="logo" style="font-size:150%"><strong>Clínica Huellas</strong> </p><br/>
					<p class="logo" id="tipo"><strong>ADMINISTRADOR</strong></p>
					<a id="cerrar" href="../cerrarSesion.php"><img style="width:30%" src="../images/logout.png"></a>
                                        <nav id="menuNormal" style="padding-top:2%; width:90%;" >
						<a href="adminDatos.php">Datos</a>
						<a href="registrar.php">Registrar y Editar</a>
                                                <a href="listaClientes.php">Clientes</a>
                                                <a href="copiaBd.html">Copiar BD</a>
                                                <a href="eliminarComentarios.php">Eliminar comentarios</a>
                                                <a href="cambiarDatos.php">Datos clínica</a>
                                                <a><strong>Modificar ofertas</strong></a>
                                                <a href="insertarFotos.php">Actualizar galeria</a>
					</nav>
<ul id="menu" style="color:black;list-style: none; float:left; margin-left:0; width:70%; margin-top:2%;" >
                                            <li id="etiquetaMenu" onclick="return abrirMenu(0);" style="padding:0; margin:0; float:left"><a href ><img src="../images/menu.png" style="width:70%; margin-bottom:3%; margin-left:0;"></a></li>
                                            <ul id="desplegable" style="display:none; list-style: none; margin-top:15% " >
                                                <li class="itemMenu"><a href="adminDatos.php" style="width:100%;">Datos</a></li>
						<li class="itemMenu"><a href="registrar.php" style="width:100%;">Registrar y Editar</a></li>
                                                <li class="itemMenu"><a style="width:100%;" href="listaClientes.php">Clientes</a></li>
                                                <li class="itemMenu"><a style="width:100%;" href="copiaBd.php">Copiar BD</a></li>
                                                <li class="itemMenu"><a style="width:100%;" href="eliminarComentarios.php">Eliminar comentarios</a></li>
                                                <li class="itemMenu"><a style="width:100%;" href="cambiarDatos.php">Datos clínica</a></li>
                                                <li class="itemMenu"><a style="width:100%;color:white;">Modificar ofertas</a></li>
                                                <li class="itemMenu"><a style="width:100%;" href="insertarFotos.php">Actualizar galeria</a></li>
</ul>
</ul>

				</div>
			</header>

		<!-- Banner -->
			<section class="cabecera" id="banner" style="background-image:url(../images/fondopeque.jpeg);">
			</section>


                <div id="ofertasActuales" >
                   <h3 style="text-align:center;"> Ofertas actuales:</h3>
			<table >
                           <tr><th>NOMBRE</th><th colspan=2 style="text-align:center"> OPCIONES</th>
                           <tbody>
<?php
include '../connect.php';
if (!($sentencia = $conn->prepare("SELECT id,titulo,precio FROM `Ofertas` WHERE 1"))) {
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
               array_push($nombres,$row[0],$row[1],$row[2]);

               $id=$row[0];
               $titulo=$row[1];
               $precio=$row[2];
               echo "<tr><td id='oferta$id' onclick='expandir($id);'>$titulo ($precio €)</td><td><button onclick='expandir($id);' style='font-size:70%;'>-caracteristicas-</button></td><td><a href='cambiarOfertas.php?eliminar=$id'>Eliminar</a></td></tr>\n";            
             }
        }
        else{
             echo "<p> No existen ofertas aún.</p>";
        }

?>

                           </tbody>
                        </table>

                        <div id="caracteristicas" style="display:none">
                           <h1 id="nombre">Características de la oferta seleccionada:</h1>
                           <textarea rows=4></textarea>
                        </div>
                </div>					
		<div id="nuevaOferta" style="" >
                   <h3 style="text-align:center;"> Añadir oferta:</h3>
                   <form method="post" action="cambiarOfertas.php" id="formOfertas">
                      <input type="text" name="tipo" value="nueva" style="display:none"/>
                      <input type="text" name="nombre" placeholder="Nombre de la oferta" required /><br/>                      
                      <input type="text" name="caract1" placeholder="Característica 1" required/>
                      <a href onclick="return insertarInput();" >Añadir característica</a><br/><br/>
                      <input type="number" name="precio" step="0.01" min="0" placeholder="Precio" required/><br/><br/>
                      <input type="submit" name="insertar" value="insertar"/>
                      <button type="button" onclick="document.getElementById('formOfertas').reset();">Cancelar</button>
                   </form>

                </div>		

	</body>


<?php
echo "<script>\nfunction expandir(id,valor){\n
   var form=document.createElement('form');\n
   form.method='POST';\n
   form.action='cambiarOfertas.php';\n
   var input=document.createElement('input');\n
   input.name='oferta';\n
   input.value=id;\n
   input.type='text';\n
   var input2=document.createElement('input');\n
   input2.name='tipo';\n
   input2.value='caracteristica';\n
   input2.type='text';\n
form.appendChild(input); 
form.appendChild(input2);
document.getElementsByTagName('body')[0].appendChild(form);
form.submit();";

echo "}\n</script>";
?>


<?php
include '../connect.php';
if($_POST!=null){
  if($_POST['tipo']=='caracteristica'){
  echo "<script>\nwindow.onload=function(){\n";
  $id=$_POST['oferta'];
if (!($sentencia = $conn->prepare("SELECT descripcion FROM `caracteristicas` WHERE idOferta=$id"))) {
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

               $descrip=$row[0];
               
               echo "document.getElementsByTagName('textarea')[0].value+='$descrip \\n';\n";
             }
        }
  echo "document.getElementById('caracteristicas').style.display='block';
  ;}</script>";
  }
  if($_POST['tipo']=='nueva'){
    $num=count($_POST);
    /*OBTENER DATOS*/
    $caracteristicas=array();
    for($i=1; $i<=$num-4; $i++){
       $numerocarac='caract'.$i;
       array_push($caracteristicas,$_POST[$numerocarac]);
    }
    $nombre=$_POST['nombre'];
    $precio=$_POST['precio'];

    /*INSERTA EN TABLA OFERTAS*/
    if (!($sentencia = $conn->prepare("INSERT INTO `Ofertas` (`id`, `titulo`, `precio`) VALUES (NULL, '$nombre', '$precio')"))) {
      echo "Fallo en la preparación: (" . $conn->errno . ") " . $conn->error;
    }
    if (!$sentencia->execute()) {
      echo "Fallo de ejecucion";
    }
    /*BUSCA EL ID OFERTA*/ 
    if (!($sentencia = $conn->prepare("SELECT id FROM `Ofertas` WHERE `titulo`='$nombre'"))) {
      echo "Fallo en la preparación: (" . $conn->errno . ") " . $conn->error;
    }
    if (!$sentencia->execute()) {
      echo "Fallo de ejecucion";
    }if (!($result = $sentencia->get_result())) {
		      echo "No se ha podido establecer la conexion con el servidor";
	}
	if ($result->num_rows > 0) {
             $nombres = array();

	     while($row = $result->fetch_array()){
		    array_push($nombres,$row[0]);
                   $id=$row[0];
         }
}
    /*INSERTA LAS CARACTERISTICAS*/
for($i=0; $i<count($caracteristicas); $i++){
if (!($sentencia = $conn->prepare("INSERT INTO `caracteristicas` (`id`, `idOferta`, `descripcion`) VALUES (NULL, '$id', '$caracteristicas[$i]')"))) {
      echo "Fallo en la preparación2: (" . $conn->errno . ") " . $conn->error;
    }
    if (!$sentencia->execute()) {
      echo "Fallo de ejecucion";
    }
}
echo "<script>window.onload=function(){setTimeout(\"location.href='cambiarOfertas.php'\", 1);}</script>"; 
    
  }
}
?>
<?php
include '../connect.php';
if($_GET!=null){
echo "<script>window.onload=function(){alert('get');}</script>";
$id=$_GET['eliminar'];
$continuar=1;
         if (!($sentencia = $conn->prepare("DELETE FROM `Ofertas` WHERE `id`='$id'"))) {
              echo "Falló la preparación: (" . $conn->errno . ") " . $conn->error;
              $continuar=0;
         }
         if (!$sentencia->execute()) {
              echo "Falló la ejecución: (" . $sentencia->errno . ") " . $sentencia->error;
              $continuar=0;
         }
         if($continuar==1){
            if (!($sentencia = $conn->prepare("DELETE FROM `caracteristicas` WHERE `idOferta`='$id'"))) {
              echo "Falló la preparación: (" . $conn->errno . ") " . $conn->error;
            }
            if (!$sentencia->execute()) {
              echo "Falló la ejecución: (" . $sentencia->errno . ") " . $sentencia->error;
            }
            else echo "<script>window.onload=function(){setTimeout(\"location.href='cambiarOfertas.php'\", 1);}</script>"; 
         }
         header('Location:cambiarOfertas.php');
}

?>
<script>
function insertarInput(){
   var inputs=document.getElementsByTagName('input').length;
   var siguiente=inputs-3;
   var formulario=document.getElementsByTagName('form')[0];
   var input=document.createElement('input');
   input.name='caract'+siguiente;
   input.placeholder='Característica '+siguiente;
   input.type='text';
   var anterior=formulario.getElementsByTagName('a')[0];
   formulario.insertBefore(input,anterior); 
  return false;
}


</script>
<?php
session_start();
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