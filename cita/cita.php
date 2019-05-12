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

    $id=$row['id_paciente'];
    $nombre=$row['nombre'];
 
   
    if(isset($_POST['boton'])){
         $id_doctor = $_GET['id'];
        echo"el id del doctor es:".$id_doctor."<br>";     
        $Fecha_Cita = $_POST['Fecha_Cita'];
        $hora_Cita = $_POST['hora_Cita'];
        echo "la fecha es: ".$Fecha_Cita;
        
        $consulta = "INSERT INTO cita_medica 
        (`id_doctor`,`id_paciente`,`nombre_paciente`,`Fecha_Cita`,`hora_Cita`) 
        VALUES('$id_doctor','$id','$nombre','$Fecha_Cita','$hora_Cita')";
        $result = mysqli_query($conexion,$consulta);
        if($result){
            echo "Ingresaste correctamente";
            $_SESSION['message'] = 'tarea guardada correctamente';
            $_SESSION['message_type'] = 'success';
            //header("location:./cita.php");
        }
        else{
            echo "Fallo al ingresar";
        }
    }

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
                   
                         
                 
                    <form action="cita.php?id=<?php echo $_GET['id']; ?>" method="POST"
                    onsubmit="return ingresar();">

                   
    
                        
                        
                        <div class="form-group">
                           
                        </div>

                        <div class="form-group">
                            <input type="date" id="Fecha_Cita" name="Fecha_Cita" class="form-control" placeholder="Fecha de la cita" >
                            
                            
                            <input type="time" id="hora_Cita" name="hora_Cita" class="form-control" placeholder="Hora Cita" autofocus
                            required pattern="[0-9]{1,5}" title="Solo se aceptan numeros">
                            
                        </div>        
                        <input type="submit" class="btn btn-success btn-block" name="boton" value="Guardar Cita">
                        <a href="../paciente/gestionarPaciente.php">Regresar a Gestionar Paciente</a>
                    </form>
                </div>
            </div>
<!------>

            <div class="col-md-8">
                <table class="table table-bordered" >
                    <thead>
                        <tr>
                            <th>Doctor</th>
                            <th>Fecha </th>
                            <th>Hora</th>
                            <th>Acciones           </th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php 
                            
                            $query = "SELECT * FROM cita_medica where id_paciente = '$id'";
                            $resultado = mysqli_query($conexion,$query);

                            while($fila = mysqli_fetch_array($resultado)){?>
                                <tr>
                                    <td> <?php echo $fila['id_doctor'];?> </td>
                                    <td> <?php echo $fila['Fecha_Cita'];?> </td>
                                    <td> <?php echo $fila['hora_Cita'];?> </td>
                                    <td>
                                        <a href="modificarCita.php?id=<?php echo $fila['ID_Cita'];?>" class="btn btn-secondary">
                                        <i class="fas fa-marker"></i>
                                        </a>
                                        <a href="eliminarCita.php?id=<?php echo $fila['ID_Cita'];?>" class="btn btn-danger">
                                            <i class="far fa-trash-alt"></i>
                                        </a>
                                        <a href="#">Ver</a>
                                    </td> 
                                </tr>
                                
                            <?php } ?>
                        
                    </tbody>

                </table>
            </div>

        </div>
    </div>


<?php include "./include/footer.php";?>