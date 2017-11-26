<?php
require_once '../../librerias/Simple_sessions.php';
$obj_ses = new Simple_sessions();
if ($obj_ses->check_sess('userid')) {
    require_once '../../plantillas/header.php';
    include "../../control/conexion.php";
    $id = $_GET['id'];
    $idu = $obj_ses->check_sess('userid');
    $consulta = "SELECT * FROM `foro_foro` WHERE `id_foro` = '$id'";
    $ejecutar = $conexion->query($consulta);
    $datos = $ejecutar->fetch_assoc();

    ?>

    <div id="page-wrapper">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-6">
                    <h2 class="page-header">Responder a <b><?php echo $datos['foro']?></b></h2>
                </div>
            </div>
            <!-- ... Your content goes here ... -->
            <div class="row">
                <div class="col-lg-12">
                    <?php include "../../control/mensajes.php"; ?>
                    <form action="../../control/foro/guardar-res.php" method="post" class="form-horizontal" >

                        <div class="form-group">
                            <label class="col-md-1">Descripción</label>
                            <div class="col-md-5">
                                <textarea name="msjTxa" disabled id="" cols="70" rows="5" ><?php echo $datos['descripcion'] ?></textarea>
                            </div>

                        </div>
                        <div class="form-group">
                            <label class="col-md-1">Respuesta</label>
                            <div class="col-md-5">
                                <textarea name="resTxa"  id="" cols="70" rows="5" required ></textarea>
                            </div>

                        </div>
                        <input type="hidden" name="idHdn" value="<?php echo $id ?>">
                        <input type="hidden" name="iduHdn" value="<?php echo $idu ?>">
                        <div class="col-sm-12">
                            <button class="btn btn-success">Responder</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>




    <?php require_once '../../plantillas/footer.php';
}
else{
    header("Location: ../../index.php");
}
?>

