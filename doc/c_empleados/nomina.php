<?php include('../../conexiones/conexion.php');
include('../c_config/asset/doc/valorConfig.php');

date_default_timezone_set('America/Dominica');
$fecha = date('Y-m-d');

$sql = "SELECT tbl_empleados.Id_empleado, Nombre, ROUND(((SUM(Peso))-(SUM(Canasto)*$V_PesoCanasto))*$V_PrecioLibra) AS G_Peso_Neto, ROUND(SUM(Canasto)*$V_PrecioCanasto) G_Canasto, ROUND((((SUM(Peso))-(SUM(Canasto)*$V_PesoCanasto))*$V_PrecioLibra)+(SUM(Canasto)*$V_PrecioCanasto)) AS Ganancia FROM `tbl_operaciones`,`tbl_empleados` WHERE tbl_operaciones.Id_empleado = tbl_empleados.Id_empleado AND Fecha = '$fecha' AND tbl_operaciones.Estado = 'Activo' GROUP BY tbl_operaciones.Id_empleado;";
$resultado = mysqli_query($conexion, $sql);

if (isset($_GET['entre'])) {
    $fecha1 = $_POST['fecha1'];
    $fecha2 = $_POST['fecha2'];
    if ($fecha2 == '') {
        $fecha2 = $fecha;
    }
    $sql = "SELECT tbl_empleados.Id_empleado, Nombre, ROUND(((SUM(Peso))-(SUM(Canasto)*$V_PesoCanasto))*$V_PrecioLibra) AS G_Peso_Neto, ROUND(SUM(Canasto)*$V_PrecioCanasto) G_Canasto, ROUND((((SUM(Peso))-(SUM(Canasto)*$V_PesoCanasto))*$V_PrecioLibra)+(SUM(Canasto)*$V_PrecioCanasto)) AS Ganancia, Fecha FROM `tbl_operaciones`,`tbl_empleados` WHERE tbl_operaciones.Id_empleado = tbl_empleados.Id_empleado AND Fecha >= '$fecha1' AND Fecha <= '$fecha2' AND tbl_operaciones.Estado = 'Activo' GROUP BY tbl_operaciones.Id_empleado;";
    $resultado = mysqli_query($conexion, $sql);
}
?>
<?php include('asset/header.php') ?>
<main class="content">
    <div class="container-fluid p-0">
        <h1 class="h3 mb-3">Nomina</h1>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <h1 class="h3 mb-3">Pago semanal</h1>
                            </div>
                            <div class="d-flex justify-content-end col-6">
                                <form action="?entre" method="post">
                                    <a class="dropdown-toggle" style="color: rgba(0, 0, 0, 0.55);" data-bs-toggle="dropdown"></a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <div class="dropdown-item-text" href="static/pages-profile.html">
                                            <span>Desde: <input type="date" class="form-control" name="fecha1"></span>
                                        </div>
                                        <div class="dropdown-item-text" href="index.html">
                                            <span>Hasta: <input type="date" class="form-control" name="fecha2"></span>
                                        </div>
                                        <div class="dropdown-item-text text-center pt-3" href="index.html">
                                            <input type="submit" class="btn btn-primary" value="Aceptar">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card-body d-flex flex-column pt-0">
                        <table id="example" class="table table-striped table-hover my-0">
                            <thead>
                                <tr>
                                    <th class="">Codigo</th>
                                    <th class="">Nombre</th>
                                    <th class="">G. Peso</th>
                                    <th class="">G. Canastos</th>
                                    <th class="">Ganancia</th>
                                    <th class="">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($fila = mysqli_fetch_assoc($resultado)) { ?>
                                    <tr>
                                        <td class=""><?php echo $fila['Id_empleado']; ?></td>
                                        <td class=""><?php echo $fila['Nombre']; ?></td>
                                        <td class="">$<?php echo $fila['G_Peso_Neto']; ?></td>
                                        <td class="">$<?php echo $fila['G_Canasto']; ?></td>
                                        <td id="ganancia">$<?php echo $fila['Ganancia']; ?></td>
                                        <td class="">
                                            <div class="d-flex gap-1">
                                                <?php if (isset($_GET['entre'])) { ?>
                                                    <button class="btn btn-success" title="Informe" onclick="informe(<?php echo $fila['Id_empleado']; ?>, '<?php echo $fila['Nombre'] ?>', '<?php echo $fecha1 ?>', '<?php echo $fecha2 ?>', <?php echo 1; ?>)"><i class="align-middle" data-feather="trending-up"></i></button>
                                                <?php } else { ?>
                                                    <button class="btn btn-success" title="Informe" onclick="informe(<?php echo $fila['Id_empleado']; ?>, '<?php echo $fila['Nombre'] ?>',)"><i class="align-middle" data-feather="trending-up"></i></button>
                                                <?php } ?>
                                                <form action="doc/prestamo.php?Id=<?php echo $fila['Id_empleado']; ?>&Nombre=<?php echo $fila['Nombre'] ?>" method="post">
                                                    <button class="btn btn-warning" title="Prestamo"><i class="align-middle" data-feather="dollar-sign"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card" id="nomina"></div>
            </div>
        </div>
    </div>
</main>
<?php include('asset/footer.php') ?>
<script src="asset/js/nomina.js"></script>
<script src="asset/js/acciones.js"></script>