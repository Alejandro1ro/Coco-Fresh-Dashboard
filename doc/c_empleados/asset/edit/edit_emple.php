<?php include('../../../../conexiones/conexion.php');
if (isset($_GET['Id_emple'])) {
    $id = $_GET['Id_emple'];
    $sql = "SELECT * FROM `tbl_empleados` WHERE Id_empleado = $id";
    $resultado = mysqli_query($conexion, $sql);
    $fila = mysqli_fetch_assoc($resultado);
}
?>
<?php include('asset/header.php') ?>
<main class="content">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body d-grid">
                        <h1 class="h3 mb-3">Editar registro</h1>
                        <form action="../../../../conexiones/editar.php?empleados=<?php echo $fila['Id_empleado'] ?>" method="post">
                            <div class="row">
                                <div class="d-flex flex-column align-items-start col-md-3">
                                    <label for="codigo" class="form-label">Codigo</label>
                                    <input type="number" class="form-control" value="<?php echo $_GET['Id_emple'] ?>" disabled>
                                </div>
                                <div class="d-flex flex-column align-items-start col-md-3">
                                    <label for="nombre" class="form-label">Nombre</label>
                                    <input type="text" name="nombre" class="form-control" placeholder="Introducir nombre" value="<?php echo $fila['Nombre'] ?>">
                                </div>
                                <div class="d-flex flex-column align-items-start col-md-3">
                                    <label for="apellido" class="form-label">Apellido</label>
                                    <input type="text" name="apellido" class="form-control" placeholder="Introducir apellido" value="<?php echo $fila['Apellido'] ?>">
                                </div>
                                <div class="d-flex flex-column align-items-start col-md-3">
                                    <label for="estado" class="form-label">Estado</label>
                                    <select class="form-control" name="estado">
                                        <option value="<?php echo $fila['Estado'] ?>">-- Seleccionar estado --</option>
                                        <option value="Activo">Activo</option>
                                        <option value="Inactivo">Inactivo</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="d-flex flex-column col-12 mt-3">
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