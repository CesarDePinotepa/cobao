
<?php include '../conexion.php';
if (isset($_POST['nomTxt']) && !empty($_POST['nomTxt'])) {
    # code...
    $nombre = $_POST['nomTxt'];
    $apaterno = $_POST['apaTxt'];
    $amaterno = $_POST['amaTxt'];
    $curp = $_POST['curpTxt'];
    $grado = $_POST['graSel'];
    $escuela = $_POST['escTxt'];
    $email = $_POST['email'];
    $fecha_nac = $_POST['date'];

    $traer  = "SELECT MAX(`id`) AS id FROM estudiante";
    $ejecutar3 = $conexion->query($traer);
    $datos = $ejecutar3->fetch_assoc();

    $contador  = 7000 + $datos['id'];

    $agno = date("Y");

    $num_control = $agno.$contador;

    $consultar_usuario = "SELECT `curp` FROM `estudiante` WHERE `curp` = '$curp'";
    $ejecutar = $conexion->query($consultar_usuario);
    $numDatos = $ejecutar->num_rows;

    if ($numDatos == 0) {
        $agregar = "INSERT INTO `estudiante`(`id`, `nombre`, `apaterno`, `amaterno`, `curp`, `grado`, `num_control`, `escuela_proce`, `email`, `fecha_nac`, `estado`) 
                    VALUES (NULL,'$nombre','$apaterno','$amaterno','$curp','$grado','$num_control','$escuela','$email','$fecha_nac','1')";
        $ejecutar2 = $conexion->query($agregar);

        if ($ejecutar2) {
            $bien = "El estudiante con CURP:<b>$curp</b>, se registró correctamente.";
            header("Location: ../../vistas/estudiante/alta-e.php?bien=$bien");
        }else{
            $error = "No se pudo registrar el estudiante. Error: ".mysqli_error($conexion);
            header("Location: ../../vistas/estudiante/alta-e.php?err=$error");
        }
    }else{
        $error = "El estudiante con la CURP: <b>$curp</b>, ya está registrado.";
        header("Location: ../../vistas/estudiante/alta-e.php?err=$error");
    }
}else{
    header("Location: ../../vistas/estudiante/alta-e.php");
}

?>
