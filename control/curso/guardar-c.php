
<?php include '../conexion.php';
if (isset($_POST['nomTxt']) && !empty($_POST['nomTxt'])) {
    # code...
    $nombre = $_POST['nomTxt'];
    $clave = $_POST['claTxt'];
    $grado = $_POST['graSel'];
    $descripcion = '0';

    $consultar_usuario = "SELECT `clave` FROM `curso` WHERE `clave` = '$clave'";
    $ejecutar = $conexion->query($consultar_usuario);
    $numDatos = $ejecutar->num_rows;

    if ($numDatos == 0) {
        $agregar = "INSERT INTO `curso`(`id`, `nombre`, `grado`, `clave`, `descripcion`) 
                    VALUES (NULL,'$nombre','$grado','$clave','$descripcion')";
        $ejecutar2 = $conexion->query($agregar);

        if ($ejecutar2) {
            $bien = "El curso con clave:<b>$clave</b>, se registró correctamente.";
            header("Location: ../../vistas/curso/alta-c.php?bien=$bien");
        }else{
            $error = "No se pudo registrar el curso. Error:". mysqli_error($conexion);
            header("Location: ../../vistas/curso/alta.php?err=$error");
        }
    }else{
        $error = "El curso: <b>$clave</b>, ya está registrado.";
        header("Location: ../../vistas/curso/alta-c.php?err=$error");
    }
}else{
    header("Location: ../../vistas/curso/alta-c.php");
}

?>
