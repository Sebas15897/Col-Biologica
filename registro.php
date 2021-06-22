<?php
    //Llamado a base de datos
    require "controller/conexion.php";

    //Obtener Id del registro por GET
    $id = $_GET['id'];
    
    //Consulta de datos de colección
    $queryA = "SELECT * FROM registers WHERE re_id = '$id'";
    $sqlF = $mysqli->query($queryA);
    $rowB = $sqlF->fetch_array();
    //Fin de datos de colección
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
    <link rel="stylesheet" type="text/css" href="css/map.css"/>
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
            <h2>Información taxonómica:</h2>
            <h4>Número de catalogo</h4>
            <p><?php echo $rowB['re_catalogNumber']?></p>
            <h4>Filo:</h4>
            <p><?php echo $rowB['phy_id']?></p>
            <h4>Clase:</h4>
            <p><?php echo $rowB['cla_id']?></p>
            <h4>Orden</h4>
            <p><?php echo $rowB['ord_id']?></p>
            <h4>Familia</h4>
            <p><?php echo $rowB['fam_id']?></p>
            <h4>Genero</h4>
            <p><?php echo $rowB['gen_id']?></p>
            <h4>Epíteto</h4>
            <p><?php echo $rowB['re_epiteth']?></p>
            <h2>Información de colecta:</h2>
            <h4>Fecha de colecta</h4>
            <p><?php echo $rowB['re_collectDate']?></p>
            <h4>Fecha de registro</h4>
            <p><?php echo $rowB['re_registerDate']?></p>
            <h4>Método de colecta:</h4>
            <p><?php echo $rowB['re_collectMethod']?></p>
            <h2>Información geografica</h2>
            <h4>Latitud</h4>
            <p><?php echo $rowB['re_latitude']?></p>
            <input type="hidden" value="<?php echo $rowB['re_latitude']?>" id="lati">
            <h4>Longitud</h4>
            <p><?php echo $rowB['re_longitude']?></p>
            <input type="hidden" value="<?php echo $rowB['re_longitude']?>" id="longi">
            <h4>Pais</h4>
            <p><?php echo $rowB['re_contry']?></p>
            <h4>Departamento</h4>
            <p><?php echo $rowB['re_department']?></p>
            <h4>Localidad</h4>
            <p><?php echo $rowB['re_locality']?></p>
            <h4>Descripción sitio de colecta</h4>
            <p><?php echo $rowB['re_samplingSite']?></p>
            <h2>Galeria:</h4>
            <?php
                if ($rowB['co_defaultImg'] != "null") {
                    echo("<img src='archivos/".$rowB['re_img']."' alt='Foto1'>");
                }
            ?>
            <div id="map"></div>
            
        </div>
    </div>

    <footer>
        <div class="footerContainer"></div>
    </footer>
    <script src="maps.js" async defer></script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDQSClkaxq4SxWDFC3gaOKLgd7Ha-y5olg&callback=initMap&libraries=&v=weekly"
        async
    ></script>


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
