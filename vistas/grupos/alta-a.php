<?php
require_once '../../librerias/Simple_sessions.php';
$obj_ses = new Simple_sessions();
if ($obj_ses->check_sess('userid')) {
    require_once '../../plantillas/header-a.php'; ?>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Alta de grupos</h1>
        </div>
    </div>

    <!-- ... Your content goes here ... -->
    <div class="row">
        <div class="col-lg-12">
            <?php include '../../control/mensajes.php'?>
            <form action="../../control/grupo/guardar-g.php" method="post" class="form-horizontal" >
                <div class="form-group">
                    <label class="col-md-1">Nombre</label>
                    <div class="col-md-5">
                        <input type="text"  class="form-control" name="nomTxt"> </div>

                </div>
                <div class="form-group">
                    <label class="col-md-1">Semestre</label>
                    <div class="col-md-5">
                        <select name="graSel" id=""  class="form-control">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                        </select>
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
