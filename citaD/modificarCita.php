<?php 
    include "./conexion.php";
    
    if(isset($_GET['id'])){
        $ID_Cita= $_GET['id'];
        $consulta = "SELECT * FROM cita_medica where ID_Cita='$ID_Cita'";
        $resultado = mysqli_query($conexion,$consulta);

        if(mysqli_num_rows($resultado)==1){
           $row = mysqli_fetch_array($resultado);
           $ID_Paciente = $row['id_paciente'];
           $nombrePaciente = $row['nombre_paciente'];
           $Fecha_Cita = $row['Fecha_Cita'];
           $hora_Cita = $row['hora_Cita'];
           //echo "tu id de receta e:".$row['ID_Cita'];
        }
    }
    if(isset($_POST['modificar'])){
        //$id_doctor = $_POST['id_doctor'];
        $id=$_GET['id'];
        $nombrePaciente = $_POST['nombre'];
        $Fecha_Cita = $_POST['Fecha_Cita'];
        $hora_Cita = $_POST['hora_Cita'];

        $query="UPDATE cita_medica SET `nombre_paciente`='$nombrePaciente',`Fecha_Cita`='$Fecha_Cita',`hora_Cita`='$hora_Cita'
        WHERE `ID_Cita`='$id'";
        mysqli_query($conexion,$query);
        header("location: ./citaD.php");
    }
?>

<?php include "./include/header.php"?>

<div class="conteiner p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
<!---------------------------------------------------------------------------->
            <form action="modificarCita.php?id=<?php echo $_GET['id']; ?>" method="POST">

            <div class="form-group">
                            

                        <div class="form-group">
                            <input type="text"  name="nombre" class="form-control" placeholder="Nombre del paciente"  autofocus
                            value="<?php echo $nombrePaciente?>">
                            
                            <input type="date" name="Fecha_Cita" class="form-control" placeholder="Fecha"  autofocus
                            values="<?php echo $Fecha_Cita?>">

                            <input type="time" name="hora_Cita" class="form-control" placeholder="Hora"  autofocus
                            values="<?php echo $hora_Cita?>">
                            
                        </div>        

                       
        
                        <input type="submit" class="btn btn-success btn-block" name="modificar" value="Modificar Cita">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "./include/footer.php"?>
   