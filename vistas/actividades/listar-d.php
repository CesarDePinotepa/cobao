<?php
require_once '../../librerias/Simple_sessions.php';
$obj_ses = new Simple_sessions();
if ($obj_ses->check_sess('userid')) {
require_once '../../plantillas/header.php';
include "../../control/conexion.php";
$idd = $_GET['idd'];
$idc = $_GET['idc'];

$consultac = "SELECT * FROM `curso` WHERE `id` = '$idc'";
$ejecutar2 = $conexion->query($consultac);
$reg = $ejecutar2->fetch_assoc();
$sem = $reg['grado'];
?>

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Actividades de la materia: <b><?php echo $reg['nombre'] ?></b> </h2>
            </div>
        </div>
        <?php
        ?>
        <div class="row">
            <div class="col-lg-8">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Fecha de entrega</th>
                            <th>Calificar</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php

                        $consulta = "SELECT * FROM `actividades` WHERE `materia_id` = '$idc' AND `docente_id` = '$idd'";
                        $ejecutar = $conexion->query($consulta);

                        $i = 0;
                        while ($datos = $ejecutar->fetch_assoc()) {
                            $ida = $datos['id'];
                            echo "<tr>";
                            echo "<td>". number_format($i += 1) ."</td>";

                            echo "<td> <a href='".$datos['ruta']."' target='_blank'>". $datos['nombre']  ."</a></td>";
                            echo "<td>". $datos['fechaFin']."</td>";
                            echo "<td><a href='calificar.php?ida=$ida&s=$sem&idm=$idc' <i class='fa fa-edit fa-fw' aria-hidden='true'></i></a></td>";
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
