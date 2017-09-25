<?php
if (isset($_GET["bien"])) {
    $mensaje = $_GET["bien"];
    echo "<br/><span> $mensaje </span>";
    # code...
}
if (isset($_GET["err"])) {
    $mensaje = $_GET["err"];
    echo "<br/><span> $mensaje </span>";
    # code...
}
?>