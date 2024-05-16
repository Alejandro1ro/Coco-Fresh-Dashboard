<?php
include("conexion.php");

if (isset($_GET['empleados'])) {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];

    $sql = "INSERT INTO `tbl_empleados` VALUES (NULL, '$nombre', '$apellido', 'Activo');";
    $resultado = mysqli_query($conexion, $sql);

    if ($resultado) {
        Header("Location: ../doc/c_empleados/empleados.php#empleados");
    }
}

if (isset($_GET['reporte_dia'])) {
    $nomcod = $_POST['nomcod'];
    $peso = $_POST['peso'];
    $canasto = $_POST['canasto'];

    $validacion = "SELECT Id_empleado FROM `tbl_empleados` WHERE Nombre = '$nomcod';";
    $valiResul = mysqli_query($conexion, $validacion);
    $Resul = mysqli_fetch_assoc($valiResul);
    $id = $Resul['Id_empleado'];

    date_default_timezone_set('America/Dominica');
    $hora = date('H:i:s');
    $fecha = date('Y-m-d');


    $sql = "INSERT INTO `tbl_operaciones` VALUES (NULL, '$id', '$peso', $canasto, '$fecha', '$hora', 'Activo');";
    $resultado = mysqli_query($conexion, $sql);

    if ($resultado) {
        Header("Location: ../doc/c_operaciones/reporte_dia.php");
    }
}

if (isset($_GET['Valor'])) {
    $id = $_GET['Id'];
    $valor = $_GET['Valor'];

    date_default_timezone_set('America/Dominica');
    $fecha = date('Y-m-d');
    $hora = date('H:i:s');

    $sql = "INSERT INTO `tbl_prestamos` VALUES (NULL, '$id', '$valor', '0', '$fecha', '$hora', 'Activo')";
    $resultado = mysqli_query($conexion, $sql);
}
?>