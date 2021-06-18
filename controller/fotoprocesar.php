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
                $out = $namefinal.$ext;
                return $out;
            }
        }
    }
?>