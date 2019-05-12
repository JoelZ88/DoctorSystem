<?php
    include "./conexion.php";
    error_reporting(0);
    session_start();
    $varsesion = $_SESSION['usu'];
    if($varsesion == null || $varsesion =''){
        echo "<h1>Usted no tiene autorizacion </h1>";
        die();
    }
    $_SESSION['usuario'] = $_SESSION['usu'];
    $usuario = $_SESSION['usuario'];

    echo "Este es el usuario: ".$usuario."<br>";

    $query = "SELECT * FROM paciente where correo = '$usuario'";
    $resultado = mysqli_query($conexion,$query);

    if(!$resultado){
        echo "Error en la consulta <br>";
    }
    else{
        echo "Ingresaste ";
        $row = mysqli_fetch_array($resultado);
    }
    echo "El id del  es".$row['id_paciente']."<br>";
    echo "nombre del :  ".$row['nombre']."<br>";
    /*echo "apellido materno:  ".$row['materno']."<br>";
    echo "apellido paterno:  ".$row['paterno']."<br>";*/
    $id=$row['id_paciente'];
    //obtener nombre del doctor
    $nombre = $row ['nombre'];
    /*$paternoDoctor = $row ['paterno'];
    $maternoDoctor = $row ['materno'];*/
/*hasta aqui obtengo la informacion de l doctor*/
    if(isset($_POST['boton'])){
        $idd = $_GET['id'];
        
        //$id_paciente = $_POST['id_paciente'];
        //$id_paciente = $_POST['id_paciente'];
        //$nombre_paciente = $_POST['nombre_paciente'];
        $Fecha_Cita = $_POST['Fecha_Cita'];
        $hora_Cita = $_POST['hora_Cita'];

        echo $idd."<br>";
        echo $id_paciente."<br>";
        echo $nombre."<br>";
        echo $Fecha_Cita."<br>";
        echo $hora_Cita."<br>";
        

       
        $consulta = "INSERT INTO cita_medica 
        (`id_doctor`,`id_paciente`,`nombre_paciente`,`Fecha_Cita`,`hora_Cita`) 
        VALUES('$idd','$id','$nombre','$Fecha_Cita','$hora_Cita')";
        $result = mysqli_query($conexion,$consulta);
        if($result){
            echo "Ingresaste correctamente";
            $_SESSION['message'] = 'tarea guardada correctamente';
            $_SESSION['message_type'] = 'success';
            header("location:./cita.php");
        }
        else{
            echo "Fallo al ingresar";
        }
      
    }
?>