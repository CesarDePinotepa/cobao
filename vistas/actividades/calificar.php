<?php
require_once '../../librerias/Simple_sessions.php';
$obj_ses = new Simple_sessions();
if ($obj_ses->check_sess('userid')) {
require_once '../../plantillas/header.php';
include "../../control/conexion.php";
$ida = $_GET['ida'];
$sem = $_GET['s'];
?>

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Seleccione un estudiante <b></b> </h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Estudiante</th>
                            <th>Calificar</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $i = 0;
                        $consulta = "SELECT * FROM `estudiante` WHERE `grado` = '$sem'";
                        $ejecutar = $conexion->query($consulta);

                        while ($datos = $ejecutar->fetch_assoc()) {
                            $ide = $datos['id'];
                            echo "<tr>";
                            echo "<td>". number_format($i += 1) ."</td>";
                            echo "<td>". $datos['nombre'] ."</td>";

                            $traer = "SELECT * FROM `calificacion` WHERE `actividad_id` = '$ida' AND `estu_id` ='$ide'";
                            $ejecutar2 = $conexion->query($traer);
                            $regs  = $ejecutar->fetch_assoc();

                            if (empty($regs['estu_id'])) {
                                echo "<td><a href='' <i class='fa fa-edit fa-fw' aria-hidden='true'></i></a></td>";
                            }else{

                            }

                        }
                        $conexion->close();
                        ?>

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
        <?php require_once '../../plantillas/footer.php';
        }
        else{
            header("Location: ../../index.php");
        }
        ?>
