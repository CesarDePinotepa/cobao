<?php
if (isset($_GET['id']) && !empty($_GET['id'])) {
    include "../../control/conexion.php";

    $id = $_GET['id'];

    $traer_e = "SELECT * FROM `estudiante` WHERE `id` = '$id'";
    $ejecutar = $conexion->query($traer_e);
    $regs = $ejecutar->fetch_assoc();

    $n = $regs['nombre'];

    $no_control = $regs['num_control'];
    $pass = md5($no_control);
    $tipo = 2;
    $consultar = "SELECT * FROM `usuario` WHERE `idper` = '$id'";
    $ejecutar2 = $conexion->query($consultar);
    $num = $ejecutar2->num_rows;

    if ($num == 0 ){
        $insertar = "INSERT INTO `usuario`(`id`, `nombre`, `password`, `email`, `tipo`, `idper`) 
                     VALUES (null,'$no_control','$pass',null,'$tipo','$id')";
        $ejecutar3 = $conexion->query($insertar);

        if ($ejecutar3){
            header("Location: ../../vistas/estudiante/miuser.php?id=$id&n=$n");
        }else{
            $err = "Error: ".mysqli_error($conexion);
            header("Location: ../../vistas/estudiante/miuser.php?err=$err&n=$n");
        }
    }else{
        header("Location: ../../vistas/estudiante/miuser.php?id=$id&n=$n");
    }
}

?>