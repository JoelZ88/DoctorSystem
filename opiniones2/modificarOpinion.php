<?php
  include '../conexion.php';

  //echo "<h1>ingresaste </h1>";
  if(isset($_GET['id'])){
    $id_opinion = $_GET['id'];
    $consulta = "SELECT * FROM opiniones_doctores where ID_Opinion like $id_opinion";
    $resultado = mysqli_query($conexion,$consulta);
    if(!$consulta){echo "fallaste";}
    else {
      $fila = mysqli_fetch_array($resultado);
      echo "tu id".$fila['ID_Opinion']."<br>";
      echo "tu opinion es: ".$fila['descripcion_Opinion']."<br>";
    }
  }

  if(isset($_POST['boton'])){
    $id = $_GET['id'];
    //echo "Precionaste el boton ";
    //$id_opinion = $_POST['id_Opinion'];
    $opinion = $_POST['opinion'];
    $query = "UPDATE opiniones_doctores SET descripcion_Opinion = '$opinion'
    WHERE ID_Opinion = '$id'";
    $respuesta=mysqli_query($conexion,$query);
    if($respuesta){
      header("location:./opinionindex.php");
    }
     //header "./opinionindex.php";
  }
?>

<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
  <div class="col-md-6">
    <div class="card card-body">
      <form action="./modificarOpinion.php?id=<?php echo $_GET['id'];?>" method="post">
        <h4>Modifique su opinión</h4>
        <div class="form-group">
          <textarea name="opinion" rows="2" placeholder="Modifiqué su opinión"><?php echo $fila[1];?></textarea>
        </div>
        <input type="submit" class="btn btn-success btn-block" name="boton" value="Registrar">
      </form>
    </div>
  </div>

  <?php include "./includes/footer.php";?>
  <?php include "./includes/header.php";?>

  </body>
</html>
