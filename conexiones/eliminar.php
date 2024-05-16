<?php 
    include ("conexion.php");
    if(isset($_GET['Id_emple'])){
		$id = $_GET['Id_emple'];
        $sql = "UPDATE `tbl_empleados` SET `Estado` = 'Inactivo' WHERE `tbl_empleados`.`Id_empleado` = $id";
        $resultado = mysqli_query($conexion, $sql);
    
        if($resultado){
            Header("Location: ../doc/c_empleados/empleados.php#empleados");
        }
    }

    if(isset($_GET['Id_opeD'])){
		$id = $_GET['Id_opeD'];
        $sql = "UPDATE `tbl_operaciones` SET `Estado` = 'Inactivo' WHERE `tbl_operaciones`.`Id_operacion` = $id";
        $resultado = mysqli_query($conexion, $sql);
    
        if($resultado){
            Header("Location: ../doc/c_operaciones/reporte_dia.php");
        }
    }

    if(isset($_GET['Id_opeG'])){
		$id = $_GET['Id_opeG'];
        $sql = "UPDATE `tbl_operaciones` SET `Estado` = 'Inactivo' WHERE `tbl_operaciones`.`Id_operacion` = $id";
        $resultado = mysqli_query($conexion, $sql);
    
        if($resultado){
            Header("Location: ../doc/c_operaciones/reporte_general.php");
        }
    }

    if(isset($_GET['Id_pres'])){
		$id = $_GET['Id_pres'];
        $id2 = $_GET['Id'];
        $nombre = $_GET['Nombre'];
        $sql = "UPDATE `tbl_prestamos` SET `Estado` = 'Inactivo' WHERE `tbl_prestamos`.`Id_prestamo` = $id";
        $resultado = mysqli_query($conexion, $sql);
    
        if($resultado){
            Header("Location: ../doc/c_empleados/doc/prestamo.php?Id=$id2&Nombre=$nombre");
        }
    }

?>