<?php
require_once '../../librerias/Simple_sessions.php';
$obj_ses = new Simple_sessions();
if ($obj_ses->check_sess('userid')) {
    require_once '../../plantillas/header.php';
?>
    <div id="page-wrapper">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12">
                    <h2>Cesar</h2>
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
    require_once '../../plantillas/footer.php';
} ?>
