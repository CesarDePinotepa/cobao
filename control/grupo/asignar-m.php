
<?php include '../conexion.php';
if (isset($_POST['docSel']) && !empty($_POST['docSel'])) {
    $docente_id = $_POST['docSel'];

    $curso_id = $_POST['curChe'];
    for ($i=0;$i < count($curso_id);$i++){
       $agregar = "INSERT INTO `materias_de_docente`(`id`, `curso_id`, `docente_id`) 
                    VALUES (NULL,'$curso_id[$i]','$docente_id')";
        $ejecutar2 = $conexion->query($agregar);
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

