function ingresar(){
    var nombre,materno,paterno,telefono,edad,sexo,sangre,estado,ciudad,calle,numero,correo,password;
    var expresion;
    nombre = document.getElementById("nombre").value;
    materno = document.getElementById("materno").value;
    paterno = document.getElementById("paterno").value;
    telefono = document.getElementById("telefono").value;
    edad = document.getElementById("edad").value;
    sexo = document.getElementById("sexo").value;
    sangre = document.getElementById("sangre").value;
    estado = document.getElementById("estado").value;
    ciudad = document.getElementById("ciudad").value;
    calle = document.getElementById("calle").value;
    numero = document.getElementById("numero").value;
    correo = document.getElementById("correo").value;
    password = document.getElementById("password").value;

    expresion = /\w+@\w+\.+[a-z]/;

    //alert(calle);
    if(nombre === "" || materno === "" || paterno === "" || telefono === "" || edad === "" || sexo === ""
    || sangre === "" || estado === "" || ciudad === "" || calle === "" || numero === "" || 
    correo === "" || password === ""){
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
    else if (paterno.length > 20){
        alert("Apellido paterno demaciado largo");
        return false;
    }
    else if (telefono.length > 10){
        alert("numero muy largo");
        return false;
    }
    else if (edad > 140){
        alert("Escribe tu edad verdadera");
        return false;
    }
    else if (calle.length > 40){
        alert("Nombre de la calle demaciado largo");
        return false;
    }
    else if (numero.length > 4){
        alert("Numero demaciado grande");
        return false;
    }
    else if (isNaN(numero)){
        alert("No es un numero");
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