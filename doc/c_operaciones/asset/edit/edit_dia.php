<?php include('../../../../conexiones/conexion.php');
if (isset($_GET['Id_ope'])) {
    $id = $_GET['Id_ope'];
    $sql = "SELECT Id_operacion, tbl_empleados.Id_empleado, Nombre, Peso, Canasto FROM `tbl_operaciones`, `tbl_empleados` WHERE tbl_operaciones.Id_empleado = tbl_empleados.Id_empleado AND Id_operacion = $id";
    $resultado = mysqli_query($conexion, $sql);
    $fila = mysqli_fetch_assoc($resultado);
}
?>
<?php include('asset/header.php'); ?>
<main class="content">
    <div class="container-fluid p-0">
        <h1 class="h3 mb-3">Operaciones</h1>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body d-grid">
                        <h1 class="h3 mb-3">Editar</h1>
                        <form action="../../../../conexiones/editar.php?reporte_dia=<?php echo $fila['Id_operacion']?>" method="post">
                            <div class="row">
                                <div class="d-flex flex-column col-md-4">
                                    <label for="nombre" class="form-label">Nombre</label>
                                    <input type="text" name="nomcod" class="form-control" placeholder="Nombre" value="<?php echo $fila['Nombre']?>" disabled>
                                </div>
                                <div class="d-flex flex-column col-md-3">
                                    <label for="peso" class="form-label">Peso</label>
                                    <input type="number" name="peso" class="form-control" placeholder="Insertar peso" value="<?php echo $fila['Peso']?>" required>
                                </div>
                                <div class="d-flex flex-column col-md-3">
                                    <label for="canasto" class="form-label">Canasto</label>
                                    <input type="number" name="canasto" class="form-control" placeholder="Insertar canasto" value="<?php echo $fila['Canasto']?>" required>
                                </div>
                                <div class="d-flex flex-column justify-content-end col-md-2 mt-3">
                                    <input type="submit" class="btn btn-success" value="Insertar">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php include('asset/footer.php') ?>