/*EDITAR DATOS CLIENTE*/
function editarCliente(){     
     document.getElementById("botonEditar").disabled="true";
     document.getElementById("guardarCambios").removeAttribute("disabled");
     document.getElementById("botonCancelarUsuario").removeAttribute("disabled");
     document.getElementById("nombre").removeAttribute("disabled");
     document.getElementById("email").removeAttribute("disabled");
     document.getElementById("password").removeAttribute("disabled");
}

/*GUARDAR CAMBIOS DATOS CLIENTE*/
function guardarCambios(){
     //Guardar datos en la base de datos
     document.getElementById("guardarCambios").disabled='true';
     document.getElementById("botonCancelarUsuario").disabled='true';
     document.getElementById("botonEditar").removeAttribute("disabled");
     document.getElementById("nombre").disabled="true";
     document.getElementById("email").disabled="true";
     document.getElementById("password").disabled="true";
}

/*EDITAR DATOS MASCOTA*/
function editarMascota(){
    var filas=document.getElementsByTagName("tr");
    var contador= filas.length;
    var NUM;
    for(var i=1; i<contador; i++){
       var fila=filas[i];
       var id= fila.id;
       celda=fila.insertCell(4);
       celda.innerHTML="<a href='clienteDatos.php?mascota="+i+"&id="+id+"'>Editar</a>";
       NUM=i;
    }
    document.getElementById("botonEditarMascota").disabled=true;
    document.getElementById("botonMascota").disabled=true;
    document.getElementById("botonEliminar").disabled=true;
    document.getElementById("botonMascotaEditada").removeAttribute("disabled");
    document.getElementById("botonCancelar").removeAttribute("disabled");
    document.getElementById("botonCancelar").setAttribute("onclick","cancelar('editar')");
    document.getElementById("botonMascotaEditada").setAttribute("onclick","mascotaEditada('editar',NUM)");
}

/*GUARDAR CAMBIOS DATOS MASCOTA*/
function mascotaEditada(valor,num,id){
    //Guardar en la base de datos
    var continuar=true;    
    if(valor=="añadir"){
        var nombre=document.getElementById("nombreMascota").textContent;
        var raza=document.getElementById("raza").textContent;
        var edad=document.getElementById("edad").textContent;
        if(nombre.length==0 || raza.length==0 || edad.length==0){ continuar=false; alert("Completa todos los datos");}
        else this.location.href="insertarMascota.php?nombre="+nombre+"&raza="+raza+"&edad="+edad ;
    }
    if(valor=="editar"){
        var filas=document.getElementsByTagName("tr");
        var fila=filas[num];
        var celdas=fila.getElementsByTagName("td");
        var nombre=celdas[0].getElementsByTagName("h1")[0].innerHTML;
        var raza=celdas[1].innerHTML;
        var edad=celdas[2].innerHTML;
        if(nombre.length==0 || raza.length==0 || edad.length==0){ continuar=false; alert("Completa todos los datos");}
        else this.location.href="editarMascota.php?nombre="+nombre+"&raza="+raza+"&edad="+edad+"&id="+id ;
    }
    if(continuar==true){
        document.getElementById("botonMascotaEditada").disabled=true;
        document.getElementById("botonCancelar").disabled=true;
        document.getElementById("botonEditarMascota").removeAttribute("disabled");
        document.getElementById("botonMascota").removeAttribute("disabled");
        document.getElementById("botonEliminar").removeAttribute("disabled");
   }
}

/*INSERTAR MASCOTA NUEVA*/
function insertarMascota(){
    //Insertar fila editable para añadir los datos
    document.getElementById("botonMascota").disabled=true;
    document.getElementById("botonEliminar").disabled=true;
    document.getElementById("botonEditarMascota").disabled=true;
    document.getElementById("botonMascotaEditada").removeAttribute("disabled");
    document.getElementById("botonCancelar").removeAttribute("disabled");

    var table = document.getElementById("myTable");
    var row = table.insertRow(1);
    row.setAttribute("contenteditable", "true");
    row.style="border: 2px solid black;"
    var nombre= row.insertCell(0);
    var raza= row.insertCell(1);
    var edad=row.insertCell(2);
    var historial=row.insertCell(3);
    historial.innerHTML="<button disabled id='historial'>Ver historial</button>";
    nombre.id="nombreMascota";
    raza.id="raza";
    edad.id="edad";

    document.getElementById("botonMascotaEditada").setAttribute("onclick","mascotaEditada('añadir')");
    document.getElementById("botonCancelar").setAttribute("onclick","cancelar('añadir')");
}
function cancelar(valor){
    var continuar=true;
    if(valor=="añadir") document.getElementById("myTable").deleteRow(1);
    if(valor=="eliminar" ){
       filas=document.getElementsByTagName("tr");
       for(var i=1; i<filas.length; i++){
          var fila=filas[i];
          fila.deleteCell(4);
       }
    }
    if(valor=="editar"){
       window.location="clienteDatos.php";
    }
    if(continuar==true){
        document.getElementById("botonMascotaEditada").disabled=true;
        document.getElementById("botonCancelar").disabled=true;
        document.getElementById("botonEditarMascota").removeAttribute("disabled");
        document.getElementById("botonMascota").removeAttribute("disabled");
        document.getElementById("botonEliminar").removeAttribute("disabled");
    }
}
function eliminar(){
    var tabla=document.getElementById("myTable");
    var filas=tabla.getElementsByTagName("tr");
    var contador= filas.length;
    for(var i=1; i<contador; i++){
       var fila=filas[i];
       var id= fila.id;
       celda=fila.insertCell(4);
       celda.innerHTML="<a href='eliminar.php?id="+id+"'>Eliminar</a>";
    }
    document.getElementById("botonCancelar").removeAttribute("disabled");
    document.getElementById("botonEliminar").disabled=true;
    document.getElementById("botonMascota").disabled=true;
    document.getElementById("botonEditarMascota").disabled=true;
    document.getElementById("botonCancelar").setAttribute("onclick","cancelar('eliminar')");
}

function cancelarUsuario(){
     document.getElementById("guardarCambios").disabled=true;
     document.getElementById("botonCancelarUsuario").disabled=true;
     document.getElementById("botonEditar").removeAttribute("disabled");
     document.getElementById("nombre").disabled="true";
     document.getElementById("email").disabled="true";
     document.getElementById("password").disabled="true";
}