<?php include('../../conexiones/conexion.php');
$sql = "SELECT * FROM tbl_config";
$resultado = mysqli_query($conexion, $sql);
?>
<?php include('asset/header.php') ?>
<main class="content">
    <div class="container-fluid p-0">
        <h1 class="h3 mb-3">Configuracion</h1>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h1 class="h3 mb-3">Listado de impuestos</h1>
                        <table class="table table-striped table-hover my-0">
                            <thead>
                                <tr>
                                    <th class="">Descripcion</th>
                                    <th class="">Valor</th>
                                    <th class="">Estado</th>
                                    <th class="">Acciones</th>
                                </tr>
                            </thead>
                            <tbody id="body_table">
                                <?php while ($fila = mysqli_fetch_assoc($resultado)) { ?>
                                    <tr>
                                        <td class=""><?php echo $fila['Descripcion'] ?></td>
                                        <td class=""><?php echo $fila['Valor'] ?></td>
                                        <?php
                                        if ($fila['Estado'] == 'Activo') {
                                            echo '<td class=""><span class="badge bg-success">' . $fila['Estado'] . '</span></td>';
                                        } else if ($fila['Estado'] == 'Inactivo') {
                                            echo '<td class=""><span class="badge bg-danger">' . $fila['Estado'] . '</span></td>';
                                        };
                                        ?>
                                        <td class="">
                                            <div class="d-flex gap-1">
                                                <button class="btn btn-primary" title="Editar" onclick="editar('<?php echo $fila['Descripcion'] ?>', <?php echo $fila['Id_configuracion'] ?>)"><i class="align-middle" data-feather="edit"></i></button>
                                                <button class="btn btn-danger" title="Eliminar" onclick="eliminar()"><i class="align-middle" data-feather="trash-2"></i></button>
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