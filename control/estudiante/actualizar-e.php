
<?php include '../conexion.php';
if (isset($_POST['nomTxt']) && !empty($_POST['nomTxt'])) {
    # code...
    $id = $_POST['idHdn'];
    $nombre = $_POST['nomTxt'];
    $apaterno = $_POST['apaTxt'];
    $amaterno = $_POST['amaTxt'];
    $curp = $_POST['curpTxt'];
    $grado = $_POST['graSel'];
    $escuela = $_POST['escTxt'];
    $email = $_POST['email'];
    $fecha_nac = $_POST['date'];

/*
    $consultar_usuario = "SELECT `curp` FROM `estudiante` WHERE `curp` = '$curp'";
    $ejecutar = $conexion->query($consultar_usuario);
    $numDatos = $ejecutar->num_rows;

    if ($numDatos == 0) {*/
        $agregar = "UPDATE `estudiante` SET `nombre`='$nombre',`apaterno`='$apaterno',`amaterno`='$amaterno',`curp`='$curp',`grado`='$grado',`escuela_proce`='$escuela',`email`='$email',`fecha_nac`='$fecha_nac' WHERE `id` ='$id'";
        $ejecutar2 = $conexion->query($agregar);

        if ($ejecutar2) {
            $bien = "El estudiante con CURP:<b>$curp</b>, se actualizó correctamente.";
            header("Location: ../../vistas/estudiante/editar-e.php?bien=$bien");
        }else{
            $error = "No se pudo registrar el estudiante. Error: ".mysqli_error($conexion);
            header("Location: ../../vistas/estudiante/editar-e.php?err=$error");
        }
   /* }else{
        $error = "El estudiante con la CURP: <b>$curp</b>, ya está registrado.";
        header("Location: ../../vistas/estudiante/alta-e.php?err=$error");
    }*/
}else{
    header("Location: ../../vistas/estudiante/editar-e.php");
}

?>
