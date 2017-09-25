
<?php include '../conexion.php';
if (isset($_POST['nomTxt']) && !empty($_POST['nomTxt'])) {
    # code...
    $nombre = $_POST['nomTxt'];
    $apaterno = $_POST['apaTxt'];
    $amaterno = $_POST['amaTxt'];
    $rfc = $_POST['rfcTxt'];
    $curp = $_POST['curpTxt'];
    $dir = $_POST['dirTxt'];
    $tel = $_POST['telTxt'];
    $area = $_POST['areaTxt'];
    $email = $_POST['emaEma'];

    $consultar_usuario = "SELECT `rfc` FROM `docentes` WHERE `rfc` = '$rfc'";
    $ejecutar = $conexion->query($consultar_usuario);
    $numDatos = $ejecutar->num_rows;

    if ($numDatos == 0) {
        $agregar = "INSERT INTO `docentes`(`id`, `nombre`, `apaterno`, `amaterno`, `direccion`, `telefono`, `rfc`, `area`, `curp`, `email`) 
                    VALUES (NULL,'$nombre','$apaterno','$amaterno','$dir','$tel','$rfc','$area','$curp','$email')";
        $ejecutar2 = $conexion->query($agregar);

        if ($ejecutar2) {
            $bien = "El docente con RFC:<b>$rfc</b>, se registró correctamente.";
            header("Location: ../../vistas/docentes/alta.php?bien=$bien");
        }else{
            $error = "No se pudo realizar la operación.";
            header("Location: ../../vistas/docentes/alta.php?err=$error");
        }
    }else{
        $error = "El docente con RFC: <b>$rfc</b>, ya está registrado.";
        header("Location: ../../vistas/docentes/alta.php?err=$error");
    }
}else{
    header("Location: ../../vistas/docentes/alta.php");
}

?>
