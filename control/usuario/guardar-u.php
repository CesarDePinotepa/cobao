
<?php include '../conexion.php';
if (isset($_POST['mail']) && !empty($_POST['mail'])) {
    # code...
    $nombre = $_POST['nomHdn'];
    $email = $_POST['mail'];
    $pass = md5($_POST['pass']);
    $tipo = $_POST['tipo'];
    $id = $_POST['perSel'];


    if (md5($_POST['pass2']) == $pass) {
        $agregar = "INSERT INTO `usuario`(`id`, `nombre`, `password`, `email`, `tipo`, `idper`) 
                    VALUES (NULL,'$nombre','$pass','$email','$tipo','$id')";
        $ejecutar2 = $conexion->query($agregar);

        if ($ejecutar2) {
            $bien = "El usuario se registró correctamente.";
            header("Location: ../../vistas/usuario/alta-u.php?bien=$bien");
        }else{
            $error = "No se pudo registrar el usuario. Error: ".mysqli_error($conexion);
            header("Location: ../../vistas/usuario/alta-u.php?err=$error");
        }
    }else{
        $error = "Las contraseñas no coinciden.";
        header("Location: ../../vistas/usuario/alta-u.php?err=$error");
    }
}else{
    header("Location: ../../vistas/usuario/alta-u.php");
}

?>
