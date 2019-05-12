<?php
    include "./conexion.php";
    error_reporting(0);
    session_start();
    $varsesion = $_SESSION['usu'];
    if($varsesion == null || $varsesion =''){
        echo "<h1>Usted no tiene autorizacion </h1>";
        die();
    }

    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $clave = $id;

        echo $_GET['id']."<br>";
        echo "<h1> la clave es </h1>".$clave;
        $eliminar = "DELETE FROM cita_medica where ID_Cita = '$clave'";
        $resultado = mysqli_query($conexion,$eliminar);
        
        if(!$resultado){
            die("Fallo al eliminar");

        }
        $_SESSION['message'] = 'Tarea eliminada';
        $_SESSION['message_type'] = 'danger';
        header("location:./cita.php");
    }

?>