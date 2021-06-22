<?php 
    //Archivo de conexión con la BD
    require "conexion.php";

    //Obtención de ID de usario por cookie
    session_start();
    $userId = $_SESSION['id'];

    //Consulta las colecciones asociadas al ID del usuario
    $query = "SELECT * FROM collection WHERE us_id = '$userId'";
    $sql = $mysqli->query($query);

    if ($sql) {
        //Guarda los resultados en un array y cuenta cuántos son
        $rowA = $sql->num_rows;
        while($row = $sql->fetch_array())
        {
            $rows[] = $row;
        }

        if ($rowA == 0) {
            //Si los datos son erroneos devuelve error
            $json = $rowA;
            $jsonstring = json_encode($json);
            echo $jsonstring;
        }else {
            $json = $rows;
            $jsonstring = json_encode($json);
            echo $jsonstring;
        }

    }else {
        $json = "Error";
        $jsonstring = json_encode($json);
        echo $jsonstring;
    }

?>