
<!DOCTYPE HTML>
<html>
	<head>
		<title>Clínica Huellas</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="../assets/css/main.css" />
                <script language="javascript" src="../assets/js/personal.js"></script>
	</head>
	<body>

		<!-- MENU -->
			<header id="header" style="padding-top:0;">
				<div class="inner" >
					<p class="logo" style="font-size:150%"><strong>Clínica Huellas</strong> </p><br/>
					<p class="logo" id="tipo"><strong>PERSONAL</strong></p>
					<a id="cerrar" href="../cerrarSesion.php"><img style="width:30%" src="../images/logout.png"></a>
                                        <nav id="menuNormal" style="padding-top:2%; width:90%;">
						<a><strong>Datos</strong></a>
						<a href="agenda/agenda.php">Agenda</a>
					</nav>
<ul id="menu" style="color:black;list-style: none; float:left; margin-left:0; width:70%; margin-top:2%;" >
                                            <li id="etiquetaMenu" onclick="return abrirMenu(0);" style="padding:0; margin:0; float:left"><a href ><img src="../images/menu.png" style="width:70%; margin-bottom:3%; margin-left:0;"></a></li>
                                            <ul id="desplegable" style="display:none; list-style: none; margin-top:15% " >
                                                <li class="itemMenu"><a style="color:white;">Datos</a></li>
						<li class="itemMenu"><a href="agenda/agenda.php" style="width:100%">Agenda</a></li>						
</ul>
                                              
                                        <ul>       
				</div>
			</header>

		<!-- Banner -->
			<section class="cabecera" id="banner" style="background-image:url(../images/fondopeque.jpeg);">
			</section>


		<!-- Three -->
			<section id="three" class="wrapper align-center" style="padding-top:2%">
				<div class="inner">
					<h3 style="font-weight:900;"> Visualizar y modificar datos de usuario</h3>
					<form  method="post" action="../guardarCambios.php" onSubmit="return cambiar();">
						<label style="width:25%;float:left;" for="usuario">Usuario:</label><input disabled type="text" name="usuario" placeholder="Usuario" id="usuario" style="width:75%; float:right;"/><br/><br/><br/>
                                                <label style="width:25%;float:left;" for="nombre">Nombre:</label><input disabled type="text" name="nombre" placeholder="Nombre y Apellidos" id="nombre" style="width:75%; float:right;" /><br/><br/><br/>
						<label style="width:25%;float:left;" for="email">E-mail:</label><input disabled type="text" name="email" placeholder="E-mail" id="email"  style="width:75%; float:right;"/><br/><br/><br/>
						<label style="width:25%;float:left;" for="password">Contraseña:</label><input disabled type="password" name="password" placeholder="Contraseña" id="password" style="width:75%; float:right;"/><br/><br/><br/>
						<button type="button" style=" font-size:90%;" onclick="modificarDatos();" id="botonModificar"> Modificar datos</button>
						<input type="submit" value="GUARDAR CAMBIOS" name="registrar" style="font-weight:900; font-size:90%;" disabled id="botonGuardar" onclick="guardarCambios();" />	
                                                <button type="button" style=" font-size:80%;" onclick="cancelar();" id="botonCancelar" disabled> Cancelar</button>							
					</form>
			
				</div>
			</section>
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
	</script>
        
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