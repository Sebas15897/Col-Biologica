<?php
    //Llamado a base de datos
    require "controller/conexion.php";

    //Obtener Id de la colección por GET
    $id = $_GET['id'];
    
    //Consulta de datos de colección
    $queryA = "SELECT * FROM collection WHERE co_id = '$id'";
    $sqlF = $mysqli->query($queryA);
    $rowB = $sqlF->fetch_array();
    //Fin de datos de colección
    
    //Consulta de Orden, Familia, Genero, phylum y Clase asociados a la colección
    $sqlG = $mysqli->query("SELECT * FROM familia WHERE us_id = '".$rowB['us_id']."'");
    $sqlH = $mysqli->query("SELECT * FROM orden WHERE us_id = '".$rowB['us_id']."'");
    $sqlI = $mysqli->query("SELECT * FROM phylum WHERE us_id = '".$rowB['us_id']."'");
    $sqlJ = $mysqli->query("SELECT * FROM clase WHERE us_id = '".$rowB['us_id']."'");
    $rowG = $sqlG->num_rows;
    $rowH = $sqlH->num_rows;
    $rowI = $sqlI->num_rows;
    $rowJ = $sqlJ->num_rows;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/dash.css">
    <script src="https://kit.fontawesome.com/8446c158db.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="/css/nav.css">
    <link rel="stylesheet" href="/css/footer.css">
    <title>Colbiológica</title>
    <!-- Start favicon Colbiologica -->
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <!-- End Favicon Colbiologica -->

</head>
<body>
    <header>
        <div class="menuContainer"></div>
    </header>

    <div style="margin-top:60px">
        <div id="tarjetaPresentacion">
            <h2>Nombre de la colección:</h1>
            <p><?php echo $rowB['co_name']?></p>
            <h2>Propietario:</h1>
            <p><?php echo $rowB['co_owner']?></p>
            <h2>Curador:</h1>
            <p><?php echo $rowB['co_curator']?></p>
            <h2>Tipo de colección:</h1>
            <p><?php echo $rowB['co_type']?></p>
            <h2>Descripción:</h1>
            <p><?php echo $rowB['co_description']?></p>
            <h2>Información de contacto:</h1>
            <h4>Dirección:</h1>
            <p><?php echo $rowB['co_address']?></p>
            <h4>Ciudad:</h1>
            <p><?php echo $rowB['Ciudad']?></p>
            <h4>Email:</h1>
            <p><?php echo $rowB['co_email']?></p>
            <h4>Telefono:</h1>
            <p><?php echo $rowB['co_phone']?></p>
            <h2>Logo:</h1>
            <img src="archivos/<?php echo $rowB['co_logo']?>" alt="Logo">
            <h2>Galeria:</h1>
            <?php
                if ($rowB['co_defaultImg'] != "null") {
                    echo("<img src='archivos/".$rowB['co_defaultImg']."' alt='Foto1'>");
                }if ($rowB['co_image2'] != "null") {
                    echo("<img src='archivos/".$rowB['co_image2']."' alt='Foto2'>");
                }if ($rowB['co_image3'] != "null") {
                    echo("<img src='archivos/".$rowB['co_image3']."' alt='Foto3'>");
                }
            ?>
        </div>
        <div id ="tarjetaEstadisticas">
                <h1>Estadisticas:</h1>
                <p>Filos: <?php echo $rowI;?></p>
                <p>Clases: <?php echo $rowJ;?></p>
                <p>Ordenes: <?php echo $rowH;?></p>
                <p>Familias: <?php echo $rowG;?></p>
        </div>
        <div id="registros">
            <a href="crearregistro.php?id=<?php echo $rowB['us_id'];?>&co=<?php echo $rowB['co_id'];?>">
                <p>Crear registro</p>
                <img src="img/agregar.png" width="9%" alt="Crear colección">
            </a>
            <div>
                <table>
                    <tr>
                        <th>Género</th>
                        <th>Epíteto</th>
                        <th></th>
                        <th></td>
                    </tr>
                    <?php
                        $sqlx = $mysqli->query("SELECT re_id ,gen_id, re_epiteth FROM registers WHERE co_id = '$id' ORDER BY gen_id DESC");
                        while($rowx = $sqlx->fetch_array()) {
                    ?>
                        <tr>
                            <td><?php echo $rowx['gen_id'];?></td>
                            <td><?php echo $rowx['re_epiteth'];?></td>
                            <td>
                                <a href="registro.php?id=<?php echo $rowx['re_id'];?>">
                                    <img src="img/ver.png" width="8%" alt="">
                                </a>
                            </td>
                            <td>
                                <img src="img/editar.png" width="8%" alt="">
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>

    <footer>
        <div class="footerContainer"></div>
    </footer>
    
    <script>
        $(document).ready(function () {
            $('.menuContainer').load('./nav.html');
        });

        $(document).ready(function () {
            $('.footerContainer').load('./footer.html');
        });
    </script>
</body>
</html>
