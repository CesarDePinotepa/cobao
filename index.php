<?php
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
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="css/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/startmin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<div id="wrapper" style="background-color: #C4131B">
    <img src="img/cobaojj.png" alt="">
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid" >
            <div class="row" >
                <div class="col-lg-12">
                    <h1 class="page-header">Inicio de Sesión</h1>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <?php include 'control/mensajes.php'?>
                    <form action="control/login.php" method="post" class="form-horizontal" >
                        <div class="form-group">
                            <label class="col-md-1">Email</label>
                            <div class="col-md-5">
                                <input type="text"  class="form-control" name="usrTxt" autofocus> </div>

                        </div>
                        <div class="form-group">
                            <label class="col-md-1">Contraseña</label>
                            <div class="col-md-5">
                                <input type="password"  class="form-control" name="pass"> </div>

                        </div>
                        <div class="col-sm-12">
                            <button class="btn btn-success">Ingresar</button>

                        </div>
                    </form>
                </div>
            </div>

            <!-- ... Your content goes here ... -->


        </div>
    </div>

</div>

<!-- jQuery -->
<script src="js/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="js/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="js/startmin.js"></script>

</body>
</html>

