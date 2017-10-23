<?php
if (isset($_GET["bien"])) {
    $mensaje = $_GET["bien"];
    echo "<br/><span style='color: green;font-size: x-large'> $mensaje </span>";
    # code...
}
if (isset($_GET["err"])) {
    $mensaje = $_GET["err"];
    echo "<br/><span style='color: red;font-size: x-large'> $mensaje </span>";
    # code...
}
?>