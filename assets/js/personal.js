function modificarDatos(){
     document.getElementById("botonModificar").disabled=true;
     document.getElementById("botonGuardar").removeAttribute("disabled");
     document.getElementById("botonCancelar").removeAttribute("disabled");
     document.getElementById("nombre").removeAttribute("disabled");
     document.getElementById("email").removeAttribute("disabled");
     document.getElementById("password").removeAttribute("disabled");
}

function guardarCambios(){
document.getElementById("formulario").onSubmit="return cambiar();";
     document.getElementById("botonGuardar").disabled=true;
     document.getElementById("botonModificar").removeAttribute("disabled");
     document.getElementById("nombre").disabled="true";
     document.getElementById("email").disabled="true";
     document.getElementById("password").disabled="true";
}
function cancelar(){
     document.getElementById("botonGuardar").disabled=true;
     document.getElementById("botonCancelar").disabled=true;
     document.getElementById("botonModificar").removeAttribute("disabled");
     document.getElementById("nombre").disabled="true";
     document.getElementById("email").disabled="true";
     document.getElementById("password").disabled="true";

}