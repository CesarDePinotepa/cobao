<?php

require_once '../../librerias/Simple_sessions.php';
$obj_ses = new Simple_sessions();
if ($obj_ses->check_sess('userid')) {
    include '../../control/conexion.php';
    $id = $_GET['id'];
    $selec = "SELECT * FROM `estudiante` WHERE `id` = '$id' ";
    $ejecutar = $conexion->query($selec);
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
            <a class="navbar-brand" href="#">Logo</a>
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
                                <a href="../curso/listar-c.php">Listar</a>
                            </li>
                            <li>
                                <a href="../curso/alta-c.php">Alta</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="active"><i class="fa fa-users fa-fw"></i>Estudiantes <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="listar-e.php">Listar</a>
                            </li>
                            <li>
                                <a href="alta-e.php">Alta</a>
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

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Editar estudiante: <b><?php echo $datos['apaterno']." ".$datos['amaterno']." ". $datos['nombre']  ?></b></h1>
                </div>
            </div>

            <!-- ... Your content goes here ... -->
            <div class="row">
                <div class="col-lg-12">
                    <?php include '../../control/mensajes.php'?>
                    <form action="../../control/estudiante/actualizar-e.php" method="post" class="form-horizontal" >
                        <div class="form-group">
                            <label class="col-md-1">No. Control</label>
                            <div class="col-md-5">
                                <input type="text" disabled  class="form-control " name="nomTxt" value="<?php echo $datos['num_control'] ?>"> </div>

                        </div>
                        <div class="form-group">
                            <label class="col-md-1">Nombre</label>
                            <div class="col-md-5">
                                <input type="text"  class="form-control " name="nomTxt" value="<?php echo $datos['nombre'] ?>"> </div>

                        </div>
                        <div class="form-group">
                            <label class="col-md-1">Apellido Paterno</label>
                            <div class="col-md-5">
                                <input type="text"  class="form-control" name="apaTxt" value="<?php echo $datos['apaterno'] ?>"> </div>

                        </div>
                        <div class="form-group">
                            <label class="col-md-1">Apellido Materno</label>
                            <div class="col-md-5">
                                <input type="text"  class="form-control " name="amaTxt" value="<?php echo $datos['amaterno'] ?>"> </div>

                        </div>
                        <div class="form-group">
                            <label class="col-md-1">CURP</label>
                            <div class="col-md-5">
                                <input type="text"  class="form-control" name="curpTxt" value="<?php echo $datos['curp'] ?>"> </div>

                        </div>
                        <div class="form-group">
                            <label class="col-md-1">Semestre</label>
                            <div class="col-md-5">
                                <select name="graSel" id="" class="form-control">
                                    <option value="<?php echo $datos['grado'] ?>"><?php echo $datos['grado'] ?></option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2">Escuela de procedencia</label>
                            <div class="col-md-5">
                                <input type="text"  class="form-control " name="escTxt" value="<?php echo $datos['escuela_proce'] ?>"> </div>

                        </div>
                        <div class="form-group">
                            <label class="col-md-1">Email</label>
                            <div class="col-md-5">
                                <input type="email"  class="form-control " name="email" value="<?php echo $datos['email'] ?>"> </div>

                        </div>
                        <div class="form-group">
                            <label class="col-sm-2">Fecha de nacimiento</label>
                            <div class="col-md-5">
                                <input type="date"  class="form-control " name="date" value="<?php echo $datos['fecha_nac'] ?>"> </div>

                        </div>
                        <input type="hidden" value="<?php echo $id ?>" name="idHdn">
                        <div class="col-sm-12">
                            <button class="btn btn-success">Actualizar</button>

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
    header("Location: ../../index.php");
}
?>
