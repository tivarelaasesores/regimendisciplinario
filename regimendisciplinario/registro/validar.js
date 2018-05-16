function validar(){
    var nombre, apellido, correo, usuario, clave, telefono, expresion;
    nombre = document.getElementById("nombre").value;
    apellido = document.getElementById("apellido").value;
    correo = document.getElementById("correo").value;
    usuario = document.getElementById("usuario").value;
    clave = document.getElementById("clave").value;
    telefono = document.getElementById("telefono").value;
    
    expresion = /\w+@\w+\.+[a-z]/;
    
    if(nombre === "" || apellido === "" || correo === "" || usuario === "" || clave === "" || telefono === ""){
        alert("Todos los campos son obligatorios");
        return false;
    }
    else if(nombre.length>20) {
        alert("El nombre es muy largo");
        return false;
    }
    else if(apellido.length>20) {
        alert("El apellido es muy largo");
        return false;
    }
    else if(correo.length>100) {
        alert("El correo es muy largo");
        return false;
    }
    else if (!expresion.test(correo)){
        alert("El correo no es válido");
        return false;
    }
    else if(usuario.length>25) {
        alert("El usuario es muy largo");
        return false;
    }
    else if(clave.length>40) {
        alert("El clave es muy largo");
        return false;
    }
    else if(telefono.length>15) {
        alert("El telefono es muy largo");
        return false;
    }
    
        else if(isNaN(telefono)) {
        alert("El telefono no es un número");
        return false;
        }
}