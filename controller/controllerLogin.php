<?php 
    //Archivo de conexión con la BD
    require "conexion.php";

    //Datos recibidos de "register.html" por POST
    $email = $mysqli->real_escape_string($_POST['Correo']);
    $password = md5($_POST['Contraseña']);

    //Verificación de usuario existente
    $sqlA = $mysqli->query("SELECT * FROM users WHERE us_email = '$email' AND us_password = '$password'");
    $rowA = $sqlA->num_rows;
    
    //Guarda el nombre del usuario para usarlo como cookie
    $row = $sqlA->fetch_array();
    $nameUser = $row['us_name'];

    if ($rowA == 0) {
        //Si los datos son erroneos devuelve error
        $json = $password;
        $jsonstring = json_encode($json);
        echo $jsonstring;
    }else {
        //Si los datos con correctos crea cookies y devuelve ok
        session_start();
        $_SESSION['logueado'] = TRUE;
        $_SESSION['name'] = $nameUser;

        $json = 'ok';
        $jsonstring = json_encode($json);
        echo $jsonstring;
    }

?>