<?php
require_once '../../librerias/Simple_sessions.php';
$obj_ses = new Simple_sessions();
if ($obj_ses->check_sess('userid')) {
    require_once '../../plantillas/header-a.php'; ?>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Lista de grupos</h1>
            <?php include "../../control/mensajes.php"; ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Semestre</th>
                        <th>Eliminar</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php include "../../control/conexion.php";
                    $consulta = "SELECT * FROM `grupo`";
                    $ejecutar = $conexion->query($consulta);

                    $i = 0;
                    while ($datos = $ejecutar->fetch_assoc()) {
                        $id = $datos['id'];
                        echo "<tr>";
                        echo "<td>". number_format($i += 1) ."</td>";
                        echo "<td> <a href='editar-c.php?id=$id'>". $datos['nombre']  ."</a></td>";
                        echo "<td>". $datos['semestre']."</td>";
                        echo "<td><a href='../../control/grupo/eliminar-g.php?id=$id' onclick='return confirm(\"¿Eliminar?\");' <i class='fa fa-trash-o fa-fw' aria-hidden='true'></i></a></td>";
                        echo "<tr>";
                    }

                    $conexion->close();
                    ?>

                    </tbody>
                </table>
            </div>

        </div>
    </div>

    <?php require_once '../../plantillas/footer.php';
}
else{
    header("Location: ../../index.php");
}
?>
