<?php
require_once '../../librerias/Simple_sessions.php';
$obj_ses = new Simple_sessions();
if ($obj_ses->check_sess('userid')) {
    require_once '../../plantillas/header.php';
    include "../../control/conexion.php";
    ?>

    <div id="page-wrapper">
        <div class="container-fluid">
            <?php
            /*
            $comprobar = "SELECT * FROM `foro_foro` WHERE `foro` = '$grado'";
            $ejecutar3 = $conexion->query($comprobar);*/
            ?>
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Crea nuevo tema</h1>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <?php include '../../control/mensajes.php';
                    $consulta = "SELECT * FROM `foro_categoria`";
                    $ejecutar = $conexion->query($consulta);


                    ?>
                    <form action="../../control/foro/save-com.php" method="post" class="form-horizontal" >
                        <div class="form-group">
                            <label class="col-md-1">Categoria</label>
                            <div class="col-md-5">
                                <select name="perSel" id="tipo" class="form-control" required>
                                    <option value="-1">Seleccione</option>
                                    <?php
                                    while ($datos = $ejecutar->fetch_assoc()){
                                        echo "<option value='".$datos['id_forocategoria']."'>". $datos['categoria'] ."</option>";
                                    }
                                    ?>

                                </select>
                            </div>

                        </div>
                        <div class="form-group">
                            <label class="col-md-1">Título</label>
                            <div class="col-md-5">
                                <input type="text"  class="form-control" name="titTxt" required>
                            </div>

                        </div>
                        <div class="form-group">
                            <label class="col-md-1">Descripción</label>
                            <div class="col-md-5">
                                <textarea name="msjTxa" id="" cols="70" rows="5" required ></textarea>
                            </div>

                        </div>
                        <div class="col-sm-12">
                            <button class="btn btn-success">Guardar</button>

                        </div>
                    </form>
            </div>


        </div>
    </div>




    <?php require_once '../../plantillas/footer.php';
}
else{
    header("Location: ../../index.php");
}
?>

