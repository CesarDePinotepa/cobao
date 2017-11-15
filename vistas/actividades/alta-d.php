<?php
require_once '../../librerias/Simple_sessions.php';
$obj_ses = new Simple_sessions();
if ($obj_ses->check_sess('userid')) {
require_once '../../plantillas/header.php';
$idc = $_GET['idc'];
$idd = $_GET['idd'];
?>

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Actividades</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <?php include '../../control/mensajes.php'?>
                <form action="../../control/actividades/guardar-a.php" method="post" class="form-horizontal" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="col-md-1">Nombre</label>
                        <div class="col-md-5">
                            <input type="text"  required class="form-control" name="nomTxt"> </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-1">Fecha de entrega</label>
                        <div class="col-md-5">
                            <input type="date" required  class="form-control" name="ffin" min="<?php echo date("Y-m-d") ?>"> </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-1">Archivo</label>
                        <div class="col-md-5">
                            <input type="file"  class="form-control" name="arch"> </div>
                    </div>
                    <input type="hidden" name="idcHdn" value="<?php echo $idc ?>">
                    <input type="hidden" name="iddHdn" value="<?php echo $idd ?>">
                    <div class="col-sm-12">
                        <button class="btn btn-success">Guardar</button>

                    </div>
                </form>

            </div>
        </div>
        <?php require_once '../../plantillas/footer.php';
        }
        else{
            header("Location: ../../index.php");
        }
        ?>
