<?php
require_once '../../librerias/Simple_sessions.php';
$obj_ses = new Simple_sessions();
if ($obj_ses->check_sess('userid')) {
    include "../../control/conexion.php";
    $ide = $_GET['id'];
    $idc = $_GET['idc'];

//$consulta = "SELECT * FROM `actividades` WHERE `estu_id` ='$ide' AND`materia_id` = '$idc'";
    $consulta = "SELECT * FROM `actividades` WHERE `materia_id` = '$idc'";
    $ejecutar = $conexion->query($consulta);
    $num = $ejecutar->num_rows;
    //$reg = $ejecutar->fetch_assoc();

    $consultam = "SELECT * FROM `curso` WHERE `id` = '$idc'";
    $ejecutar2 = $conexion->query($consultam);
    $regs = $ejecutar2->fetch_assoc();

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
                            <a href="menuEstudiante.php" class="active"><i class="fa fa-tablet fa-fw"></i>Inicio</a>
                        </li>
                        <li>
                            <a href="mismaterias.php" class="active"><i class="fa fa-file-word-o fa-fw"></i>Mis materias</a>
                        </li>
                        <li>
                            <a href="miscalificaciones.php" class="active"><i class="fa fa-sticky-note fa-fw"></i>Mis calificaciones</a>
                        </li>

                        <li>
                            <a href="../foro/listar-f-e.php" class="active"><i class="fa fa-dashboard fa-fw"></i>Foro</a>
                        </li>
                        <li>
                            <a href="cambiarContra.php" class="active"><i class="fa fa-arrows-h fa-fw"></i>Cambiar contraseña</a>
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
                             <?php
                             $consulta3 = "SELECT * FROM `actividades` WHERE `materia_id` = '$idc'";
                             $ejecutar3 = $conexion->query($consulta3);
                             $reg = $ejecutar3->fetch_assoc();
                                if ($num == 0){
                                    echo "<h2 class='page-header'>No hay actividades asignadas</h2>";
                                }else {
                                    echo "<h2 class='page-header'>Actividades de la materia: <b>".$regs['nombre']."</b></h2>";
                                }?>
                        </div>
                        <?php include '../../control/mensajes.php' ?>
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
                                        <th>Fecha Limite</th>
                                        <?php
                                        if ($reg['estado'] == 0){

                                            echo "<th>Subir Archivo</th>
                                            <th></th>";
                                        }else{
                                            echo "<th>Comentarios</th>
                                                  <th>Calificación</th>";
                                        }
                                        ?>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php

                                    $i = 0;
                                    while ($datos = $ejecutar->fetch_assoc()) {
                                        $ida = $datos['id'];
                                        echo "<tr>";
                                        echo "<td>". number_format( $i += 1) ."</td>";
                                        echo "<td> <a href='".$datos['ruta']."' target='_blank'>". $datos['nombre']  ."</a></td>";
                                        echo "<td>". $datos['fechaFin']."</td>";
                                        $fechaActual = strtotime(date("Y-m-d"));
                                        $fechaEntrada = strtotime($reg['fechaFin']);
                                        $quitar = ($fechaActual > $fechaEntrada) ? "Ya paso" : "Aun disponible";

                                        if ($reg['estado'] == 0 ){
                                            if ($fechaActual > $fechaEntrada){
                                                echo "<td>La fecha de entrega ya pasó.</td>";
                                            }else {
                                                echo "<form action='../../control/actividades/guardarXes.php' method='post' class='form-horizontal' enctype='multipart/form-data'>";
                                                echo "<td><input type='file' name='arch' value='Subir'> </td>";
                                                echo "<td><button class='btn btn-success'>Guardar</button> </td>";
                                                echo "<input type='hidden' name='idaHdn' value='$ida'>";
                                                echo "<input type='hidden' name='idcHdn' value='$idc'>";
                                                echo "<input type='hidden' name='ideHdn' value='$ide'>";
                                                echo "</form>";
                                            }
                                        }else {
                                            $traerc = "SELECT `calificacion` FROM `calificacion` 
                                                       WHERE `actividad_id`= '$ida' AND `estu_id` = '$ide'";
                                            $ejecutar4 = $conexion->query($traerc);
                                            $userr = $ejecutar4->fetch_assoc();

                                            echo "<td>". $datos['descripcion']."</td>";
                                            if ($userr['calificacion'] <=5){
                                                echo "<td style='background-color: red; color: white;'>". $userr['calificacion']."</td>";
                                            }else{
                                                echo "<td style='background-color: green;color: white; ' >". $userr['calificacion']."</td>";
                                            }

                                        }
                                        echo "</tr>";
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
