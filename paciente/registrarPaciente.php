<?php
    $nombre = $_POST['nombre'];
    $materno = $_POST['materno'];
    $paterno = $_POST['paterno'];
    $telefono = $_POST['telefono'];
    $edad = $_POST['edad'];
    $sexo = $_POST['sexo'];
    $sangre = $_POST['sangre'];
    $estado = $_POST['estado'];
    $ciudad = $_POST['ciudad'];
    $calle = $_POST['calle'];
    $numero = $_POST['numero'];
    $correo = $_POST['correo'];
    $password = $_POST['password'];

    include "../conexion.php";

    $resultado = "INSERT INTO paciente(nombre,paterno,materno,telefono,edad,sexo,
    tipoSangre,estado,ciudad,calle,numero,correo,pass)
    values ('$nombre','$paterno','$materno','$telefono','$edad','$sexo','$sangre','$estado','$ciudad','$calle',
    '$numero','$correo','$password')";

    $resultado = mysqli_query($conexion,$resultado);
    if($resultado){
        echo "Ingresaste paciente";
        session_start();
        $_SESSION['usu']=$correo;
        header("location:./gestionarPaciente.php");
    }
    else{
        echo"Error";
    }
    mysqli_close($conexion);
?>