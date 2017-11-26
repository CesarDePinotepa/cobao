<?php
require_once '../../librerias/Simple_sessions.php';
$obj_ses = new Simple_sessions();
if ($obj_ses->check_sess('userid')) {
    include "../../control/conexion.php";
    $idu = $obj_ses->get_value('userid');
    $consulta = "SELECT  `idper` FROM `usuario` WHERE `id` = '$idu'";
    $ejecutar = $conexion->query($consulta);
    $idreg = $ejecutar->fetch_assoc();
    $ide = $idreg['idper'];

    $consulta2 = "SELECT * FROM `estudiante` WHERE `id` = '$ide'";
    $ejecutar2 = $conexion->query($consulta2);
    $datos = $ejecutar2->fetch_assoc();
    $grado = $datos['grado'];
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
                <li><a href="#"><i class="fa fa-user fa-fw"></i>Módulo Administrador: <?php echo $obj_ses->get_value('nombre')?></a>

                </li>
                <li><a href="../../control/cerrarSesion.php"><i class="fa fa-sign-out fa-fw"></i> Salir</a>

                </li>
            </ul>

            <!-- Sidebar -->
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">

                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="../../menuPrincipal.php" class="active"><i class="fa fa-tablet fa-fw"></i>Inicio</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-user-plus fa-fw"></i> Docentes<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="../docentes/listar.php">Listar</a>
                                </li>
                                <li>
                                    <a href="../docentes/alta.php">Alta</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-calendar fa-fw"></i>Cursos<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="listar-c.php">Listar</a>
                                </li>
                                <li>
                                    <a href="alta-c.php">Alta</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="active"><i class="fa fa-users fa-fw"></i>Estudiantes <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="../estudiante/listar-e.php">Listar</a>
                                </li>
                                <li>
                                    <a href="../estudiante/alta-e.php">Alta</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="active"><i class="fa fa-bookmark fa-fw"></i>Grupos <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="../grupos/listar-a.php">Listar</a>
                                </li>
                                <li>
                                    <a href="../grupos/alta-a.php">Alta</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="../grupos/asignar.php" class="active"><i class="fa fa-repeat fa-fw"></i>Asignar materias</a>
                        </li><!--
                    <li>
                        <a href="#" class="active"><i class="fa fa-file-text fa-fw"></i>Cuestionarios</a>
                    </li>-->
                        <li>
                            <a href="#" class="active"><i class="fa fa-dashboard fa-fw"></i>Foro</a>
                        </li>
                        <li>
                            <a href="#" class="active"><i class="fa fa-user fa-fw"></i>Usuarios <span
                                        class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="../usuario/listar-u.php">Listar</a>
                                </li>
                                <li>
                                    <a href="../usuario/alta-u.php">Alta</a>
                                </li>
                            </ul>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>

        <!-- Page Content -->


        <div id="page-wrapper">
            <div class="container-fluid">
                <?php
                $comprobar = "SELECT * FROM `foro_foro` WHERE `foro` = '$grado'";
                $ejecutar3 = $conexion->query($comprobar);
                ?>
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="page-header">Temas del foro</h2>
                    </div>

                </div>

                <!-- ... Your content goes here ... -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <a href="categorias.php">Categorías</a>
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
                                        echo "<td>". $regs['tema'] ."</td>";
                                        echo "<td>". $regs['tema']."</td>";
                                        echo "<td><a href='../../control/grupo/inscribir.php?id=$id&n=$n' onclick='return confirm(\"¿Inscribirse?\");' <i class='fa fa-edit fa-fw' aria-hidden='true'></i></a></td>";
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
