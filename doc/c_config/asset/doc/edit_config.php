<?php include('../../../../conexiones/conexion.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $valor = $_GET['valor'];
    $sql = "UPDATE tbl_config SET Valor = $valor WHERE `tbl_config`.`Id_configuracion` = $id";
    $resultado = mysqli_query($conexion, $sql);
}

$sql = "SELECT * FROM tbl_config";
$resultado = mysqli_query($conexion, $sql);
?>

<?php while ($fila = mysqli_fetch_assoc($resultado)) { ?>
    <tr>
        <td class="">Precio por <?php echo $fila['Descripcion'] ?></td>
        <td class=""><?php echo $fila['Valor'] ?></td>
        <?php
        if ($fila['Estado'] == 'Activo') {
            echo '<td class=""><span class="badge bg-success">' . $fila['Estado'] . '</span></td>';
        } else if ($fila['Estado'] == 'Inactivo') {
            echo '<td class=""><span class="badge bg-danger">' . $fila['Estado'] . '</span></td>';
        };
        ?>
        <td class="">
            <button class="btn btn-primary" title="Editar" onclick="editar('<?php echo $fila['Descripcion'] ?>', <?php echo $fila['Id_configuracion'] ?>)"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit align-middle"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg></button>
            <button class="btn btn-danger" title="Eliminar"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 align-middle"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></button>
        </td>
    </tr>
    
<?php } ?>