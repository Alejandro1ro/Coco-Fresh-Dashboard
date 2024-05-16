<?php include('../../conexiones/conexion.php');
    $empleados = "SELECT COUNT(Id_empleado) AS Empleados FROM tbl_empleados WHERE Estado = 'Activo'";
    $resulEmple = mysqli_query($conexion, $empleados);
    $filaEmple = mysqli_fetch_assoc($resulEmple);

    $sumT = "SELECT (SUM(Peso)-(SUM(Canasto)*3.5)) AS PesoT, SUM(Canasto) AS CanastosT FROM `tbl_operaciones` WHERE Estado = 'Activo'";
    $resulSumT = mysqli_query($conexion, $sumT);
    $filaSumT = mysqli_fetch_assoc($resulSumT);
?>
<?php include('asset/header.php') ?>
<main class="content">
    <div class="container-fluid p-0">
        <h1 class="h3 mb-3"><strong>Estadisticas</strong> por mes</h1>

        <div class="row">
            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-9 mt-0">
                                    <h5 class="card-title">Ventas</h5>
                                </div>

                                <div class="col-3 ps-0">
                                    <div class="stat text-primary">
                                        <i class="align-middle" data-feather="truck"></i>
                                    </div>
                                </div>
                            </div>
                            <h1 class="mt-1 mb-3">0</h1>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-9 mt-0">
                                    <h5 class="card-title">Empleados</h5>
                                </div>

                                <div class="col-3 ps-0">
                                    <div class="stat text-primary">
                                        <i class="align-middle" data-feather="users"></i>
                                    </div>
                                </div>
                            </div>
                            <h1 class="mt-1 mb-3"><?php echo $filaEmple['Empleados'] ?></h1>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-9 mt-0">
                                    <h5 class="card-title">Peso T.</h5>
                                </div>

                                <div class="col-3 ps-0">
                                    <div class="stat text-primary">
                                        <i class="align-middle" data-feather="dollar-sign"></i>
                                    </div>
                                </div>
                            </div>
                            <h1 class="mt-1 mb-3"><?php echo $filaSumT['PesoT'] ?></h1>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-9 mt-0">
                                    <h5 class="card-title">Canasto T.</h5>
                                </div>

                                <div class="col-3 ps-0">
                                    <div class="stat text-primary">
                                        <i class="align-middle" data-feather="package"></i>
                                    </div>
                                </div>
                            </div>
                            <h1 class="mt-1 mb-3"><?php echo $filaSumT['CanastosT'] ?></h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card flex-fill w-100">
                        <div class="card-header">
                            <h5 class="card-title">Ganacias totales</h5>
                            <h6 class="card-subtitle text-muted">Estadisticas por meses de las ganancias totales</h6>
                        </div>
                        <div class="card-body">
                            <div class="chart">
                                <canvas id="chartjs-line"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--
            <div class="row">
                <div class="row">
                    <div class="col-12">
                        <div class="d-flex">
                            <div class="card flex-fill">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Tabla</h5>
                                </div>
                                <table class="table table-striped table-hover my-0">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th class="d-none d-xl-table-cell">Start Date</th>
                                            <th class="d-none d-xl-table-cell">End Date</th>
                                            <th>Status</th>
                                            <th class="d-none d-md-table-cell">Assignee</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Project Apollo</td>
                                            <td class="d-none d-xl-table-cell">01/01/2021</td>
                                            <td class="d-none d-xl-table-cell">31/06/2021</td>
                                            <td><span class="badge bg-success">Done</span></td>
                                           <td class="d-none d-md-table-cell">Vanessa Tucker</td>
                                        </tr>
                                        <tr>
                                            <td>Project Fireball</td>
                                            <td class="d-none d-xl-table-cell">01/01/2021</td>
                                            <td class="d-none d-xl-table-cell">31/06/2021</td>
                                            <td><span class="badge bg-danger">Cancelled</span></td>
                                            <td class="d-none d-md-table-cell">William Harris</td>
                                        </tr>
                                        <tr>
                                            <td>Project Nitro</td>
                                            <td class="d-none d-xl-table-cell">01/01/2021</td>
                                            <td class="d-none d-xl-table-cell">31/06/2021</td>
                                            <td><span class="badge bg-warning">In progress</span></td>
                                            <td class="d-none d-md-table-cell">Vanessa Tucker</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        -->
    </div>
</main>
<?php 
    $estad = "SELECT (SUM(Peso)-(SUM(Canasto)*3.5)) AS PesoT, SUM(Canasto) AS CanastosT FROM `tbl_operaciones` WHERE Estado = 'Activo' AND fecha LIKE '2023-06'";
    $resulEstad = mysqli_query($conexion, $sumT);
    $filaEstad = mysqli_fetch_assoc($resulEstad);
?>
<?php include('asset/footer.php') ?>