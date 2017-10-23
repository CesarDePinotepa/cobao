<?php
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = strip_tags($_GET['id']);
    if (ctype_digit($id)) {
        include '../conexion.php';

        $eliminar = "DELETE FROM `docentes` WHERE `id` = '$id'";
        $ejecutar = $conexion->query($eliminar);

        if ($ejecutar) {
            $bien = "El docente se inhabilitó correctamente.";
            header("Location: ../../vistas/docentes/listar.php?bien=$bien");
        }else{
            $error = "No se pudo eliminar el personal. Error: ". mysqli_error($conexion);
            header("Location: ../../vistas/docentes/listar.php?err=$error");
        }
        $conexion->close();
    }else{
        header("Location: ../../vistas/docentes/listar.php");
    }
}else{
    header("Location: ../../vistas/docentes/listar.php");
}
?>