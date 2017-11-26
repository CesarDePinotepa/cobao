
<?php include '../conexion.php';
if (isset($_POST['resTxa']) && !empty($_POST['resTxa'])) {
    # code...
    $respuesta = $_POST['resTxa'];
    $id = $_POST['idHdn'];
    $idu = $_POST['iduHdn'];
    $fecha = date("Y-m-d");

    $agregar = "INSERT INTO `comentario_foro`(`id_comentario`, `id_tema`, `id_usuario`, `comentario`, `fecha`, `activo`) 
                VALUES (NULL,'$id','$idu','$respuesta','$fecha','1')";
    $ejecutar = $conexion->query($agregar);

    if ($ejecutar) {
        $consulta = "UPDATE `foro_temas` SET `hits` = (`hits` +'1') WHERE  `id_tema` ='$id'";
        $ejecutar2 = $conexion->query($consulta);
        $datos = $ejecutar2->fetch_assoc();

        $bien = "Se respondio correctamente.";
        header("Location: ../../vistas/foro/comentario-e.php?id=$id&bien=$bien");
    }else{
        $error = "No se pudo registrar el curso. Error:". mysqli_error($conexion);
        header("Location: ../../vistas/foro/comentario-e.php?id=$id&err=$error");
    }
}else{
    header("Location: ../../vistas/foro/comentario-e.php?id=$id");
}

?>
/