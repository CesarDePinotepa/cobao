
<?php require_once '../librerias/Simple_sessions.php';
    // Destruye toda la sesión
    destroy_sess();

    header('location: ../index.php' );
?>