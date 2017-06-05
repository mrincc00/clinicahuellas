/*MODIFICAR DATOS PROPIOS*/
function modificarDatos(){
     document.getElementById("modificar").disabled=true;
     document.getElementById("guardar").removeAttribute("disabled");
     document.getElementById("botonCancelar").removeAttribute("disabled");
     document.getElementById("nombre").removeAttribute("disabled");
     document.getElementById("email").removeAttribute("disabled");
     document.getElementById("password").removeAttribute("disabled");
}

/*GUARDAR CAMBIOS DATOS PROPIOS*/
function guardarCambios(){
    //Guardar en base de datos
    document.getElementByID("formulario").onSubmit="return cambiar();";
    document.getElementById("guardar").disabled=true;
    document.getElementById("modificar").removeAttribute("disabled");
    document.getElementById("nombre").disabled="true";
    document.getElementById("email").disabled="true";
    document.getElementById("password").disabled="true";
}

/*SUBIR FORM*/
function subirFormulario(valor){
if(valor=="registrar"){
    if(document.getElementById("usuario").value.length==0 || document.getElementById("password").value.length==0 || document.getElementById("nombre").value.length==0 || document.getElementById("email").value.length==0 || document.getElementById("tipoUsuario").value==0){ alert("Debes completar todos los datos"); return false;}
   else if(document.getElementById("usuario").value.length<5){alert("El usuario debe tener una longitud mínima de 5 caractéres"); return false;}
else if(document.getElementById("email").value.length<=8){alert("El emial debe tener una longitud mínima de 9 caractéres"); return false;}
  else if( document.getElementById("password").value.length<5 ){
	alert("La contraseña debe de tener una longitud mínima de 5 caracteres.");
	return false;
}
else if(document.getElementById("password").value!=document.getElementById("confirmPassword").value){
				alert("Las contraseñas no coinciden. Por favor, inténtelo de nuevo.");
				return false;
			}

}
 if(valor=="guardarCambios"){
 if(document.getElementById("usuario").value.length==0 || document.getElementById("password").value.length==0 || document.getElementById("nombre").value.length==0 || document.getElementById("email").value.length==0 ){ alert("Debes completar todos los datos"); return false;}
   else if(document.getElementById("usuario").value.length<5){alert("El usuario debe tener una longitud mínima de 5 caractéres"); return false;}
  else if( document.getElementById("password").value.length<5 ||  document.getElementById("confirmPassword").value.length<5){
	alert("La contraseña debe de tener una longitud mínima de 5 caracteres.");
	return false;
}
else if(document.getElementById("password").value!=document.getElementById("confirmPassword").value){
				alert("Las contraseñas no coinciden. Por favor, inténtelo de nuevo.");
				return false;
			}
}   
    return true;
registrarNuevo();

}

/*AÑADIR NUEVO USUARIO*/
function registrarNuevo(valor){
    document.getElementById("botonRegistrar").disabled=true;
    document.getElementById("botonModificarUsuario").removeAttribute("disabled");
    document.getElementById("botonEliminar").removeAttribute("disabled");
    document.getElementById("submitGuardar").disabled=true;
    document.getElementById("submitRegistrar").removeAttribute("disabled");
    document.getElementById("formBusqueda").style.display="none";
    document.getElementById("formRegistro").style.display="block";
    document.getElementById("usuario").disabled=false;
    document.getElementById('tipoUsuario').style='display:block';
   if(valor=='cambiar') document.getElementById("formRegistro").reset();
}

/*MODIFICAR USUARIO CREADO*/
function modificarUsuario(){
    document.getElementById("botonModificarUsuario").disabled=true;
    document.getElementById("botonRegistrar").removeAttribute("disabled");
    document.getElementById("botonRegistrar").setAttribute("onclick","registrarNuevo(\"cambiar\")");
    document.getElementById("botonEliminar").removeAttribute("disabled");
    document.getElementById("submitRegistrar").disabled=true;
    document.getElementById("submitGuardar").disabled=true;
    document.getElementById("formBusqueda").style.display="block";
    document.getElementById("formRegistro").style.display="block";
    document.getElementById("formRegistro").reset();
    
    document.getElementById("boton").value="modificar";
    document.getElementById("cancelarRegistrar").onclick="cancelarCambio();";
}

function subir(valor){
    document.getElementById("formRegistro").setAttribute("onSubmit","return subirFormulario('"+valor+"');");
    if(valor=="registrar")document.getElementById("formRegistro").action="registrarUsuario.php";
    if(valor=="guardarCambios")document.getElementById("formRegistro").action="modificar.php";
}
function eliminarUsuario(){
    document.getElementById("botonEliminar").disabled=true;
    document.getElementById("botonRegistrar").removeAttribute("disabled");
    document.getElementById("botonModificarUsuario").removeAttribute("disabled");
    document.getElementById("formBusqueda").style.display="block";
    document.getElementById("formRegistro").style.display="none";
    document.getElementById("boton").value="eliminar";
}
function cancelar(){ 
    document.getElementById("guardar").disabled=true;
    document.getElementById("botonCancelar").disabled=true;
    document.getElementById("modificar").removeAttribute("disabled");
    document.getElementById("nombre").disabled="true";
    document.getElementById("email").disabled="true";
    document.getElementById("password").disabled="true";
}