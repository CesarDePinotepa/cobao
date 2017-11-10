<?php
require_once 'librerias/Simple_sessions.php';
$obj_ses = new Simple_sessions();
if ($obj_ses->check_sess('userid')) {
    require_once 'plantillas/header-e.php';
    ?>
    <div id="page-wrapper">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Bienvenido: <?php echo $obj_ses->get_value('nombre') ?></h1>
                </div>
            </div>

            <!-- ... Your content goes here ... -->
            <div class="row">
                <div class="col-lg-12">
                </div>
            </div>

        </div>
    </div>

<?php
    require_once 'plantillas/footer.php';
}else{
    header("Location: index.php");
} ?>
