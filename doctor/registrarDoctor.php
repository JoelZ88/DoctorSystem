<?php
    $nombre = $_POST['nombre'];
    $materno = $_POST['materno'];
    $paterno = $_POST['paterno'];
    $telefono = $_POST['telefono'];
    $edad = $_POST['edad'];
    $sexo = $_POST['sexo'];
    $estado = $_POST['estado'];
    $ciudad = $_POST['ciudad'];
    $calle = $_POST['calle'];
    $numero = $_POST['numero'];
    $correo = $_POST['correo'];
    $password = $_POST['password'];

    /*echo $nombre;
    echo $materno;

    echo "donde estan perros <br> ";
    echo "quiero mas perros!!!! <br>";*/
    include "../conexion.php";

    $resultado= "INSERT INTO doctor(nombre,paterno,materno,edad,sexo,estado,ciudad,calle,numero,correo,pass,telefono)
    values ('$nombre','$paterno','$materno','$edad','$sexo','$estado','$ciudad','$calle','$numero','$correo','$password'
    ,'$telefono')";

    $resultado = mysqli_query($conexion,$resultado);

    if($resultado){
        echo "agrego con exito doctor";
        session_start();
        $_SESSION['usu']=$correo;
        header("location:./gestionarDoctor.php");
        
    }
    else{
        echo "no se agrego";
    }
    //mysqli_free_result($resultado);
    mysqli_close($conexion);
?>