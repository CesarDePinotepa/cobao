
<?php include '../conexion.php';
if (isset($_POST['nomTxt']) && !empty($_POST['nomTxt'])) {
    # code...
    $id = $_POST['idHdn'];
    $nombre = $_POST['nomTxt'];
    $clave = $_POST['claTxt'];
    $grado = $_POST['graSel'];
    $descripcion = $_POST['desTxt'];
/*
    $consultar_usuario = "SELECT `clave` FROM `curso` WHERE `clave` = '$clave'";
    $ejecutar = $conexion->query($consultar_usuario);
    $numDatos = $ejecutar->num_rows;

    if ($numDatos == 0) {*/
        $agregar = "UPDATE `curso` SET `nombre`='$nombre',`grado`='$grado',`clave`='$clave',`descripcion`='$descripcion' WHERE `id` = '$id'";
        $ejecutar2 = $conexion->query($agregar);

        if ($ejecutar2) {
            $bien = "Los datos del curso se actualizaron correctamente.";
            header("Location: ../../vistas/curso/editar-c.php?bien=$bien");
        }else{
            $error = "No se pudo registrar el curso. Error:". mysqli_error($conexion);
            header("Location: ../../vistas/curso/editar-c.php?err=$error");
        }
    /*}else{
        $error = "El curso: <b>$clave</b>, ya está registrado.";
        header("Location: ../../vistas/curso/alta-c.php?err=$error");
    }*/
}else{
    header("Location: ../../vistas/curso/editar-c.php");
}

?>
