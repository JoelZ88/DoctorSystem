<?php include "./conexion.php"; ?>

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

    //echo "Este es el usuario: ".$usuario."<br>";

    $query = "SELECT * FROM paciente where correo = '$usuario'";
    $resultado = mysqli_query($conexion,$query);

    if(!$resultado){
        echo "Error en la consulta <br>";
    }
    else{
       // echo "Ingresaste";
        $row = mysqli_fetch_array($resultado);
       //echo "El id del doctor es: <br>";
    }
    //echo $row['id_doctor']."<br>";

    $id=$row['estado'];
    
?>


<?php include "./include/header.php";?>            
<div class="col-md-8">
                
                    
    <table class="table table-bordered" >
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Paterno</th>
                            <th>Materno</th>
                            <th>Edad</th>
                            <th>Sexo</th>
                            <th>Telefono</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php 
                            
                            $query = "SELECT * FROM doctor where estado = '$id'";
                            $resultado = mysqli_query($conexion,$query);
                            

                            while($fila = mysqli_fetch_array($resultado)){?>
                                <tr>
                                    
                                    <td> <?php echo $fila['nombre'];?> </td>
                                    <td> <?php echo $fila['paterno'];?> </td>
                                    <td> <?php echo $fila['materno'];?> </td>
                                    <td> <?php echo $fila['edad'];?> </td>
                                    <td> <?php echo $fila['sexo'];?> </td>
                                    <td> <?php echo $fila['telefono'];?> </td>
                                    <td>
                                        <a href="cita.php?id=<?php echo $fila['id_doctor'];?>" class="btn btn-danger">
                                            <i class="fas fa-marker"></i>
                                        </a>
                                        <a href="cita.php?id=<?php echo $fila['id_doctor'];?>">Ver</a>
                                    </td> 
                                </tr>
                                
                            <?php } ?>
                        
                    </tbody>

                </table>
    <a href="../paciente/gestionarPaciente.php">Regresar a Gestionar Paciente</a>
            </div>
<?php include "./include/footer.php";?>