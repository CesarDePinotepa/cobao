<?php
require_once '../../librerias/Simple_sessions.php';
$obj_ses = new Simple_sessions();
if ($obj_ses->check_sess('userid')) {
    include "../../control/conexion.php";
    $idu = $obj_ses->get_value('userid');

    $traeru = "SELECT * FROM `usuario` WHERE `id` ='$idu'";
    $ejecutar = $conexion->query($traeru);
    $datos = $ejecutar->fetch_assoc();

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
                        <h2 class="page-header">Cambiar contreaseña del usuario: <b><?php echo $datos['nombre'] ?></b> </h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <?php include '../../control/mensajes.php'?>
                        <form action="../../control/estudiante/updateContra.php" method="post" class="form-horizontal" >
                            <div class="form-group">
                                <label class="col-md-1">Número de control</label>
                                <div class="col-md-5">
                                    <input type="text" disabled  class="form-control " name="nomTxt" value="<?php echo $datos['nombre'] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-1">Contraseña Actual</label>
                                <div class="col-md-5">
                                    <input type="password"  class="form-control" name="conPas" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-1">Nueva Contraseña</label>
                                <div class="col-md-5">
                                    <input type="password"  class="form-control" name="conPasN" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-1">Confirme Contraseña</label>
                                <div class="col-md-5">
                                    <input type="password"  class="form-control" name="conPasC" required>
                                </div>
                            </div>
                            <input type="hidden" name="idHdn" value="<?php echo $idu ?>">
                            <div class="col-sm-12">
                                <button class="btn btn-success">Cambiar</button>

                            </div>
                        </form>

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
