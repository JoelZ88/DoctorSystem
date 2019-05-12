<?php
error_reporting(0);
    session_start();
    //$varsesion = $_SESSION['usu'];
    $_SESSION['usuario'] = $_SESSION['usu'];
    $usuario=$_SESSION['usuario'];
    //echo $varsesion;
    include "../conexion.php";

    $consulta = "SELECT*FROM doctor WHERE correo='$usuario'";
    $resultado=mysqli_query($conexion,$consulta);
    $row = mysqli_fetch_array($resultado);

    //echo $usuario;
    //var_dump($row);
    $id = $row['id_doctor'];
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
    $telefono = $row['telefono'];

    
    if(isset($_POST['boton'])){
        $nombre = $_POST['nombre'];
        $materno = $_POST['materno'];
        $paterno = $_POST['paterno'];
        $edad = $_POST['edad'];
        $sexo = $_POST['sexo'];
        $estado = $_POST['estado'];
        $ciudad = $_POST['ciudad'];
        $calle = $_POST['calle'];
        $numero = $_POST['numero'];
        $telefono = $_POST['telefono'];
        
        $sql = "UPDATE doctor SET nombre = '$nombre',paterno = '$paterno', materno = '$materno',
        edad = '$edad',sexo = '$sexo',estado = '$estado',ciudad = '$ciudad',
        calle = '$calle',numero = '$numero',telefono ='$telefono' WHERE id_doctor = '$id'";
        mysqli_query($conexion,$sql);
        header("location:./gestionarDoctor.php");
    }
    //echo $id;

    mysqli_free_result($resultado);


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../css/doctor/modificarDoctor.css">
    <script src="validarDoctor.js"></script>
    
    
    <title>Document</title>
</head>
<body>
    <form action="modificarDoctor.php?id=<?php echo $_GET['id']; ?>" method="POST" onsubmit="return modificar();">

        <div class="title">
            <img src="../../img/usuario-hombre.png" alt="">
        </div>

        <section class="doctor">
            <div >
                <input id="nombre" class="texto" type="text" placeholder="Nombre" name="nombre"
                value="<?php echo $nombre?>">
                <input id="materno" class="texto" type="text" placeholder="Apellido Materno" name="materno"
                value="<?php echo $materno;?>">
            </div>
    
            <div>
                <input id="paterno" class="texto" type="text" placeholder="Apellido Paterno" name="paterno"
                value="<?php echo $paterno;?>">
                <input id="telefono" class="texto" type="text" placeholder="Telefono" name="telefono"
                value="<?php echo $telefono;?>">
            </div>
        </section>

        
        <div class="edad">
            <input id="edad" class="texto" type="text" placeholder="Edad" name="edad"
            value="<?php echo $edad;?>">
        </div>
        <div class="sexo">
            <label for="">sexo:
                <input id="sexo" class="texto"type="radio" name="sexo" value="Hombre"
                value="<?php echo $sexo;?>">Hombre
                <input id="sexo" class="texto" type="radio" name="sexo" value="Mujer"
                value="<?php echo $sexo;?>">Mujer
            </label>
        </div>
        <section class="estado">
            <div>
                <select class="texto" name="estado" id="estado">
                    <option value="jalisco">Jalisco</option>
                    <option value="colima">colima</option>
                    <option value="michoacan">Michoacan</option>
                    <option value="nuevo leon">nuevo Leon</option>
                </select>
            
                <select class="texto" name="ciudad" id="ciudad">
                    <option value="cd guzman">cd guzman</option>
                    <option value="cd guzman">guadalajara</option>
                    <option value="cd guzman">tuxpan</option>
                </select>
            </div>
        </section>
        <section class="demas">
            <div class="calle">
                <input id="calle" class="texto" type="text" placeholder="Calle de la ciudad" name="calle"
                value="<?php echo $calle;?>">
                <input id="numero" class="texto" type="text" placeholder="Numero de la calle" name="numero"
                value="<?php echo $numero;?>">
            </div>
            <div class="ingresar">
                
            </div>
            <input id="modificar" class="boton"type="submit" value="Modificar" name="boton">
            <a href="./gestionarDoctor.php">Regresar</a>
        </section>
    </form>
    <script src="validarDoctor.js"></script>
    </body>
</html>