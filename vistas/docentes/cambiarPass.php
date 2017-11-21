<?php
require_once '../../librerias/Simple_sessions.php';
$obj_ses = new Simple_sessions();
if ($obj_ses->check_sess('userid')) {
require_once '../../plantillas/header.php';
include "../../control/conexion.php";
$idu = $obj_ses->get_value('userid');

$traeru = "SELECT * FROM `usuario` WHERE `id` ='$idu'";
$ejecutar = $conexion->query($traeru);
$datos = $ejecutar->fetch_assoc();

?>
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
                <form action="../../control/docentes/updatePass.php" method="post" class="form-horizontal" >
                    <div class="form-group">
                        <label class="col-md-1">Nombre</label>
                        <div class="col-md-5">
                            <input type="text" disabled  class="form-control " name="nomTxt" value="<?php echo $datos['email'] ?>">
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
        <?php require_once '../../plantillas/footer.php';
        }
        else{
            header("Location: ../../index.php");
        }
        ?>
