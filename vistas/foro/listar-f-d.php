<?php
require_once '../../librerias/Simple_sessions.php';
$obj_ses = new Simple_sessions();
if ($obj_ses->check_sess('userid')) {
    require_once '../../plantillas/header.php';?>

    <div id="page-wrapper">
        <div class="container-fluid">
            <?php
            include "../../control/conexion.php";
            $comprobar = "SELECT * FROM `foro_foro`";
            $ejecutar3 = $conexion->query($comprobar);
            ?>
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Temas del foro</h2>
                </div>

            </div>
            <div class="row">
                <div class="col-lg-12">
                    <a href="nuevo-d.php">Nuevo Foro</a>
                </div>

            </div>

            <!-- ... Your content goes here ... -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Tema</th>
                                <th>Último mensaje</th>
                                <th>Respuestas</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $i = 0;
                            while ($regs = $ejecutar3->fetch_assoc()) {
                                $id = $regs['id_foro'];
                                echo "<tr>";
                                echo "<td>". number_format( $i += 1) ."</td>";
                                echo "<td><a href='comentarios.php?id=$id'>". $regs['foro'] ."</a></td>";

                                $consulta1 = "SELECT * FROM `foro_temas` WHERE `id_foro` ='$id'";
                                $ejecutar2 = $conexion->query($consulta1);
                                $datos1 = $ejecutar2->fetch_assoc();

                                if (empty($datos1['contenido'])){
                                    echo "<td>No hay respuestas</td>";
                                    echo "<td>0</td>";
                                }else {
                                    echo "<td>" . $datos1['contenido'] . "</td>";
                                    echo "<td>" . $datos1['hits'] . "</td>";
                                }

                                echo "<tr>";
                            }

                            $conexion->close();
                            ?>

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>




    <?php require_once '../../plantillas/footer.php';
}
else{
    header("Location: ../../index.php");
}
?>

