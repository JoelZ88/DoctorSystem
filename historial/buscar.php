<?php
    $mysqli = new mysqli("localhost","root","","sistemadoctores");
    $salida = "";
    $query = "SELECT * FROM historial order by id_receta desc";

    if(isset($_POST['consulta'])){
        $q = $mysqli->real_escape_string($_POST['consulta']);
        $query = "SELECT * FROM historial WHERE paciente like '%$q%'
        or nombreDoctor like '%$q%'";
    }
    $resultado = $mysqli->query($query);
    if($resultado->num_rows > 0){
        $salida.="<table class ='tabla_datos'>
                <thead>
                    <tr>
                        <td>Paciente</td>
                        <td>Doctor</td>
                        <td>Receta</td>
                        <td>Fecha</td>
                    </tr>
                </thead>
                <tbody>";
        while($fila= $resultado->fetch_assoc()){
            $salida.= "<tr>
                    <td>".$fila['paciente']."</td>
                    <td>".$fila['nombreDoctor']."</td>
                    <td>".$fila['receta']."</td>
                    <td>".$fila['fecha']."</td>

            </tr>";
        }
        $salida.="</tbody></table>";
    }
    else{
        $salida.="<h2>no hay datos :( </h2>";
    }
    echo $salida;
    $mysqli->close();


?>
