<?php
include('../../../../conexiones/conexion.php');


if (isset($_GET['valor'])) {
    $valor = $_GET['valor'];
    if ($_GET['tipo'] == 'numero') {
        $sql = "SELECT * FROM tbl_empleados WHERE Id_empleado LIKE '%$valor%' LIMIT 4";
        $resultado = mysqli_query($conexion, $sql);

        $cantidad = mysqli_num_rows($resultado);
        $contador = 1;

        while ($mostrar = mysqli_fetch_assoc($resultado)) {
            echo '<div onclick="pegar(`' . $mostrar['Nombre'] . '`)" style="cursor: pointer;" class="px-3">' . $mostrar['Nombre'] . '</div>';
            if ($contador == $cantidad) {
                echo '';
            } else {
                echo '<div class="dropdown-divider"></div>';
            }
            $contador++;
        }
    } else if ($_GET['tipo'] == 'texto') {
        $sql = "SELECT * FROM tbl_empleados WHERE Nombre LIKE '%$valor%' LIMIT 4";
        $resultado = mysqli_query($conexion, $sql);

        $cantidad = mysqli_num_rows($resultado);
        $contador = 1;

        while ($mostrar = mysqli_fetch_assoc($resultado)) {
            echo '<div onclick="pegar(`' . $mostrar['Nombre'] . '`)" style="cursor: pointer;" class="px-3">' . $mostrar['Nombre'] . '</div>';
            if ($contador == $cantidad) {
                echo '';
            } else {
                echo '<div class="dropdown-divider"></div>';
            }
            $contador++;
        }
    } else {
        echo 'f';
    }
}
