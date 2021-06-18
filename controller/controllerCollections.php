<?php 
    //Archivo de conexión con la BD
    require "conexion.php";
    require "fotoprocesar.php";

    //Datos recibidos de "crear.html" por POST
    $Nombre = $mysqli->real_escape_string($_POST['Nombre']);
    $Propietario = $mysqli->real_escape_string($_POST['Propietario']);
    $Curador = $mysqli->real_escape_string($_POST['Curador']);
    $Tipo = $mysqli->real_escape_string($_POST['Tipo']);
    $Descripcion = $mysqli->real_escape_string($_POST['Descripcion']);
    $Email = $mysqli->real_escape_string($_POST['Email']);
    $Direccion = $mysqli->real_escape_string($_POST['Direccion']);
    $Localidad = $mysqli->real_escape_string($_POST['Ciudad']);
    $Telefono = $mysqli->real_escape_string($_POST['Numero']);

    //FOTOS
    $Logo = "";
    $Foto1 = "";
    $Foto2 = "";
    $Foto3 = "";
    if(isset($_FILES['Logo'])){
        $Logo = fotoProcesar('Logo');
    }
    if(isset($_FILES['Foto1'])){
        $Foto1 = fotoProcesar('Foto1');
    }
    if(isset($_FILES['Foto2'])){
        $Foto2 = fotoProcesar('Foto2');
    }if ($Foto2 == "") {
        $Foto2 = "null";
    }
    if(isset($_FILES['Foto3'])){
        $Foto3 = fotoProcesar('Foto3');
    }if ($Foto3 == "") {
        $Foto3 = "null";
    }

    //Recuperar datos de sesion
    session_start();
    $idUser = $_SESSION['id'];

    //Insertar Datos
    $sql = $mysqli->query("INSERT INTO `collection`(`us_id`, `co_name`, `co_owner`, `co_curator`, `co_type`, `co_description`, `co_address`, `Ciudad`, `co_email`, `co_phone`, `co_logo`, `co_defaultImg`, `co_image2`, `co_image3`) VALUES ('$idUser','$Nombre','$Propietario','$Curador','$Tipo','$Descripcion','$Direccion','$Localidad','$Email','$Telefono','$Logo', '$Foto1', '$Foto2', '$Foto3')");

    if ($sql) {
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