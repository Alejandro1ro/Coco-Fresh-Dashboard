<?php
//Precio por Libra
$PrecioLibra = "SELECT * FROM `tbl_config` WHERE Id_configuracion = 1";
$R_PrecioLibra = mysqli_query($conexion, $PrecioLibra);
$T_PrecioLibra = mysqli_fetch_assoc($R_PrecioLibra);
$V_PrecioLibra = $T_PrecioLibra['Valor'];

//Precio por Canasto
$PrecioCanasto = "SELECT * FROM `tbl_config` WHERE Id_configuracion = 2";
$R_PrecioCanasto = mysqli_query($conexion, $PrecioCanasto);
$T_PrecioCanasto = mysqli_fetch_assoc($R_PrecioCanasto);
$V_PrecioCanasto = $T_PrecioCanasto['Valor'];

//Peso por Canasto
$PesoCanasto = "SELECT * FROM `tbl_config` WHERE Id_configuracion = 3";
$R_PesoCanasto = mysqli_query($conexion, $PesoCanasto);
$T_PesoCanasto = mysqli_fetch_assoc($R_PesoCanasto);
$V_PesoCanasto = $T_PesoCanasto['Valor'];
?>