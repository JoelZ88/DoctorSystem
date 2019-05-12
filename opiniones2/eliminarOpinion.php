<?php
  include '../conexion.php';

  if(isset($_GET['id'])){
    $id_opinion = $_GET['id'];
    $consulta = "SELECT * FROM opiniones_doctores where ID_Opinion like $id_opinion";
    $resultado = mysqli_query($conexion,$consulta);
    if(!$consulta){echo "fallaste";}
    else {
      $fila = mysqli_fetch_array($resultado);
      echo "tu id".$fila['ID_Opinion']."<br>";
      echo "tu opinion es: ".$fila['descripcion_Opinion']."<br>";

      $query = "DELETE FROM opiniones_doctores WHERE ID_Opinion
      LIKE '$id_opinion'";
      $respuesta = mysqli_query($conexion,$query);
      if($respuesta){
          header("location:./opinionindex.php");
      }

    }
  }

?>
