<?php
  include '../conexion.php';
/*      error_reporting(0);
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
          echo "Ingresaste";
          $row = mysqli_fetch_array($resultado);
      }
      echo "El id del paciente es".$row['id_paciente']."<br>";
      echo "nombre del paciente:  ".$row['nombre']."<br>";
      echo "apellido materno:  ".$row['materno']."<br>";
      echo "apellido paterno:  ".$row['paterno']."<br>";
    $id = $row['id_paciente'];

*/
  //echo "<h1>ingresaste </h1>";
  if(isset($_POST['boton'])){
    //echo "Precionaste el boton ";
    //$paciente = $_POST['id_paciente'];
    $opinion = $_POST['opinion'];

    //echo $paciente;
    echo $opinion;

    $consulta = "INSERT INTO opiniones_doctores (descripcion_Opinion)
    values ('$opinion')";
    $result = mysqli_query($conexion,$consulta);
    if($result){
        echo "Ingresaste correctamente";
        /*$_SESSION['message'] = 'tarea guardada correctamente';
        $_SESSION['message_type'] = 'success';
        header("location:./receta.php");*/
    }
    else{
        echo "Fallo al ingresar";
    }
}
?>

<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../../css/opiniones/estiloTabla.css">
    <title></title>
  </head>
  <body>
  <div class="col-md-6">
    <div class="card card-body">
      <form action="./opinionindex.php" method="post">
        <h4>Ingrése su opinión</h4>
        <!--<input type="text" name="id_paciente" value="" placeholder="id_paciente">-->
        <div class="form-group">
          <textarea name="opinion" rows="2" cols="50" class="form-control" placeholder="Ingresé su opinión"></textarea>
        </div>
        <input type="submit" class="btn btn-success btn-block" name="boton" value="Ingresar">
        <a href="../paciente/gestionarPaciente.php">Regresar a Gestionar Paciente</a>
      </form>
    </div>
  </div>
  <br /><br />


        <div class="col-md-8">
                    <table class="table table-bordered" >
                        <thead>
                            <tr>
                                <th>ID_Opinion</th>
                                <th>Opiniones</th>
                                <th>Acciones           </th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php

                                $query = "SELECT * FROM opiniones_doctores ";
                                $resultado = mysqli_query($conexion,$query);

                                while($fila = mysqli_fetch_array($resultado)){?>
                                    <tr>
                                        <td> <?php echo $fila['ID_Opinion'];?> </td>
                                        <td> <?php echo $fila['descripcion_Opinion'];?> </td>
                                        <td>

                                            <a href="modificarOpinion.php?id=<?php echo $fila['ID_Opinion'];?>" class="btn btn-secondary">Modificar</a>
                                              <i class="fas fa-marker"></i>
                                            <a href="eliminarOpinion.php?id=<?php echo $fila['ID_Opinion'];?>" class="btn btn-danger">Eliminar</a>
                                              <i class="far fa-trash-alt"></i>
                                        </td>
                                    </tr>

                                <?php } ?>

                        </tbody>

                    </table>
                </div>

                <?php include "./includes/footer.php";?>
                <?php include "./includes/header.php";?>
  </body>
</html>
