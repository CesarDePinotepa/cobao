
<?php include '../conexion.php';
if (isset($_POST['idHdn']) && !empty($_POST['idHdn'])) {
    # code...
    $id = $_POST['idHdn'];
    $nombre = $_POST['nomTxt'];
    $apaterno = $_POST['apaTxt'];
    $amaterno = $_POST['amaTxt'];
    $rfc = $_POST['rfcTxt'];
    $curp = $_POST['curpTxt'];
    $dir = $_POST['dirTxt'];
    $tel = $_POST['telTxt'];
    $area = $_POST['areaTxt'];
    $email = $_POST['emaEma'];

    /*$consultar_usuario = "SELECT `rfc` FROM `docentes` WHERE `rfc` = '$rfc'";
    $ejecutar = $conexion->query($consultar_usuario);
    $numDatos = $ejecutar->num_rows;

    if ($numDatos == 0) {*/
        $agregar = "UPDATE `docentes` SET `nombre`='$nombre',`apaterno`='$apaterno',`amaterno`='$amaterno',`direccion`='$direccion',`telefono`='$tel',`rfc`='$rfc',`area`='$area',`curp`='$curp',`email`='$email' WHERE `id` ='$id'";
        $ejecutar2 = $conexion->query($agregar);

        if ($ejecutar2) {
            $bien = "Los datos del docente se actualizaron correctamente.";
            header("Location: ../../vistas/docentes/editar-d.php?bien=$bien");
        }else{
            $error = "No se pudo realizar la operación.";
            header("Location: ../../vistas/docentes/editar-d.php?err=$error");
        }
    /*}else{
        $error = "El docente con RFC: <b>$rfc</b>, ya está registrado.";
        header("Location: ../../vistas/docentes/alta.php?err=$error");
    }*/
}else{
    header("Location: ../../vistas/docentes/editar-d.php");
}

?>
