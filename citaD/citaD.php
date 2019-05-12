<?php include "./conexion.php"; ?>

<?php
error_reporting(0);
session_start();
$varsesion = $_SESSION['usu'];
if($varsesion == null || $varsesion =''){
    //echo "<h1>Usted no tiene autorizacion </h1>";
    die();
}
    $_SESSION['usuario'] = $_SESSION['usu'];
    $usuario = $_SESSION['usuario'];

    //echo "Este es el usuario: ".$usuario."<br>";

    $query = "SELECT * FROM doctor where correo = '$usuario'";
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

    $id=$row['id_doctor'];
?>


<?php include "./include/header.php";?>

<script src="./validarReceta.js"></script>

<div class="container p-4">
        <div class="row">
            
            <div class="col-md-4">

                <?php if(isset($_SESSION['message'])){?>

                    <div class="alert alert-<?= $_SESSION['message_type'];?> alert-dismissible fade show" role="alert">
                        <?= $_SESSION['message']; ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>

                    </div>
                <?php } ?>

                <div class="card card-body">

                    <form action="guardarCita.php" method="POST"
                    onsubmit="return ingresar();">

                        <div class="form-group">
                            <input type="text" id="id_paciente" name="id_paciente" class="form-control" placeholder="Numero de control control">
                        </div>
                        <div>
                        <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre del paciente">
                        </div>
                        <div class="form-group">
                            <input type="date" id="Fecha_Cita" name="Fecha_Cita" class="form-control" placeholder="Fecha de la cita A/M/D">
                            
                            
                            <input type="time" id="hora_Cita" name="hora_Cita" class="form-control" placeholder="hora_Cita H-M-S" autofocus
                            required pattern="[0-9]{1,5}" title="Solo se aceptan numeros">
                        </div>        
                        <input type="submit" class="btn btn-success btn-block" name="boton" value="Guardar Cita">
                        <a href="../doctor/gestionarDoctor.php">Regresar a Gestionar Doctor</a>
                    </form>
                </div>
            </div>
<!------>

            <div class="col-md-8">
                <table class="table table-bordered" >
                    <thead>
                        <tr>
                            <th>Paciente</th>
                            <th>Fecha </th>
                            <th>Hora</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php 
                            
                            $query = "SELECT * FROM cita_medica where id_doctor = '$id'";
                            $resultado = mysqli_query($conexion,$query);

                            while($fila = mysqli_fetch_array($resultado)){?>
                                <tr>
                                    <td> <?php echo $fila['nombre_paciente'];?> </td>
                                    <td> <?php echo $fila['Fecha_Cita'];?> </td>
                                    <td> <?php echo $fila['hora_Cita'];?> </td>
                                    <td>
                                        <a href="modificarCita.php?id=<?php echo $fila['ID_Cita'];?>" class="btsn btn-secondary">
                                        <i class="fas fa-marker"></i>
                                        </a>
                                        <a href="eliminarCita.php?id=<?php echo $fila['ID_Cita'];?>" class="btn btn-danger">
                                            <i class="far fa-trash-alt"></i>
                                        </a>
                                      
                                    </td> 
                                </tr>
                                
                            <?php } ?>
                        
                    </tbody>

                </table>
            </div>

        </div>
    </div>


<?php include "./include/footer.php";?>