
<?php include '../conexion.php';
if (isset($_POST['titTxt']) && !empty($_POST['titTxt'])) {
    # code...
    $titulo = $_POST['titTxt'];
    $categoria = $_POST['perSel'];
    $decrip = $_POST['msjTxa'];

    $agregar = "INSERT INTO `foro_foro`(`id_foro`, `id_forocategoria`, `foro`, `descripcion`) 
                VALUES (NULL,'$categoria','$titulo','$decrip')";
    $ejecutar = $conexion->query($agregar);

    if ($ejecutar) {
        $bien = "El foro se agregó correctamente.";
        header("Location: ../../vistas/foro/nuevo-d.php?bien=$bien");
    }else{
        $error = "No se pudo registrar el curso. Error:". mysqli_error($conexion);
        header("Location: ../../vistas/foro/nuevo-d.php?err=$error");
    }
}else{
    header("Location: ../../vistas/foro/nuevo-d.php");
}

?>
