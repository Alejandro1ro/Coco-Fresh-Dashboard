<?php include('../../../conexiones/conexion.php');

if (isset($_GET['Entre'])) {
    $fecha1 = $_GET['fecha1'];
    $fecha2 = $_GET['fecha2'];

    $id = $_GET['Id'];
    $sql = "SELECT tbl_empleados.Nombre AS Nombre, ((SUM(Peso))-(SUM(Canasto)*3.5)) AS Peso_T, SUM(Canasto) AS Canastos_T, Fecha, tbl_empleados.Estado AS Estado FROM `tbl_operaciones`, `tbl_empleados` WHERE tbl_operaciones.Id_empleado = tbl_empleados.Id_empleado AND Fecha >= '$fecha1' AND Fecha <= '$fecha2' AND tbl_operaciones.Id_empleado = $id GROUP BY Fecha;";
    $resultado = mysqli_query($conexion, $sql);

    $T = "SELECT ((SUM(Peso))-(SUM(Canasto)*3.5)) AS Peso_T, SUM(Canasto) AS Canastos_T FROM `tbl_operaciones` WHERE Fecha >= '$fecha1' AND Fecha <= '$fecha2' AND Id_empleado = $id";
    $T_resultado = mysqli_query($conexion, $T);
} else {
    date_default_timezone_set('America/Dominica');
    $fecha = date('Y-m-d');

    $id = $_GET['Id'];
    $sql = "SELECT tbl_empleados.Nombre AS Nombre, ((SUM(Peso))-(SUM(Canasto)*3.5)) AS Peso_T, SUM(Canasto) AS Canastos_T, Fecha, tbl_empleados.Estado AS Estado FROM `tbl_operaciones`, `tbl_empleados` WHERE tbl_operaciones.Id_empleado = tbl_empleados.Id_empleado AND Fecha = '$fecha'AND tbl_operaciones.Id_empleado = $id GROUP BY Fecha;";
    $resultado = mysqli_query($conexion, $sql);

    $T = "SELECT ((SUM(Peso))-(SUM(Canasto)*3.5)) AS Peso_T, SUM(Canasto) AS Canastos_T FROM `tbl_operaciones` WHERE Fecha = '$fecha'AND Id_empleado = $id";
    $T_resultado = mysqli_query($conexion, $T);
}

?>

<?php if (isset($_GET['Nombre'])) { ?>
    <div class="card-body pb-0">
        <h1 class="h3 mb-3"><?php echo $_GET['Nombre'] ?></h1>
    </div>
<?php } ?>
<div class="card-body d-flex flex-column pt-0">
    <table class="table table-striped table-hover my-0">
        <thead>
            <tr>
                <th class="">Peso T.</th>
                <th class="">Canastos T.</th>
                <th class="">Fecha</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($fila = mysqli_fetch_assoc($resultado)) { ?>
                <tr>
                    <td class=""><?php echo $fila['Peso_T']; ?></td>
                    <td class=""><?php echo $fila['Canastos_T']; ?></td>
                    <td class=""><?php echo $fila['Fecha']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
        <?php while ($T_fila = mysqli_fetch_assoc($T_resultado)) { ?>
            <tfoot>
                <th><?php echo $T_fila['Peso_T'] ?></th>
                <th><?php echo $T_fila['Canastos_T'] ?></th>
            </tfoot>
        <?php } ?>
    </table>
</div>

