<?php 
    //Archivo de conexión con la BD
    require "conexion.php";

    //Obtención de ID de usario por cookie
    session_start();
    $userId = $_SESSION['id'];

    //Consulta las colecciones asociadas al ID del usuario
    $sqlA = $mysqli->query("SELECT * FROM 'collection' WHERE us_id = '$userId'");

    //Guarda los resultados en un array y cuenta cuántos son
    while($row = $sqlA->fetch_array()){
        $rows[] = $row;
    }
    $rowA = $sqlA->num_rows;
    
    if ($rowA == 0) {
        //Si los datos son erroneos devuelve error
        $json = 'NoCollection';
        $jsonstring = json_encode($json);
        echo $jsonstring;
    }else {
        $json = $rows;
        $jsonstring = json_encode($json);
        echo $jsonstring;
    }

?>