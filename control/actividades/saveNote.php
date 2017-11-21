
<?php include '../conexion.php';
if (isset($_POST['comArea']) && !empty($_POST['comArea'])) {
    # code...
    $comen = $_POST['comArea'];
    $calif = $_POST['calNum'];
    $idm = $_POST['idmHdn'];
    $ide = $_POST['ideHdn'];
    $ida = $_POST['idaHdn'];


      $agregar = "UPDATE `calificacion` SET `calificacion`='$calif'
                    WHERE `actividad_id` = '$ida' AND `materia_id` = '$idm' AND `estu_id` = '$ide'";
      $ejecutar = $conexion->query($agregar);

        if ($ejecutar) {
            $selecidcal = "SELECT `id`  FROM `calificacion` WHERE `actividad_id` = '$ida' AND `materia_id` ='$idm' AND `estu_id` = 'ide'";
            $ejecutar2 = $conexion->query($selecidcal);
            $dato = $ejecutar2->fetch_assoc();
            $id = $dato['id'];

            $actualizar = "UPDATE `actividades` SET `descripcion`='$comen',`calificacion_id`= '$ida' WHERE `id` = '$ida'";
            $ejecutar3 = $conexion->query($actualizar);
            if ($ejecutar3) {
                $bien = "El curso con clave:<b>$clave</b>, se registró correctamente.";
                header("Location: ../../vistas/actividades/alta-calf.php?ide=$ide&ida=$ida&idm=$idm&bien=$bien");
            }else{
                $error = "No se pudo registrar el curso. Error:". mysqli_error($conexion);
                header("Location: ../../vistas/actividades/alta-calf.php?ide=$ide&ida=$ida&idm=$idm&err=$error");
            }
        }else{
            $error = "No se pudo registrar el curso. Error:". mysqli_error($conexion);
            header("Location: ../../vistas/actividades/alta-calf.php?ide=$ide&ida=$ida&idm=$idm&err=$error");
        }

}else{
    header("Location: ../../vistas/actividades/alta-calf.php");
}

?>
