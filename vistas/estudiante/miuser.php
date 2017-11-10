<?php
require_once '../../librerias/Simple_sessions.php';
$obj_ses = new Simple_sessions();
if ($obj_ses->check_sess('userid')) {
    require_once '../../plantillas/header-a.php';
    include "../../control/conexion.php";

    $id = $_GET['id'];
    $consultar = "SELECT * FROM `usuario` WHERE `idper` = '$id'";
    $ejecutar = $conexion->query($consultar);
    $datos = $ejecutar->fetch_assoc();
    ?>
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Usuario de estudiante <?php  echo $_GET['n']?></h1>
                </div>
            </div>

            <!-- ... Your content goes here ... -->
            <div class="row">
                <div class="col-lg-12">
                    <?php include '../../control/mensajes.php'?>
                    <form action="" method="post" class="form-horizontal" >
                        <div class="form-group">
                            <label class="col-md-1">Usuario</label>
                            <div class="col-md-5">
                                <input type="text" disabled  class="form-control" value="<?php echo $datos['nombre'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-1">Password</label>
                            <div class="col-md-5">
                                <input type="password"  class="form-control" value="<?php echo $datos['password'] ?>">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <button class="btn btn-success">Guardar</button>

                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

    <?php
    require_once '../../plantillas/footer.php';
}else{
    header("Location: ../../index.php");
} ?>
