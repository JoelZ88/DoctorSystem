<?php
error_reporting(0);
    session_start();
    $varsesion = $_SESSION['usu'];
    if($varsesion == null || $varsesion =''){
        echo "<h1>Usted no tiene autorizacion </h1>";
        die();
    }

    /*//var_dump($_SESSION);
    //echo "hola ".$_SESSION['usu']."<br>";
    include "../conexion.php";

    $consulta = "SELECT*FROM doctor WHERE correo='$varsesion'";

     $resultado=mysqli_query($conexion,$consulta);

     $filas=mysqli_num_rows($resultado);

        if($filas > 0 ){
            echo "Encontrado";
            echo $varsesion;
        }
        else{
            echo "error";
            //header("location:../index.html");
        }
        mysqli_free_result($resultado);

    */
?>



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../css/doctor/gestionarDoctor.css">
    <link rel="stylesheet" href="../../css/doctor/modificarDoctor.css">




    <title>Document</title>
</head>
<body>

    <header class="header">
        <h1>Gestionar Doctor </h1>
    </header>

  <nav class="nav">
    <ul class="menu">
        <li><a id="inicio" href="../historial/historialDoctor.html">Historiales</a></li>
        <li><a id="citaMedica" href="../citaD/citaD.php">Cita Medica</a>
        </li>

        <li><a href="#">Receta Médica</a>
          <ul>
              <li><a id="recetaMedica" href="../receta/receta.php">Ingresar</a></li>
              <li><a id="ReporteReceta" href="../exportar_pdf/index.php">Generar Reporte</a></li>
          </ul>
        </li>
        <li><a href="#">Usuario</a>
            <ul>
                <li><a id="ModificarDoctor" href="./modificarDoctor.php">Modificar Cuenta</a></li>
                <li><a id="eliminarDoctor" href="#">Eliminar Cuenta</a></li>
                <li><a id="respaldo" href="../back_Update/php/index.php">Respaldo y Restauración</a></li>
                <li><a href="../cerrar.php">Cerrar Sesión</a></li>
            </ul>
        </li>
    </ul>
</nav>

    <section class="sec1" id="sec1">

    </section>

    <section class="sec2">
        <div class="texto">
            <p class="p1"> Al ingresar como doctor se te permitirà la administraciòn de tu cuenta,
                asì como la administrcion de tus pacientes. Acontinuaciòn se da una breve
                explicaciòn de la funciòn de los apartados que se presentan en esta ventana. <br><br>
                En el apartado "Cita Mèdica" el doctor podrà visualizar las distintas citas
                que tiene y se le permitirà la modificaciòn de las citas, con respecto al
                tiempo, que èl considere que no llegarà a atender por algùn suceso
                innesperado y la eliminacion cuando sea requerido.
            </p>
            <p class="p2"> En el apartado "Receta Mèdica" se llevarà al doctor a una nueva
                ventana donde se le permitirà elaborar la receta mèdica para un paciente para esto,
                una vez dentro de la ventana, al doctor se le solicitaràn unos cuantos datos de paciente
                como lo son su numero de control, nombre, edad y lo que se le recetarà, entre otras cosas.
                Ademàs en este mismo apartado se pueden vizualizar las recetas que se han elaborado y se
                permitirà al doctor la modificaciòn y si es necesario la eliminaciòn de las recetas.
            </p>
            <p class="p3">Por ùltimo èsta el apartado de "Usuario", para acceder a este apartado solo serà necesario
                colocar el ratòn sobre la opciòn "Usuario", una vez hecho esto el doctor podrà acceder al
                submenù donde podrà elegir entre las opciones de "Modificar Cuenta", "Eliminar Cuenta"
                o "Cerrar Sesiòn", en modificar cuenta al doctor se le permitirà modificar su informaciòn de
                usuario , en eliminar cuenta de necesitarlo podra eliminar su cuenta y en cerrar sesiòn
                permitirà al doctor salir de su cuenta.</p>
        </div>
    </section>

    <footer>

    </footer>
    <script src="../../js/jquery-3.3.1.js"></script>
    <script src="../../js/botones.js"></script>
    <script src="validarDoctor.js"></script>

</body>
</html>
