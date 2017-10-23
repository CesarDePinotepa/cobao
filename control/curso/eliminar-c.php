<?php
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = strip_tags($_GET['id']);
    if (ctype_digit($id)) {
        include '../conexion.php';

        $eliminar = "DELETE FROM `curso` WHERE `id` = '$id'";
        $ejecutar = $conexion->query($eliminar);

        if ($ejecutar) {
            $bien = "El curso de eliminó correctamente.";
            header("Location: ../../vistas/curso/listar-c.php?bien=$bien");
        }else{
            $error = "No se pudo eliminar el curso. Error: ". mysqli_error($conexion);
            header("Location: ../../vistas/curso/listar-c.php?err=$error");
        }
        $conexion->close();
    }else{
        header("Location: ../../vistas/curso/listar-c.php");
    }
}else{
    header("Location: ../../vistas/curso/listar-c.php");
}
?>