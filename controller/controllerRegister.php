<?php 
    //Archivo de conexión con la BD
    require "conexion.php";

    //Datos recibidos de "register.html" por POST
    $name = $mysqli->real_escape_string($_POST['Nombres']);
    $secondName = $mysqli->real_escape_string($_POST['Apellidos']);
    $email = $mysqli->real_escape_string($_POST['Correo']);
    $password = md5($_POST['Contraseña']);

    //código de verificación generado por MD5STAMP
    $token = uniqid();

    //Verificación de usuario existente
    $sqlA = $mysqli->query("SELECT 'us_email' FROM `users` WHERE us_email = '$email'");
    $rowA = $sqlA->num_rows;

    if ($rowA == 0) {
        //Si el email no existe registra el usuario
        $sql = $mysqli->query("INSERT INTO `users`(`us_email`, `us_password`, `us_name`, `us_secondName`,   `us_verification_code`) VALUES ('$email','$password','$name','$secondName','$token')");
        $json = 'ok';
        $jsonstring = json_encode($json);
        echo $jsonstring;
    }else {
        //Si el usuario existe devuelve mensaje de usuario si existe
        $json = 'repetido';
        $jsonstring = json_encode($json);
        echo $jsonstring;
    }

?>