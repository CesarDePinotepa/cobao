
<?php include '../conexion.php';
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $grupo = $_GET['n'];


    $agregar = "UPDATE `estudiante` SET `grupo`='$grupo',`estado`='1' WHERE `id` = '$id'";
    $ejecutar2 = $conexion->query($agregar);

    if ($ejecutar2) {
        $actualizar = "";

        $bien = "Te inscribiste correctamente al grupo <b>$grupo</b>.";
        header("Location: ../../vistas/estudiante/mismaterias.php?bien=$bien");
    }else {
        $error = "No te pudiste inscribir. Error:" . mysqli_error($conexion);
        header("Location: ../../vistas/estudiante/mismaterias.php?err=$error");
    }
}
?>

