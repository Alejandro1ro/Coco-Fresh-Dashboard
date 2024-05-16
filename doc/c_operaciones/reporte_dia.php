<?php
include('asset/header.php');
include('../../conexiones/conexion.php');

date_default_timezone_set('America/Dominica');
$fecha = date('Y-m-d');

$sql = "SELECT Id_operacion, Nombre, Peso, Canasto, (DATE_FORMAT(Hora, '%h:%i:%s %p')) AS Hora, tbl_operaciones.Estado FROM tbl_empleados, tbl_operaciones WHERE tbl_operaciones.Estado = 'Activo' AND tbl_empleados.Id_empleado = tbl_operaciones.Id_empleado AND Fecha LIKE '$fecha%'";
$resultado = mysqli_query($conexion, $sql);
?>
<main class="content">
    <div class="container-fluid p-0">
        <h1 class="h3 mb-3">Operaciones</h1>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body d-grid justify-items-end pb-0">
                        <div class="d-flex flex-column col-xxl-2">
                            <label for="fecha_registro" class="form-label">Fecha de registro</label>
                            <input type="date" name="fecha_registro" value="<?php echo $fecha ?>" class="form-control" disabled>
                        </div>
                    </div>
                    <div class="card-body d-grid pt-0">
                        <h1 class="h3 mb-3">Registro</h1>
                        <form action="../../conexiones/insertar.php?reporte_dia" method="post">
                            <div class="row">
                                <div class="d-flex flex-column col-md-4">
                                    <label for="nombre" class="form-label">Nombre o codigo</label>
                                    <input type="text" name="nomcod" class="form-control" placeholder="Buscar nombre o codigo" data-bs-toggle="dropdown" autocomplete="off" onkeyup="buscar()" id="input" required>
                                    <div class="dropdown-menu dropdown-menu-start" id="buscar"></div>
                                </div>
                                <div class="d-flex flex-column col-md-3">
                                    <label for="canasto" class="form-label">Canasto</label>
                                    <input type="number" name="canasto" class="form-control" placeholder="Insertar canasto" required>
                                </div>
                                <div class="d-flex flex-column col-md-3">
                                    <label for="peso" class="form-label">Peso</label>
                                    <input type="number" name="peso" class="form-control" placeholder="Insertar peso" required>
                                </div>
                                <div class="d-flex flex-column justify-content-end col-md-2 mt-3" id="validacion">
                                    <input type="submit" class="btn btn-success" value="Insertar" id="enviar" disabled>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-body d-flex flex-column">
                        <h1 class="h3 mb-3 d-flex justify-content-end">Reporte del dia</h1>
                        <table id="example" class="table table-striped table-hover my-0">
                            <thead>
                                <tr>
                                    <th class="">Nombre</th>
                                    <th class="">Canasto</th>
                                    <th class="">Peso</th>
                                    <th class="">Hora</th>
                                    <th class="">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($fila = mysqli_fetch_assoc($resultado)) { ?>
                                    <tr>
                                        <td class=""><?php echo $fila['Nombre'] ?></td>
                                        <td class=""><?php echo $fila['Canasto'] ?></td>
                                        <td class=""><?php echo $fila['Peso'] ?></td>
                                        <td class=""><?php echo $fila['Hora'] ?></td>
                                        <td class="">
                                            <div class="d-flex gap-1">
                                                <a href="asset/edit/edit_dia.php?Id_ope=<?php echo $fila['Id_operacion']; ?>"><button class="btn btn-primary" title="Editar"><i class="align-middle" data-feather="edit"></i></button></a>
                                                <a href="../../conexiones/eliminar.php?Id_opeD=<?php echo $fila['Id_operacion']; ?>"><button class="btn btn-danger" title="Eliminar"><i class="align-middle" data-feather="trash-2"></i></button></a>
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
<script src="asset/js/ajax.js"></script>
<script src="asset/js/reporte_dia.js"></script>