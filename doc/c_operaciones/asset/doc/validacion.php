<?php
include('../../../../conexiones/conexion.php');

if (isset($_GET['valor'])) {
    $valor = $_GET['valor'];
    $sql = "SELECT * FROM tbl_empleados WHERE Nombre = '$valor'";
    $resultado = mysqli_query($conexion, $sql);

    if (mysqli_num_rows($resultado) > 0) {
        echo '<input type="submit" class="btn btn-success" value="Insertar">';
    }else{
        echo '<input type="submit" class="btn btn-success" value="Insertar" disabled>';
    }
}
