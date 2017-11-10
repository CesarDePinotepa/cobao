<?php
require_once '../../librerias/Simple_sessions.php';
$obj_ses = new Simple_sessions();
if ($obj_ses->check_sess('userid')) {
    require_once '../../plantillas/header.php'; ?>
    <div class="row">
        <div class="col-lg-12">
            Aqui la lista
        </div>
    </div>

    <?php require_once '../../plantillas/footer.php';
}
else{
    header("Location: ../../index.php");
}
?>
