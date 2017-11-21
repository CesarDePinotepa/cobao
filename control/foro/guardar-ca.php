
<?php include '../conexion.php';
if (isset($_POST['nomTxt']) && !empty($_POST['nomTxt'])) {
    # code...
    $nombre = $_POST['nomTxt'];

        $agregar = "INSERT INTO `foro_categoria`(`id_forocategoria`, `categoria`) VALUES (NULL,'$nombre')";
        $ejecutar2 = $conexion->query($agregar);

        if ($ejecutar2) {
            $bien = "La categoría se agregó correctamente.";
            header("Location: ../../vistas/foro/categorias.php?bien=$bien");
        }else{
            $error = "No se pudo registrar el curso. Error:". mysqli_error($conexion);
            header("Location: ../../vistas/foro/categorias.php?err=$error");
        }
}else{
    header("Location: ../../vistas/foro/categorias.php");
}

?>
