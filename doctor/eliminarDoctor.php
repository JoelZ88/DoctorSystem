<?php
error_reporting(0);
    session_start();
    //$varsesion = $_SESSION['usu'];
    $_SESSION['usuario'] = $_SESSION['usu'];
    $usuario=$_SESSION['usuario'];
    //echo $varsesion;
    include "../conexion.php";

    echo "<br>".$usuario."<br>";
    $consulta = "SELECT*FROM doctor WHERE correo='$usuario'";
    $resultado=mysqli_query($conexion,$consulta);
    $row = mysqli_fetch_array($resultado);
    
    print_r($row);
    echo "<br>".$row[0];
    $id = $row[0];

    $eliminar = "DELETE FROM doctor where id_doctor like '$id'";
    mysqli_query($conexion,$eliminar);

    if($eliminar){
        echo "<br> eliminaste correctamente";
        $eliminarUsuario = "DELETE FROM usuario_doctor WHERE id_doctor LIKE '$id'";
        mysqli_query($conexion,$eliminarUsuario);
        if($eliminarUsuario){
            echo "<br> ELIMINASTE EL USUARIO";
            header("location:../../index.html");
        }
    }

    //echo $usuario;
    //var_dump($row);
    /*$id = $row['id_doctor'];
    $nombre = $row['nombre'];
    $paterno = $row['paterno'];
    $materno = $row['materno'];
    $edad = $row['edad'];
    $sexo = $row['sexo'];
    $estado = $row['estado'];
    $ciudad = $row['ciudad'];
    $calle = $row['calle'];
    $numero = $row['numero'];
    $correo = $row['correo'];
    $password = $row['pass'];
    $telefono = $row['telefono'];*/


?>