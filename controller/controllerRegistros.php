<?php 
    //Archivo de conexión con la BD
    require "conexion.php";
    require "fotoprocesar.php";

    //Datos recibidos de "crear.html" por POST
    $NumCatalogo = $mysqli->real_escape_string($_POST['NumCatalogo']);
    $filo = $mysqli->real_escape_string($_POST['filo']);
    $Clase = $mysqli->real_escape_string($_POST['Clase']);
    $Orden = $mysqli->real_escape_string($_POST['Orden']);
    $Familia = $mysqli->real_escape_string($_POST['Familia']);
    $Genero = $mysqli->real_escape_string($_POST['Genero']);
    $Epiteto = $mysqli->real_escape_string($_POST['Epiteto']);
    $CollectDate = $mysqli->real_escape_string($_POST['CollectDate']);
    $Metodo = $mysqli->real_escape_string($_POST['Metodo']);
    $Latitud = $mysqli->real_escape_string($_POST['Latitud']);
    $Longitud = $mysqli->real_escape_string($_POST['Longitud']);
    $Pais = $mysqli->real_escape_string($_POST['Pais']);
    $Departamento = $mysqli->real_escape_string($_POST['Departamento']);
    $Localidad = $mysqli->real_escape_string($_POST['Localidad']);
    $Sitio = $mysqli->real_escape_string($_POST['Sitio']);
    $CollectionId = $mysqli->real_escape_string($_POST['CollectionId']);

    //FOTOS
    $Foto = "";

    if(isset($_FILES['Foto'])){
        $Logo = fotoProcesar('Foto');
    }

    //Insertar Datos
    $queryz = "INSERT INTO `registers`(`co_id`, `re_catalogNumber`, `phy_id`, `cla_id`, `ord_id`, `fam_id`, `gen_id`, `re_epiteth`, `re_collectDate`, `re_collectMethod`, `re_latitude`, `re_longitude`, `re_contry`, `re_department`, `re_locality`, `re_samplingSite`, `re_img`) VALUES ('$CollectionId', '$NumCatalogo', '$filo', '$Clase', '$Orden', '$Familia', '$Genero', '$Epiteto', '$CollectDate', '$Metodo', '$Latitud', '$Longitud', '$Pais', '$Departamento', '$Localidad', '$Sitio', '$Logo')";
    $sqlz = $mysqli->query($queryz);

    if ($sqlz) {
        //Si se insertaron los datos
        $json = 'ok';
        $jsonstring = json_encode($json);
        echo $jsonstring;
    }else{
        //Si no se insertaron
        $json = 'error';
        $jsonstring = json_encode($json);
        echo $jsonstring;
    }

?>