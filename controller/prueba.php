<?php 
    function fotoProcesar($nombre){
        $imagen = $_FILES[$nombre]['tmp_name'];   
        $imagen_tipo = exif_imagetype($_FILES[$nombre]['tmp_name']);

        if ($imagen_tipo == IMAGETYPE_PNG OR $imagen_tipo == IMAGETYPE_JPEG OR $imagen_tipo == IMAGETYPE_BMP) {
            if(is_uploaded_file($_FILES[$nombre]['tmp_name'])) { 
                $ext = ".jpg"; 
                $aleatorio = substr(strtoupper(md5(microtime(true))), 0,6);
                $namefinal = 'NAME-'.$aleatorio;
                $nuevaimagen = '../archivos/'.$namefinal.$ext;
                move_uploaded_file($imagen, $nuevaimagen);
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Colbiológica</title>
</head>
<body>
    <div id="content">
        <form action="" method="post" enctype="multipart/form-data">
            <p>Logo:</p>
            <input type="file" name="Logo" required>
            <p>Fotos: (opcional)</p>
            <input type="file" name="Foto1" required>
            <input type="file" name="Foto2">
            <input type="file" name="Foto3">
            <button type="submit">Crear</button>
        </form>
        <?php
            fotoProcesar('Logo');
            fotoProcesar('Foto1');
        ?>
</body>
</html>