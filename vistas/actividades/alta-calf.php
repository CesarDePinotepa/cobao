<?php
require_once '../../librerias/Simple_sessions.php';
$obj_ses = new Simple_sessions();
if ($obj_ses->check_sess('userid')) {
require_once '../../plantillas/header.php';
$ide = $_GET['ide'];
$ida = $_GET['ida'];
$idm = $_GET['idm'];

?>

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Calificando </h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <?php include '../../control/mensajes.php'?>
                <form action="../../control/actividades/saveNote.php" method="post" class="form-horizontal" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="col-md-1">Comentarios</label>
                        <div class="col-md-12">
                            <textarea  class="form-control" required name="comArea"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-1">Calificación</label>
                        <div class="col-md-2">
                            <input type="number"  required class="form-control" name="calNum">
                        </div>
                    </div>
                    <input type="hidden" name="ideHdn" value="<?php echo $ide ?>">
                    <input type="hidden" name="idmHdn" value="<?php echo $idm ?>">
                    <input type="hidden" name="idaHdn" value="<?php echo $ida ?>">
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
