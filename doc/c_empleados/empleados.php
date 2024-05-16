<?php include('../../conexiones/conexion.php');
$sql = "SELECT * FROM `tbl_empleados`";
$resultado = mysqli_query($conexion, $sql);
?>
<?php include('asset/header.php') ?>
<main class="content">
    <div class="container-fluid p-0">
        <div id="empleados" style="position: absolute;right: 0;top: 74px;"></div>
        <h1 class="h3 mb-3">Empleados</h1>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body d-grid">
                        <h1 class="h3 mb-3">Registro</h1>
                        <form action="../../conexiones/insertar.php?empleados" method="post">
                            <div class="row">
                                <div class="d-flex flex-column align-items-start col-md-3">
                                    <label for="codigo" class="form-label">Codigo</label>
                                    <input type="number" class="form-control" value="<?php echo mysqli_num_rows($resultado) + 1 ?>" disabled>
                                </div>
                                <div class="d-flex flex-column align-items-start col-md-3">
                                    <label for="nombre" class="form-label">Nombre</label>
                                    <input type="text" name="nombre" class="form-control" placeholder="Introducir nombre">
                                </div>
                                <div class="d-flex flex-column align-items-start col-md-3">
                                    <label for="apellido" class="form-label">Apellido</label>
                                    <input type="text" name="apellido" class="form-control" placeholder="Introducir apellido">
                                </div>
                                <div class="d-flex flex-column justify-content-end col-md-3 mt-3">
                                    <input type="submit" class="btn btn-success" value="Insertar">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-body d-flex flex-column">
                        <h1 class="h3 mb-3 d-flex justify-content-end">Reporte de empleados</h1>
                        <table id="example" class="table table-striped table-hover my-0">
                            <thead>
                                <tr>
                                    <th class="">Codigo</th>
                                    <th class="">Nombre</th>
                                    <th class="">Apellido</th>
                                    <th class="">Estatus</th>
                                    <th class="">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($fila = mysqli_fetch_assoc($resultado)) { ?>
                                    <tr>
                                        <td class=""><?php echo $fila['Id_empleado']; ?></td>
                                        <td class=""><?php echo $fila['Nombre']; ?></td>
                                        <td class=""><?php echo $fila['Apellido']; ?></td>
                                        <?php
                                        if ($fila['Estado'] == 'Activo') {
                                            echo '<td class=""><span class="badge bg-success">' . $fila['Estado'] . '</span></td>';
                                        } else if ($fila['Estado'] == 'Inactivo') {
                                            echo '<td class=""><span class="badge bg-danger">' . $fila['Estado'] . '</span></td>';
                                        };
                                        ?>
                                        <td class="">
                                            <div class="d-flex gap-1">
                                                <a href="asset/edit/edit_emple.php?Id_emple=<?php echo $fila['Id_empleado']; ?>"><button class="btn btn-primary" title="Editar"><i class="align-middle" data-feather="edit"></i></button></a>
                                                <a href="../../conexiones/eliminar.php?Id_emple=<?php echo $fila['Id_empleado']; ?>"><button class="btn btn-danger" title="Eliminar"><i class="align-middle" data-feather="trash-2"></i></button></a>
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
<?php include('asset/footer.php'); ?>
<script src="asset/js/empleados.js"></script>