<?php
error_reporting(0);
    session_start();
    $varsesion = $_SESSION['usu'];
    if($varsesion == null || $varsesion =''){
        echo "<h1>Usted no tiene autorizacion </h1>";
        die();
    }
    $_SESSION['usuario'] = $_SESSION['usu'];
    $usuario = $_SESSION['usuario'];
    //echo $usuario."<br>";

    include "../conexion.php";

    $consulta = "SELECT*FROM paciente WHERE correo='$usuario'";
    $resultado=mysqli_query($conexion,$consulta);
    $row = mysqli_fetch_array($resultado);

    //var_dump($row);

    $id = $row['id_paciente'];
    $nombre = $row['nombre'];
    $materno = $row['materno'];
    $paterno = $row['paterno'];
    $telefono = $row['telefono'];
    $edad = $row['edad'];
    $sexo = $row['sexo'];
    $sangre = $row['sangre'];
    $estado = $row['estado'];
    $ciudad = $row['ciudad'];
    $calle = $row['calle'];
    $numero = $row['numero'];
    $correo = $row['correo'];
    $password = $row['pass'];
    //echo "id antes del boton ".$id;

    if(isset($_POST['button'])){

        //echo "id despues del boton: ".$id;
        
        $nombre = $_POST['nombre'];
        $materno = $_POST['materno'];
        $paterno = $_POST['paterno'];
        $telefono =$_POST['telefono'];
        $edad = $_POST['edad'];
        $sexo = $_POST['sexo'];
        $sangre = $_POST['sangre'];
        $estado = $_POST['estado'];
        $ciudad = $_POST['ciudad'];
        $calle = $_POST['calle'];
        $numero = $_POST['numero'];
        $correo = $_POST['correo'];
        $password = $_POST['password'];

        //echo "Materno es".$materno

        $sql= "UPDATE paciente SET nombre='$nombre',paterno='$paterno',materno='$materno',
        telefono='$telefono',edad='$edad',sexo='$sexo',tipoSangre='$sangre',estado='$estado',
        ciudad='$ciudad',calle='$calle',numero='$numero'
        WHERE id_paciente = '$id'";
        mysqli_query($conexion,$sql);
        header("location:./gestionarPaciente.php");
       
    }
        
    

   

   mysqli_free_result($resultado);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../css/paciente/modificarPaciente.css">
    <script src="./validarPaciente.js"></script>
    <title>Document</title>
</head>
<body>
    <form action="modificarPaciente.php" method="POST">
        <header class="title">
            <img src="../../img/usuario-hombre.png" alt="">
        </header>
        <section class="paciente">
            <div>
                <input class="texto" id="nombre" type="text" placeholder="Nombre" name="nombre"
                value="<?php echo $nombre;?>" title="ingrese su nombre" require>
                <input class="texto" id="materno" type="text" placeholder="Apellido materno" name="materno"
                value="<?php echo $materno;?>" title="ingrese su apellido Materno" require>
            </div>
            <div>
                <input class="texto" id="paterno" type="text" placeholder="Apellido paterno" name="paterno"
                value="<?php echo $paterno;?>" title="ingrese su apellido Paterno" require>
                <input class="texto" id="telefono" type="text" placeholder="Telefono" name="telefono"
                value="<?php echo $telefono;?>" title="ingrese su Telefono" require>
            </div>
            <div>
            <input class="texto" id="edad" type="text" placeholder="edad" name="edad"
                value="<?php echo $edad;?>" title="ingrese su edad" require>
            </div>
        </section>
        <section class="sexo">
            <div>
                <input title="ingrese su sexo" require type="radio" name="sexo">Hombre
                <input title="ingrese su sexo" require type="radio" name="sexo">Mujer
            </div>
            <div>
                <select class="texto" name="sangre" id="sangre">
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                    <option value="O+">O+</option>
                </select>
            </div>
        </section>
        <section class="vive">
            <div>
                <select class="texto" name="estado" id="estado">
                    
                    <option value="jalisco">Jalisco</option>
                </select>
                <select class="texto" name="ciudad" id="ciudad">
                    
                    <option value="cd guzman">Cd Guzman</option>
                    <option value="tuxpan">Tuxpan</option>
                    <option value="tepozal">Tepozal</option>
                    <option value="Gomez farias">Gomez farias</option>
                </select>
            </div>
            <div>
                <input class="texto" type="text" placeholder="Nombre de la calle" name="calle"
                value="<?php echo $calle;?>">
                <input class="texto" type="text" placeholder="Numero de la calle" name="numero"
                value="<?php echo $numero;?>">
            </div>
        </section>  
        <section class="correo">
            
            <input class="boton" type="submit" value="Modificar" name="button">
            <a href="./gestionarPaciente.php">Regresar</a>
        </section>
    </form>
</body>
</html>