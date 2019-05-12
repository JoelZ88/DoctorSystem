<?php
error_reporting(0);
    session_start();
    $varsesion = $_SESSION['usu'];
    if($varsesion == null || $varsesion =''){
        echo "<h1>Usted no tiene autorizacion </h1>";
        die();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../css/paciente/gestionarPaciente.css">
    <title>Document</title>
</head>
<body>
    <header class="header">
        <h1>Gestionar Paciente </h1>   
    </header>
    
    <nav class="nav">
        <ul class="menu">
            <li><a id="inicio" href="#">Inicio</a></li>
            <li><a  href="../historial/historialPaciente.php">Historial</a></li>
            <li><a  href="../cita/buscar.php">Cita Medica</a></li>
            <li><a  href="../opiniones2/opinionindex.php">Opiniones</a></li>
            <li><a href="#">Usuario</a>
                <ul>
                    <li><a id="ModificarPaciente" href="./modificarPaciente.php">Modificar Cuenta</a></li>  
                    <li><a id="eliminarPaciente" href="#">Eliminar Cuenta</a></li> 
                    <li><a href="../cerrar.php">Cerrar Sesión</a></li> 
                </ul>
            </li>
        </ul>
    </nav>

    <section class="sec1" id="sec1">

    </section>

    <footer>

    </footer>
    <script src="../../js/jquery-3.3.1.js"></script>
    <script src="../../js/botones.js"></script>
    <script src="./validarPaciente.js"></script>
    <a href="../cerrar.php"> cerrar sesión</a>
</body>
</html>