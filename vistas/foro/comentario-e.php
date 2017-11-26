<?php
require_once '../../librerias/Simple_sessions.php';
$obj_ses = new Simple_sessions();
if ($obj_ses->check_sess('userid')) {
    include "../../control/conexion.php";
    $idu = $obj_ses->get_value('userid');
    $id = $_GET['id'];

    ?>
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Plataforma Educativa - COBAO Plantel 48</title>

        <!-- Bootstrap Core CSS -->
        <link href="../../css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="../../css/metisMenu.min.css" rel="stylesheet">

        <!-- Timeline CSS -->
        <link href="../../css/timeline.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="../../css/startmin.css" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="../../css/morris.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="../../css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <a class="navbar-brand" href="#"><img src="../../img/cobaojj.png" style="height: 33px"></a>
            </div>
            <div class="navbar-header">
                <a href="" class="navbar-brand">Plataforma Educativa - COBAO Plantel 48</a>
            </div>
            <!-- Top Navigation: Left Menu -->

            <!-- Top Navigation: Right Menu -->
            <ul class="nav navbar-right navbar-top-links">
                <li><a href="#"><i class="fa fa-user fa-fw"></i>Módulo estudiante: <?php echo $obj_ses->get_value('nombre')?></a>

                </li>
                <li><a href="../../control/cerrarSesion.php"><i class="fa fa-sign-out fa-fw"></i> Salir</a>

                </li>
            </ul>

            <!-- Sidebar -->
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">

                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="../../menuEstudiante.php" class="active"><i class="fa fa-tablet fa-fw"></i>Inicio</a>
                        </li>
                        <li>
                            <a href="mismaterias.php" class="active"><i class="fa fa-file-word-o fa-fw"></i>Mis materias</a>
                        </li>
                        <li>
                            <a href="miscalificaciones.php" class="active"><i class="fa fa-sticky-note fa-fw"></i>Mis calificaciones</a>
                        </li>

                        <li>
                            <a href="#" class="active"><i class="fa fa-dashboard fa-fw"></i>Foro</a>
                        </li>
                        <li>
                            <a href="#" class="active"><i class="fa fa-arrows-h fa-fw"></i>Cambiar contraseña</a>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>

        <!-- Page Content -->


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

    </div>

    <!-- jQuery -->
    <script src="../../js/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../../js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../../js/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../../js/startmin.js"></script>

    </body>
    </html>

    <?php
}else{
    header("Location: ../index.php");
} ?>
