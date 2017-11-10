<?php
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = strip_tags($_GET['id']);
    if (ctype_digit($id)) {
        include '../conexion.php';

        $eliminar = "DELETE FROM `grupo` WHERE `id` = '$id'";
        $ejecutar = $conexion->query($eliminar);

        if ($ejecutar) {
            $bien = "El grupo de eliminó correctamente.";
            header("Location: ../../vistas/grupos/listar-a.php?bien=$bien");
        }else{
            $error = "No se pudo eliminar el grupo. Error: ". mysqli_error($conexion);
            header("Location: ../../vistas/grupos/listar-a.php?err=$error");
        }
        $conexion->close();
    }else{
        header("Location: ../../vistas/grupos/listar-a.php");
    }
}else{
    header("Location: ../../vistas/grupos/listar-a.php");
}
?>