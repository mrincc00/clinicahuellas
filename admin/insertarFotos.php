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
                                        <nav id="menuNormal" style="padding-top:2%; width:90%;">
						<a href="adminDatos.php">Datos</a>
						<a href="registrar.php">Registrar y Editar</a>
                                                <a href="listaClientes.php">Clientes</a>
                                                <a href="copiaBd.html">Copiar BD</a>
                                                <a href="eliminarComentarios.php">Eliminar comentarios</a>
                                                <a href="cambiarDatos.php">Datos clínica</a>
                                                <a href="cambiarOfertas.php">Modificar ofertas</a>
                                                <a><strong>Actualizar galeria</strong></a>
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
                                                <li class="itemMenu"><a style="width:100%;" href="cambiarOfertas.php">Modificar ofertas</a></li>
                                                <li class="itemMenu"><a style="width:100%;color:white;">Actualizar galeria</a></li>
</ul>
</ul>

				</div>
			</header>

		<!-- Banner -->
			<section class="cabecera" id="banner" style="background-image:url(../images/fondopeque.jpeg);">
			</section>


                <div id="galeriaActual" style="" >
                   <h3 style="text-align:center;">Fotos de la galeria:</h3>
			<div  style="overflow-y:scroll; height:350px;">
                        <table>
                           <tr><th>NOMBRE</th><th colspan=2> OPCIONES</th>
                           <tbody>
<?php
$directorio = "../cliente/images";
$gestor_dir = opendir($directorio);
while (false !== ($nombre_fichero = readdir($gestor_dir))) {
    $ficheros[] = $nombre_fichero;
}
sort($ficheros);
$num=count($ficheros);
 for($i=2; $i<$num; $i++) echo "<tr><td>$ficheros[$i]</td>\n<td><a href onclick='return visualizar(\"$ficheros[$i]\");'>Visualizar</a></td>\n<td><a href='insertarFotos.php?eliminar=$ficheros[$i]'>Eliminar</a></td></tr>";                      
             
?>

                           </tbody>
                        </table>
                       </div>
                      
                </div>	

                <div id="imagen" style="" hover="hola">    <h2 style="color: white">hola<h2>              
                </div>				
		<div id="subirFoto" style="" >
                   <h3 style="text-align:center;"> Añadir imagen:</h3>
                   <form method="post" action="insertarFotos.php" enctype="multipart/form-data" id="formFotos">
                      <input name="uploadedfile" type="file" /><br/><br/>
                      <input type="submit" value="Subir archivo"/>
                      <button type="button" onclick="document.getElementById('formFotos').reset();">Cancelar</button>
                   </form>
                   <h1 style="display_none" id="mensaje"></h1>
                </div>		

	</body>


<?php
if($_FILES!=null){
$continuar=1;
$uploadedfileload="true";
$uploadedfile_size=$_FILES['uploadedfile'][size];
$msg=$_FILES[uploadedfile][name];
if ($_FILES[uploadedfile][size]>200000)
{$msg=$msg.": El archivo es mayor que 200KB, debes reduzcirlo antes de subirlo<BR>";
$uploadedfileload="false"; $continuar=0;}

if (!($_FILES[uploadedfile][type] =="image/jpeg" OR $_FILES[uploadedfile][type] =="image/gif"))
{$msg=$msg.": Tu archivo tiene que ser JPG o GIF. Otros archivos no son permitidos<BR>";
$uploadedfileload="false"; $continuar=0;}

$file_name=$_FILES[uploadedfile][name];
$add="../cliente/images/$file_name";
if($uploadedfileload=="true"){

if(move_uploaded_file ($_FILES[uploadedfile][tmp_name], $add)){
$msg=$msg." Ha sido subido satisfactoriamente"; echo "<script>window.onload=function(){\ndocument.getElementById('mensaje').innerHTML='$msg';\n document.getElementById('mensaje').style.display='block';\n}</script>";
}else{$msg=$msg. " Error al subir el archivo";}

}else echo "<script>window.onload=function(){\ndocument.getElementById('mensaje').innerHTML='$msg';\n document.getElementById('mensaje').style.display='block';\n}</script>";

if($continuar==1){
sleep(0.1);
echo "<script>window.onload=function(){setTimeout(\"location.href='insertarFotos.php'\", 1);}</script>"; 
}
}
if($_GET!=null){
$fichero=$_GET['eliminar'];
$ruta="../cliente/images/$fichero";
unlink($ruta);
sleep(0.1);
 echo "<script>window.onload=function(){setTimeout(\"location.href='insertarFotos.php'\", 1);}</script>"; 
}
?>
<script>
function visualizar(nombre){
var ruta="../cliente/images/"+nombre;
document.getElementById('imagen').style.backgroundImage="url('"+ruta+"')";
document.getElementById('imagen').style.display='inline';
document.getElementById('imagen').innerHTML="<h1 style='color:white'>"+nombre+"</h1>";
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