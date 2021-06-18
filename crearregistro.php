<?php
    //Llamado a base de datos
    require "controller/conexion.php";

    //Obtener Id de usuario por GET
    $id = $_GET['id'];
    
    
    //Consulta de Orden, Familia, Genero, phylum y Clase asociados a la colección
    $sqlM = $mysqli->query("SELECT * FROM phylum WHERE us_id = '$id'");
    $sqlN = $mysqli->query("SELECT * FROM clase WHERE us_id = '$id'");
    $sqlO = $mysqli->query("SELECT * FROM orden WHERE us_id = '$id'");
    $sqlP = $mysqli->query("SELECT * FROM familia WHERE us_id = '$id'");
    $sqlQ = $mysqli->query("SELECT * FROM genero WHERE us_id = '$id'");
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
    <link rel="stylesheet" href="/css/crear.css">
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

    <div id="content">
        <form id="CrearRegistro" method="post" enctype="multipart/form-data">
            <input type="text" name="NumCatalogo" placeholder="Número de catalogo" required>
            <select name="filo">
                <option value="#">Selecciona un filo</option>
                <?php
                    while($rowM = $sqlM->fetch_array()) {
                        ?>
                            <option value="<?php echo $rowM['phy_name'];?>"><?php echo $rowM['phy_name'];?></option>
                        <?php } ?>
                <option value="Desconocido">desconocido</option>
                <option value="Colección ictiológica">Agregrar</option>
            </select>
            <select name="Clase">
            <option value="#">Selecciona una clase</option>
                <?php
                    while($rowN = $sqlN->fetch_array()) {
                        ?>
                            <option value="<?php echo $rowN['cla_name'];?>"><?php echo $rowN['cla_name'];?></option>
                    <?php } ?>
                <option value="Desconocido">desconocido</option>
                <option value="Colección ictiológica">Agregrar</option>
            </select>
            <select name="Orden">
            <option value="#">Selecciona un orden</option>
                <?php
                    while($rowO = $sqlO->fetch_array()) {
                        ?>
                            <option value="<?php echo $rowO['ord_name'];?>"><?php echo $rowO['ord_name'];?></option>
                        <?php } ?>
                <option value="Desconocido">desconocido</option>
                <option value="Colección ictiológica">Agregrar</option>
            </select>
            <select name="Familia">
            <option value="#">Selecciona una familia</option>
                <?php
                    while($rowP = $sqlP->fetch_array()) {
                        ?>
                            <option value="<?php echo $rowP['fam_name'];?>"><?php echo $rowP['fam_name'];?></option>
                        <?php } ?>
                <option value="Desconocido">desconocido</option>
                <option value="Colección ictiológica">Agregrar</option>
            </select>
            <select name="Genero">
            <option value="#">Selecciona un genero</option>
                <?php
                    while($rowQ = $sqlQ->fetch_array()) {
                        ?>
                            <option value="<?php echo $rowQ['gen_name'];?>"><?php echo $rowQ['gen_name'];?></option>
                        <?php } ?>
                <option value="Desconocido">desconocido</option>
                <option value="Colección ictiológica">Agregrar</option>
            </select>
            <input type="text" name="Epiteto" placeholder="Epiteto" required>
            <input type="date" name="CollectDate" required>
            <input type="text" name="Metodo" placeholder="Metodo de colecta" required>
            <input type="text" name="Latitud" placeholder="Latitud" required>
            <input type="text" name="Longitud" placeholder="Longitud" required>
            <input type="text" name="Pais" placeholder="Pais" required>
            <input type="text" name="Departamento" placeholder="Departamento" required>
            <input type="text" name="Localidad" placeholder="Localidad" required>
            <input type="text" name="Sitio" placeholder="Descripcion de sitio de muestreo" required>
            <input type="hidden" value="<?php echo $_GET['co'];?>" name="CollectionId">
            <p>Fotos:</p>
            <input type="file" name="Foto">
            <button type="submit">Crear</button>
        </form>
    </div>

    <footer>
        <div class="footerContainer"></div>
    </footer>
    
    <script src="controller/controllerRegistros.js"></script>
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
