
<?php include '../conexion.php';
if (isset($_POST['docSel']) && !empty($_POST['docSel'])) {
    $docente_id = $_POST['docSel'];

    $curso_id = $_POST['curChe'];
    for ($i=0;$i < count($curso_id);$i++){
       $agregar = "INSERT INTO `materias_de_docente`(`id`, `curso_id`, `docente_id`,`estu_id`) 
                    VALUES (NULL,'$curso_id[$i]','$docente_id',NULL )";
        $ejecutar2 = $conexion->query($agregar);

        $actualizar = "UPDATE `curso` SET `descripcion`= `descripcion` +1 WHERE  `id` = '$curso_id[$i]'";
        $ejecutar  = $conexion->query($actualizar);
    }

    if ($ejecutar2) {
        $bien = "Las materias se asignaron correctamente.";
        header("Location: ../../vistas/grupos/asignar.php?bien=$bien");
    }else {
        $error = "No se pudo registrar el curso. Error:" . mysqli_error($conexion);
        header("Location: ../../vistas/grupos/asignar.php?err=$error");
    }
}
?>

