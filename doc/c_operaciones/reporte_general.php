<?php include('../../conexiones/conexion.php');
if (isset($_GET['entre'])) {
    $fecha1 = $_POST['fecha1'];
    $fecha2 = $_POST['fecha2'];
    $sql = "SELECT Id_operacion, Nombre, Peso, Canasto, (DATE_FORMAT(Fecha, '%d-%m-%Y')) AS Fecha, (DATE_FORMAT(Hora, '%h:%i:%s %p')) AS Hora, tbl_operaciones.Estado AS Estado FROM tbl_operaciones, tbl_empleados WHERE tbl_empleados.Id_empleado = tbl_operaciones.Id_empleado AND Fecha >= '$fecha1' AND Fecha <= '$fecha2'";
    $resultado = mysqli_query($conexion, $sql);
} else {
    $sql = "SELECT Id_operacion, Nombre, Peso, Canasto, (DATE_FORMAT(Fecha, '%d-%m-%Y')) AS Fecha, (DATE_FORMAT(Hora, '%h:%i:%s %p')) AS Hora, tbl_operaciones.Estado AS Estado FROM tbl_operaciones, tbl_empleados WHERE tbl_empleados.Id_empleado = tbl_operaciones.Id_empleado";
    $resultado = mysqli_query($conexion, $sql);
}
?>
<?php include('asset/header.php') ?>
<main class="content">
    <div class="container-fluid p-0">
        <h1 class="h3 mb-3">Configuracion</h1>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="row pb-4">
                            <div class="col-6">
                                <h1 class="h3 mb-3">Reporte general</h1>
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

                        <table id="example" class="table table-striped table-hover my-0">
                            <thead>
                                <tr>
                                    <th class="">Nombre</th>
                                    <th class="">Peso</th>
                                    <th class="">Canasto</th>
                                    <th class="">Fecha</th>
                                    <th class="">Hora</th>
                                    <th class="">Estado</th>
                                    <th class="">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($fila = mysqli_fetch_assoc($resultado)) { ?>
                                    <tr>
                                        <td class=""><?php echo $fila['Nombre'] ?></td>
                                        <td class=""><?php echo $fila['Peso'] ?></td>
                                        <td class=""><?php echo $fila['Canasto'] ?></td>
                                        <td class=""><?php echo $fila['Fecha'] ?></td>
                                        <td class=""><?php echo $fila['Hora'] ?></td>
                                        <?php
                                        if ($fila['Estado'] == 'Activo') {
                                            echo '<td class=""><span class="badge bg-success">' . $fila['Estado'] . '</span></td>';
                                        } else if ($fila['Estado'] == 'Inactivo') {
                                            echo '<td class=""><span class="badge bg-danger">' . $fila['Estado'] . '</span></td>';
                                        };
                                        ?>
                                        <td class="">
                                            <div class="d-flex gap-1">
                                                <a href="asset/edit/edit_general.php?Id_ope=<?php echo $fila['Id_operacion']; ?>"><button class="btn btn-primary" title="Editar"><i class="align-middle" data-feather="edit"></i></button></a>
                                                <a href="../../conexiones/eliminar.php?Id_opeG=<?php echo $fila['Id_operacion']; ?>"><button class="btn btn-danger" title="Eliminar"><i class="align-middle" data-feather="trash-2"></i></button></a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php include('asset/footer.php') ?>
<script src="asset/js/reporte_general.js"></script>