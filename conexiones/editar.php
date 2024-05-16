<?php include("conexion.php");

if (isset($_GET['empleados'])) {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $estado = $_POST['estado'];

    $id = $_GET['empleados'];
    $sql = "UPDATE `tbl_empleados` SET `Nombre` = '$nombre', `Apellido` = '$apellido', `Estado` = '$estado' WHERE `tbl_empleados`.`Id_empleado` = $id;";
    $resultado = mysqli_query($conexion, $sql);
    if ($resultado) {
        Header("Location: ../doc/c_empleados/empleados.php#empleados");
    }
}

if (isset($_GET['reporte_dia'])) {
    $peso = $_POST['peso'];
    $canasto = $_POST['canasto'];

    $id = $_GET['reporte_dia'];
    $sql = "UPDATE `tbl_operaciones` SET `Peso` = '$peso', `Canasto` = '$canasto' WHERE `tbl_operaciones`.`Id_operacion` = $id;";
    $resultado = mysqli_query($conexion, $sql);
    if ($resultado) {
        Header("Location: ../doc/c_operaciones/reporte_dia.php");
    }
}

if (isset($_GET['reporte_general'])) {
    $peso = $_POST['peso'];
    $canasto = $_POST['canasto'];
    $estado = $_POST['estado'];

    $id = $_GET['reporte_general'];
    $sql = "UPDATE `tbl_operaciones` SET `Peso` = '$peso', `Canasto` = '$canasto', `Estado` = '$estado' WHERE `tbl_operaciones`.`Id_operacion` = $id;";
    $resultado = mysqli_query($conexion, $sql);
    if ($resultado) {
        Header("Location: ../doc/c_operaciones/reporte_general.php");
    }
}

if(isset($_GET['Id_pago'])){
    $id_pres = $_GET['Id_pago'];
    $valor = $_GET['Valor'];

    $sql = "UPDATE `tbl_prestamos` SET `Pago` = $valor WHERE `tbl_prestamos`.`Id_prestamo` = $id_pres;";
    $resultado = mysqli_query($conexion, $sql);  
}

if(isset($_GET['Id_pres'])){
    $id = $_GET['Id'];
    $id_pres = $_GET['Id_pres'];
    $nombre = $_GET['Nombre'];
    $prestamo = $_POST['Prestamo'];

    $sql = "UPDATE `tbl_prestamos` SET `Prestamo` = $prestamo WHERE `tbl_prestamos`.`Id_prestamo` = $id_pres;";
    $resultado = mysqli_query($conexion, $sql); 
    
    if ($resultado) {
        Header("Location: ../doc/c_empleados/doc/prestamo.php?Id=$id&Nombre=$nombre");
    }
}

?>

