<?php
require_once '../../librerias/Simple_sessions.php';
$obj_ses = new Simple_sessions();
if ($obj_ses->check_sess('userid')) {
    require_once '../../plantillas/header.php'; ?>

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Mis materias</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Semestre</th>
                            <th>Nueva actividad</th>
                            <th>Ver actividades</th>
                            <th>Calificaciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $idu = $obj_ses->get_value('userid');
                        include "../../control/conexion.php";
                        $traerp = "SELECT * FROM `usuario` WHERE `id` = '$idu'";
                        $ejecutar3 = $conexion->query($traerp);
                        $reg = $ejecutar3->fetch_assoc();
                        $idd= $reg['idper'];

                        $consulta = "SELECT * FROM `materias_de_docente` WHERE `docente_id` ='$idd'";
                        $ejecutar = $conexion->query($consulta);

                        $i = 0;
                        while ($datos = $ejecutar->fetch_assoc()) {
                            $idc = $datos['curso_id'];
                            echo "<tr>";
                            echo "<td>". number_format($i += 1) ."</td>";
                            $consulta2 = "SELECT * FROM `curso` WHERE `id` = '$idc'";
                            $ejecutar2 = $conexion->query($consulta2);
                            $regs = $ejecutar2->fetch_assoc();

                            echo "<td> <a href=''>". $regs['nombre']  ."</a></td>";
                            echo "<td>". $regs['grado']."</td>";
                            echo "<td><a href='../actividades/alta-d.php?idc=$idc&idd=$idd' <i class='fa fa-plus-circle fa-fw' aria-hidden='true'></i></a></td>";
                            echo "<td><a href='' <i class='fa fa-eye fa-fw' aria-hidden='true'></i></a></td>";
                            echo "<td><a href='' <i class='fa fa-edit fa-fw' aria-hidden='true'></i></a></td>";
                            echo "<tr>";
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
