<?php
include "../conexion.php";

$idc = $_POST['idcHdn'];
$ida = $_POST['idaHdn'];
$ide = $_POST['ideHdn'];

$nombre = $_FILES['arch']['name'];
$tipo_archivo = $_FILES['arch']['type'];
$tamano_archivo = $_FILES['arch']['size'];
$ruta = "../../archivos/";
$ruta_del_archivo = $ruta.$_FILES['arch']['name'];
$nombre_archivo=$_FILES['arch']['name'];

if ($nombre!='') {
    if (!((strpos($tipo_archivo, "pdf")) && ($tamano_archivo < 1000000))) {
        $err = "La extensión del archivo no está soportada.";
        header("Location: ../../vistas/estudiante/misactividades.php?id=$ide&idc=$idc&err=$err");

    } else {
        if (move_uploaded_file($_FILES['arch']['tmp_name'], $ruta_del_archivo)) {
            $insertar = "INSERT INTO `calificacion`(`id`, `actividad_id`, `materia_id`, `estu_id`, `calificacion`, `ruta`) 
                         VALUES (NULL,'$ida','$idc','$ide',NULL,'$ruta_del_archivo')";
            $ejecutar = $conexion->query($insertar);

            if ($ejecutar) {

                $update = "UPDATE `actividades` SET `estado`='1' WHERE `id` = '$ida'";
                $ejecutar2 = $conexion->query($update);

                $bien = "La actividad se subió correctamente";
                header("Location: ../../vistas/estudiante/misactividades.php?id=$ide&idc=$idc&bien=$bien");

            } else {
                $err = "No se pudo realziar la operación" . mysqli_error($conexion);
                header("Location: ../../vistas/estudiante/misactividades.php?id=$ide&idc=$idc&err=$err");
            }

        } else {
            $err = "No se pudo realziar la operación";
            header("Location: ../../vistas/estudiante/misactividades.php?id=$ide&idc=$idc&err=$err");
        }
    }

}
?>