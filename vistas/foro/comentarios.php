<?php
require_once '../../librerias/Simple_sessions.php';
$obj_ses = new Simple_sessions();
if ($obj_ses->check_sess('userid')) {
    require_once '../../plantillas/header.php';
    include "../../control/conexion.php";
    $id = $_GET['id'];
    ?>

    <div id="page-wrapper">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-6">
                    <h2 class="page-header">Temas del foro</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <a href="respuesta.php?id=<?php echo $id ?>" class="btn btn-success">Responder</a>
                </div>
            </div>

            <!-- ... Your content goes here ... -->
            <div class="row">
                <div class="col-lg-12">
                    <?php include "../../control/mensajes.php"; ?>
                    <div class="table-responsive">
                        <table class="table">
                            <?php
                            $consulta = "SELECT * FROM `foro_temas` WHERE `id_foro` = '$id'";
                            $ejecutar = $conexion->query($consulta);

                            while ($datos = $ejecutar->fetch_assoc()) {
                                $idu = $datos['id_usuario'];
                                $consulta2 = "SELECT `nombre` FROM `docentes` WHERE `id` = '$idu'";
                                $ejecutar2 = $conexion->query($consulta2);
                                $datos2 = $ejecutar2->fetch_assoc();

                             echo "<thead>
                            <tr>
                                <th>".$datos2['nombre']." | ".$datos['fecha'] . "</th>
           
                            </tr>
                            </thead>";
                                echo "<tr>";
                                echo "<td><b>". $datos['titulo'] ."</b><br>". $datos['contenido']." </td>";
                                echo "</tr>";
                                echo "<hr>";

                            }

                            ?>

                            </tbody>
                        </table>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <?php
                            $consulta3 = "SELECT * FROM `comentario_foro` WHERE `id_tema` = '$id'";
                            $ejecutar3 = $conexion->query($consulta3);

                            while ($regs2 = $ejecutar3->fetch_assoc()) {
                                $idt = $regs2['id_tema'];
                                $iduser = $regs2['id_usuario'];

                                $consulta4 = "SELECT `idper` FROM `usuario` WHERE `id` = '$iduser'";
                                $ejecutar4 = $conexion->query($consulta4);
                                $datos4 = $ejecutar4->fetch_assoc();
                                $idp  = $datos4['idper'];

                                $consulta5 = "SELECT `nombre` FROM `docentes` WHERE `id` = '$idp'";
                                $ejecutar5 = $conexion->query($consulta5);
                                $datos5 = $ejecutar5->fetch_assoc();

                                echo "<thead>
                                        <tr>
                                            <th>".$datos5['nombre']." | ".$regs2['fecha'] . "</th>
           
                                        </tr>
                                     </thead>";
                                echo "<tr>";
                                echo "<td>".  $regs2['comentario']." </td>";
                                echo "</tr>";
                                echo "<hr>";
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

