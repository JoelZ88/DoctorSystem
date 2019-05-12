<?php
  error_reporting(0);
  session_start();
  
  /*if($varsesion == null || $varsesion =''){
      echo "<h1>Usted no tiene autorizacion </h1>";
      die();
  }*/
  $_SESSION['usuario'] = $_SESSION['usu'];
  $usuario = $_SESSION['usuario'];
  //echo $usuario."<br>";

  include "../conexion.php";

  echo "<br>".$usuario."<br>";
    $consulta = "SELECT*FROM paciente WHERE correo='$usuario'";
    $resultado=mysqli_query($conexion,$consulta);
    $row = mysqli_fetch_array($resultado);
    
    print_r($row);
    echo "<br>".$row[0];
    $id = $row[0];

    $eliminar = "DELETE FROM usuario_paciente where id_paciente like '$id'";
    mysqli_query($conexion,$eliminar);

    if($eliminar){
        echo "<br> ELIMINASTE EL USUARIO";
        
        $eliminarUsuario = "DELETE FROM paciente WHERE id_paciente LIKE '$id'";
        mysqli_query($conexion,$eliminarUsuario);
        if($eliminarUsuario){
            echo "<br> eliminaste correctamente";
            header("location:../../index.html");
        }
    }
?>