
<?php include 'conexion.php';
require_once '../librerias/Simple_sessions.php';
if (isset($_POST['usrTxt']) && !empty($_POST['usrTxt'])) {
    # code...
    $email = $_POST['usrTxt'];
    $pass = md5($_POST['pass']);

    $comprobar = "SELECT  *  FROM `usuario` WHERE (`email` = '$email' AND `password` = '$pass') OR `nombre` = '$email' AND `password` = '$pass' ";
    $ejecutar2 = $conexion->query($comprobar);
    $result = $ejecutar2->fetch_assoc();
    $num = $ejecutar2->num_rows;
    if ($num > 0) {
        $obj_ses = new Simple_sessions();
        $data = array('userid' => $result['id'],
            'nombre' => $result['nombre']);

        $obj_ses->add_sess($data);
        if ($result['tipo'] == 1){
            header('Location: ../menuDocente.php');
        }
        elseif ($result['tipo'] == 0){
            header('Location: ../menuPrincipal.php');
        }
        else{
            header('Location: ../menuEstudiante.php');
        }

    }else {
        $error = "Los datos de ingreso son incorrectos";
        header("Location: ../index.php?err=$error");
    }

}else{
    header("Location: ../index.php");
}

?>
