<?php include('../../../conexiones/conexion.php');
$id = $_GET['Id'];
$sql = "SELECT * FROM `tbl_prestamos` WHERE Id_empleado = $id AND Estado = 'Activo' ORDER BY Fecha DESC;";
$resultado = mysqli_query($conexion, $sql);

$sqld = "SELECT SUM(Prestamo) As Prestamo FROM `tbl_prestamos` WHERE Id_empleado = $id AND Pago = 0 AND Estado = 'Activo';";
$resultadod = mysqli_query($conexion, $sqld);
$filad = mysqli_fetch_assoc($resultadod);
?>

<?php include('asset/header.php') ?>
<main class="content" id="contenedor">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body d-flex flex-column">
                        <div class="row mb-4">
                            <div class="d-flex justify-content-start align-items-start col-sm-6">
                                <i class="align-middle me-1 text-secondary cursor-pointer" onclick="atras()" style="width: 27px;height: 27px;" data-feather="corner-up-left"></i>
                                <?php if (isset($_GET['Nombre'])) { ?>
                                    <h1 class="h2 mb-3"><?php echo $_GET['Nombre'] ?></h1>
                                <?php } ?>
                            </div>
                            <div class="d-flex justify-content-end align-items-start col-sm-6">
                                <button class="btn btn-success" onclick="credito(<?php echo $_GET['Id'] ?>, <?php echo $filad['Prestamo']?>)">Agregar prestamo</button>
                            </div>
                        </div>
                        <table id="example" class="table table-striped table-hover my-0">
                            <thead>
                                <tr>
                                    <th class="">Prestamo</th>
                                    <th class="">Pago</th>
                                    <th class="">Fecha</th>
                                    <th class="">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $id1 = 0; 
                                    $id2 = 0;  
                                    while ($fila = mysqli_fetch_assoc($resultado)) { 
                                ?>
                                    <tr>
                                        <td class=""><?php echo $fila['Prestamo']; ?></td>
                                        <td class="">
                                            <?php if ($fila['Pago'] == 1) { ?>
                                                <input type="checkbox" id="check1" onclick="pago1(<?php echo $fila['Id_prestamo']?>,<?php echo $id1++?>)" class="form-check-input" checked>
                                            <?php } else { ?>
                                                <input type="checkbox" id="check2" onclick="pago2(<?php echo $fila['Id_prestamo']?>,<?php echo $id2++?>)" class="form-check-input">
                                            <?php } ?>
                                        </td>
                                        <td class=""><?php echo $fila['Fecha']; ?></td>
                                        <td class="">
                                            <a href="asset/edit/edit_pres.php?<?php echo 'Id='.$_GET['Id'].'&Id_pres='.$fila['Id_prestamo'].'&Nombre='.$_GET['Nombre'].'&Prestamo='.$fila['Prestamo'].'&Fecha='.$fila['Fecha']?>"><button class="btn btn-primary" title="Editar"><i class="align-middle" data-feather="edit"></i></button></a>
                                            <a href="../../../conexiones/eliminar.php?Id_pres=<?php echo $fila['Id_prestamo'].'&Id='.$fila['Id_empleado'].'&Nombre='.$_GET['Nombre'] ?>"><button class="btn btn-danger" title="Eliminar"><i class="align-middle" data-feather="trash-2"></i></button></a>
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
<script src="asset/js/pago.js"></script>
<script src="asset/js/prestamo.js"></script>