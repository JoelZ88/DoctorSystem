function ingresar(){
    var nombre,materno,paterno,telefono,edad,sexo,estado,ciudad,calle,numero,correo,password;
    var expresion;
    nombre = document.getElementById("nombre").value;
    materno = document.getElementById("materno").value;
    paterno = document.getElementById("paterno").value;
    telefono = document.getElementById("telefono").value;
    edad = document.getElementById("edad").value;
    sexo = document.getElementById("sexo").value;
    estado = document.getElementById("estado").value;
    ciudad = document.getElementById("ciudad").value;
    calle = document.getElementById("calle").value;
    numero = document.getElementById("numero").value;
    correo = document.getElementById("correo").value;
    password = document.getElementById("password").value;
    //alert(nombre+materno);
    expresion = /\w+@\w+\.+[a-z]/;
    
    if(nombre === "" || paterno === "" || materno === "" || 
    telefono === "" || edad === "" || sexo === "" || estado === ""
    || ciudad === "" || calle === "" || numero === "" || 
    correo === "" || password === ""){
        alert("Todos los campos son obligatorios");
        return false;
    }
    else if (nombre.length > 20){
        alert("Nombre demaciado largo");
        return false;
    }
    else if (materno.length > 10){
        alert("Apellido materno demaciado largo");
        return false;
    }
    else if (paterno.length > 10){
        alert("Apellido paterno demaciado largo");
        return false;
    }
    else if (telefono.length > 10){
        alert("Nombre demaciado largo");
        return false;
    }
    else if (isNaN(telefono)){
        alert("Campo telefono solo acepta numeros");
        return false;
    }
    else if (edad > 140){
        alert("Imposible que tengas esa edad agregue su verdadera edad");
        return false;
    }
    else if (isNaN(edad)){
        alert("Campo edad solo acepta numeros");
        return false;
    }
    else if (ciudad.length > 30){
        alert("Nombre de la ciudad demaciado largo");
        return false;
    }
    else if (calle.length > 40){
        alert("Nombre de la calle demaciado largo");
        return false;
    }
    else if (numero.length > 4){
        alert("Nombre demaciado largo");
        return false;
    }
    else if (isNaN(numero)){
        alert("Campo numero de calle solo acepta numeros");
        return false;
    }
    else if (correo.length > 50){
        alert("correo demaciado largo");
        return false;
    }
    else if(!expresion.test(correo)){
        alert("correo no valido");
        return false;
    }
    else if (password.length > 20){
        alert("contraseña demaciado larga");
        return false;
    }
}

function modificar(){

    alert("Precionaste modificar");
    var nombre,materno,paterno,telefono,edad,sexo,estado,ciudad,
        calle,numero;
    
    nombre = document.getElementById("nombre").value;
    materno = document.getElementById("materno").value;
    paterno = document.getElementById("paterno").value;
    telefono = document.getElementById("telefono").value;
    edad = document.getElementById("edad").value;
    sexo = document.getElementById("sexo").value;
    estado = document.getElementById("estado").value;
    ciudad = document.getElementById("ciudad").value;
    calle = document.getElementById("calle").value;
    numero = document.getElementById("numero").value;

    if(nombre === "" || materno === "" || paterno === "" ||
    telefono === "" || edad === "" || sexo === "" || 
    estado === "" || ciudad === "" || calle === "" || numero === ""){
        alert("Es obligatorio llenar todos los campos");
        return false;
    }
    else if (nombre.length > 20){
        alert("Nombre demaciado largo");
        return false;
    }
    else if (materno.length > 10){
        alert("Apellido materno demaciado largo");
        return false;
    }
    else if (paterno.length > 10){
        alert("Apellido paterno demaciado largo");
        return false;
    }
    else if (telefono.length > 10){
        alert("Nombre demaciado largo");
        return false;
    }
    else if (isNaN(telefono)){
        alert("Campo telefono solo acepta numeros");
        return false;
    }
    else if (edad > 140){
        alert("Imposible que tengas esa edad agregue su verdadera edad");
        return false;
    }
    else if (isNaN(edad)){
        alert("Campo edad solo acepta numeros");
        return false;
    }
    else if (ciudad.length > 30){
        alert("Nombre de la ciudad demaciado largo");
        return false;
    }
    else if (calle.length > 40){
        alert("Nombre de la calle demaciado largo");
        return false;
    }
    else if (numero.length > 4){
        alert("Nombre demaciado largo");
        return false;
    }
    else if (isNaN(numero)){
        alert("Campo numero de calle solo acepta numeros");
        return false;
    }
    
}