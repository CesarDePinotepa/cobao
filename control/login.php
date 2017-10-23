
<?php include 'conexion.php';
require_once '../librerias/Simple_sessions.php';
if (isset($_POST['usrTxt']) && !empty($_POST['usrTxt'])) {
    # code...
    $email = $_POST['usrTxt'];
    $pass = md5($_POST['pass']);
    $tipo = $_POST['tipo'];

    $comprobar = "SELECT  *  FROM `usuario` WHERE `email` = '$email' AND `password` = '$pass' AND `tipo` ='$tipo'";
    $ejecutar2 = $conexion->query($comprobar);
    $result = $ejecutar2->fetch_assoc();

    if ($ejecutar2) {
        $obj_ses = new Simple_sessions();
        $data = array('userid' => $result['id'],
            'nombre' => $result['nombre']);

        $obj_ses->add_sess($data);
        if ($tipo == 1){
            header('../menuDocente.php');
        }
        elseif ($tipo == 0){
            header('location: ../menuPrincipal.php');
        }
        else{
            header('');
        }

    }else {
        $error = "Los datos de ingreso son incorrectos";
        header("Location: ../index.php?err=$error");
    }

}else{
    header("Location: ../index.php");
}

?>
