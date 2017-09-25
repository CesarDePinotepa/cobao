<?php
ini_set ('error_reporting', E_ALL & ~E_NOTICE);
include '../../control/conexion.php';

$selec = "SELECT * FROM `docentes`";
$ejecutar = $conexion->query($selec);
$numDatos = $ejecutar->num_rows;


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
            <a class="navbar-brand" href="#">Logo</a>
        </div>
        <div class="navbar-header">
            <a href="" class="navbar-brand">Plataforma Educativa - COBAO Plantel 48</a>
        </div>
        <!-- Top Navigation: Left Menu -->

        <!-- Top Navigation: Right Menu -->
        <ul class="nav navbar-right navbar-top-links">
            <li><a href="#"><i class="fa fa-user fa-fw"></i>Módulo Administrador</a>

            </li>
            <li><a href="#"><i class="fa fa-sign-out fa-fw"></i> Salir</a>

            </li>
        </ul>

        <!-- Sidebar -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">

                <ul class="nav" id="side-menu">
                    <li>
                        <a href="../../index.php" class="active"><i class="fa fa-tablet fa-fw"></i>Inicio</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-users fa-fw"></i> Docentes<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="listar.php">Listar</a>
                            </li>
                            <li>
                                <a href="alta.php">Alta</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-calendar fa-fw"></i>Cursos<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="#">Listar</a>
                            </li>
                            <li>
                                <a href="#">Alta</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="active"><i class="fa fa-user fa-fw"></i>Estudiantes</a>
                    </li>
                    <li>
                        <a href="#" class="active"><i class="fa fa-file-excel-o fa-fw"></i>Evaluaciones</a>
                    </li>
                    <li>
                        <a href="#" class="active"><i class="fa fa-file-text fa-fw"></i>Cuestionarios</a>
                    </li>
                    <li>
                        <a href="#" class="active"><i class="fa fa-dashboard fa-fw"></i>Foro</a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Lista de Docentes</h1>
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
                                <th>Nombre</th>
                                <th>RFC</th>
                                <th>Teléfono</th>
                                <th>Área</th>
                                <th>Eliminar</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 0;
                            while ($datos = $ejecutar->fetch_assoc()) {
                                $id = $datos['id'];
                                echo "<tr>";
                                echo "<td>". $i += 1 ."</td>";
                                echo "<td> <a href=''>". $datos['nombre'] ."</a></td>";
                                echo "<td>". $datos['apaterno']." ".$datos['amaterno'] ."</td>";
                                echo "<td>". $datos['rfc'] ."</td>";
                                echo "<td>". $datos['telefono'] ."</td>";
                                echo "<td>". $datos['area'] ."</td>";
                                echo "<td><a href='' onclick='return confirm(\"¿Eliminar?\");' <i class='fa fa-trash-o fa-fw' aria-hidden='true'></i></a></td>";
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

