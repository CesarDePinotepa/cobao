
<?php include '../conexion.php';
if (isset($_POST['nomTxt']) && !empty($_POST['nomTxt'])) {
    # code...
    $nombre = $_POST['nomTxt'];

    $grado = $_POST['graSel'];
    $clave = date("Y").$nombre;

    $consultar_usuario = "SELECT `nombre` FROM `grupo` WHERE `nombre` = '$nombre'";
    $ejecutar = $conexion->query($consultar_usuario);
    $numDatos = $ejecutar->num_rows;

    if ($numDatos == 0) {
        $agregar = "INSERT INTO `grupo`(`id`, `nombre`, `semestre`, `clave`, `estudiante_id`) 
                    VALUES (NULL,'$nombre','$grado','$clave',NULL)";
        $ejecutar2 = $conexion->query($agregar);

        if ($ejecutar2) {
            $bien = "El grupo <b>$nombre</b> se registró correctamente.";
            header("Location: ../../vistas/grupos/alta-a.php?bien=$bien");
        }else{
            $error = "No se pudo registrar el curso. Error:". mysqli_error($conexion);
            header("Location: ../../vistas/grupos/alta-a.php?err=$error");
        }
    }else{
        $error = "El curso: <b>$nombre</b>, ya está registrado.";
        header("Location: ../../vistas/grupos/alta-a.php?err=$error");
    }
}else{
    header("Location: ../../vistas/grupos/alta-a.php");
}

?>
