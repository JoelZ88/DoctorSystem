<?php 
    include "./conexion.php";
    
    if(isset($_GET['id'])){
        $id_cita= $_GET['id'];
        $consulta = "SELECT * FROM cita_medica where ID_Cita='$id_cita'";
        $resultado = mysqli_query($conexion,$consulta);

        if(mysqli_num_rows($resultado)==1){
           $row = mysqli_fetch_array($resultado);
           //$id_doctor = $row['id_doctor']; 
           $Fecha_Cita = $row['Fecha_Cita'];
           $hora_Cita = $row['hora_Cita'];
          /* $peso = $row['peso'];
           $talla = $row['talla'];
           $ta = $row['ta'];
           $fe = $row['fe'];
           $temp = $row['temp'];
           $receta = $row['receta'];*/
          /* echo "Tu paciente es :".$paciente."<br>";
           echo "su doctor es :".$id_doctor."<br>";
           echo "su edad es :".$edad."<br>";
           echo "su talla es :".$talla."<br>";
           echo "su ta es: ".$ta."<br>";
           echo "su fe es :".$fe."<br>";
           echo "Tu temp es :".$temp."<br>";
           echo "Tu receta es :".$receta."<br>";*/
        }
    }
    if(isset($_POST['modificar'])){
        $id=$_GET['id'];
        $Fecha_Cita = $_POST['Fecha_Cita'];
        $hora_Cita = $_POST['hora_Cita'];
        /*$peso = $_POST['peso'];
        $talla = $_POST['talla'];
        $ta = $_POST['ta'];
        $fe = $_POST['fe'];
        $temp = $_POST['temp'];
        $receta = $_POST['receta'];*/

        $query="UPDATE cita_medica set `Fecha_Cita`='$Fecha_Cita',`hora_Cita`='$hora_Cita' WHERE ID_Cita = '$id_cita'";
        mysqli_query($conexion,$query);
        header("location: ./cita.php");
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
                            <input type="date" name="Fecha_Cita" class="form-control" placeholder="Fecha">
                            <input type="time" name="hora_Cita" class="form-control" paceholder="Hora">
                        </div>

                        <div class="form-group">
                            
                            
                        </div>
                        <input type="submit" class="btn btn-success btn-block" name="modificar" value="Modificar Receta">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "./include/footer.php"?>
   


