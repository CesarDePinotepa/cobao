
<?php include '../conexion.php';
if (isset($_POST['mail']) && !empty($_POST['mail'])) {
    # code...
    //$nombre = $_POST['nomHdn'];
    $email = $_POST['mail'];
    $pass = md5($_POST['pass']);
    $tipo = $_POST['tipo'];


    if (md5($_POST['pass2']) == $pass) {
        $agregar = "UPDATE `usuario` SET `password`='$pass',`tipo`='$tipo' WHERE `email` ='$email'";
        $ejecutar2 = $conexion->query($agregar);

        if ($ejecutar2) {
            $bien = "El usuario se actualizó correctamente.";
            header("Location: ../../vistas/usuario/editar-u.php?bien=$bien");
        }else{
            $error = "No se pudo actualizar el usuario. Error: ".mysqli_error($conexion);
            header("Location: ../../vistas/usuario/editar-u.php?err=$error");
        }
    }else{
        $error = "Las contraseñas no coinciden.";
        header("Location: ../../vistas/usuario/editar-u.php?err=$error");
    }
}else{
    header("Location: ../../vistas/usuario/editar-u.php");
}

?>
