<?php
require_once '../../librerias/Simple_sessions.php';
$obj_ses = new Simple_sessions();
if ($obj_ses->check_sess('userid')) {
    require_once '../../plantillas/header-a.php';
    include "../../control/conexion.php";
    ?>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Asignación de materias</h1>
        </div>
    </div>

    <!-- ... Your content goes here ... -->
    <div class="row">
        <div class="col-lg-12">
            <?php include '../../control/mensajes.php'?>
            <form action="../../control/grupo/asignar-m.php" method="post" class="form-horizontal" >
                <div class="form-group">
                    <label class="col-md-1">Docente</label>
                    <div class="col-md-5">
                        <select name="docSel" id=""  class="form-control">
                            <option value="-1">Seleccione un docente</option>
                            <?php
                            $consulta = "SELECT `id`, CONCAT(`nombre`,' ', `apaterno`,' ', `amaterno`) AS nomDoc FROM `docentes`";
                            $ejecutar = $conexion->query($consulta);
                            while ($datos = $ejecutar->fetch_assoc()){
                                echo "<option value='".$datos['id']."'>". $datos['nomDoc'] ."</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-1">Materias</label>
                    <div class="col-md-5">
                            <?php
                            $consulta2 = "SELECT * FROM `curso` WHERE `descripcion` < '3' ";
                            $ejecutar2 = $conexion->query($consulta2);
                            while ($datos2 = $ejecutar2->fetch_assoc()){
                                echo "<input type='checkbox' name='curChe[]' value='".$datos2['id']."'> ".$datos2['nombre']." <br>";
                            }
                            ?>
                    </div>
                </div>
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
