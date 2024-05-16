<?php session_start();
if (!isset($_SESSION['supervisor'])) {
    Header("Location: ../../index.php");
}

if (isset($_GET['desconectar'])) {
    session_destroy();
    Header("Location: ../../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link rel="shortcut icon" href="../../static/img/icons/favicon.png" />

    <link rel="stylesheet" href="../../src/package/dist/sweetalert2.css">

    <title>Coco Fresh</title>

    <link href="../../static/css/app.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet" />
</head>

<body>
    <div class="wrapper">
        <nav id="sidebar" class="sidebar js-sidebar">
            <div class="sidebar-content js-simplebar">
                <a class="sidebar-brand" href="../c_estadisticas/estadisticas.php">
                    <span class="align-middle font-system-ui">ADMINISTRACION</span>
                </a>

                <ul class="sidebar-nav">
                    <li class="sidebar-header">Menu</li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="../c_estadisticas/estadisticas.php" style="background: #222e3c !important;">
                            <i class="align-middle" data-feather="sliders"></i>
                            <span class="align-middle">Estadistica</span>
                        </a>
                    </li>

                    <li class="sidebar-item" id="operaciones">
                        <a class="sidebar-link index-2" style="background: #222e3c;">
                            <i class="align-middle" data-feather="book"></i>
                            <span class="align-middle">Operaciones</span>
                        </a>
                        <ul class="sidebar-nav">
                            <li class="sidebar-item sidebar-item-sub" id="report_ope">
                                <a class="sidebar-link sidebar-primary text-black bg-white index-1" href="../c_operaciones/reporte_dia.php">
                                    <i class="align-middle me-1 text-black" data-feather="sunrise"></i>
                                    <span class="align-middle">Reporte del dia</span>
                                </a>
                            </li>
                            <li class="sidebar-item sidebar-item-sub" id="report_ope">
                                <a class="sidebar-link sidebar-primary text-black bg-white" href="../c_operaciones/reporte_general.php">
                                    <i class="align-middle me-1 text-black" data-feather="activity"></i>
                                    <span class="align-middle">Reporte general</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-item" id="empleados">
                        <a class="sidebar-link index-2" style="background: #222e3c;">
                            <i class="align-middle" data-feather="user"></i>
                            <span class="align-middle">Empleados</span>
                        </a>
                        <ul class="sidebar-nav">
                            <li class="sidebar-item sidebar-item-sub" id="report_emp">
                                <a class="sidebar-link sidebar-primary text-black bg-white index-1" href="../c_empleados/empleados.php">
                                    <i class="align-middle me-1 text-black" data-feather="users"></i>
                                    <span class="align-middle">Lista de empleados</span>
                                </a>
                            </li>
                            <li class="sidebar-item sidebar-item-sub" id="report_emp">
                                <a class="sidebar-link sidebar-primary text-black bg-white" href="../c_empleados/nomina.php">
                                    <i class="align-middle me-1 text-black" data-feather="credit-card"></i>
                                    <span class="align-middle">Nomina</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-item active">
                        <a class="sidebar-link" href="config.php" style="background: #222e3c !important;">
                            <i class="align-middle" data-feather="settings"></i>
                            <span class="align-middle">Configuracion</span>
                        </a>
                    </li>

                    <!--
                        <li class="sidebar-header">Componentes</li>

                        <li class="sidebar-item">
                            <a class="sidebar-link" href="static/ui-buttons.html">
                                <i class="align-middle" data-feather="square"></i>
                                <span class="align-middle">Buttons</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link" href="static/ui-forms.html">
                                <i class="align-middle" data-feather="check-square"></i>
                                <span class="align-middle">Forms</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link" href="static/ui-cards.html">
                                <i class="align-middle" data-feather="grid"></i> <span class="align-middle">Cards</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link" href="static/ui-typography.html">
                                <i class="align-middle" data-feather="align-left"></i>
                                <span class="align-middle">Typography</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link" href="static/icons-feather.html">
                                <i class="align-middle" data-feather="coffee"></i>
                                <span class="align-middle">Icons</span>
                            </a>
                        </li>

						<li class="sidebar-item">
                            <a class="sidebar-link" href="static/charts-chartjs.html">
                                <i class="align-middle" data-feather="bar-chart-2"></i>
                                <span class="align-middle">Charts</span>
                            </a>
                        </li>

                        <li class="sidebar-item active">
							<div class="dropdown">
								<a class="sidebar-link" href="index.php" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
									<i class="align-middle" data-feather="sliders"></i>
									<span class="align-middle">Prueba</span>
								</a>
								<ul class="dropdown-menu dropdown-menu-dark drop" aria-labelledby="dropdownMenuButton2">
									<li><a class="dropdown-item active" href="#">Action</a></li>
									<li><a class="dropdown-item" href="#">Another action</a></li>
									<li><a class="dropdown-item" href="#">Something else here</a></li>
								</ul>
							</div>
						</li>
                    -->
                </ul>
            </div>
        </nav>

        <div class="main">
            <nav class="navbar navbar-expand navbar-light navbar-bg">
                <a class="sidebar-toggle js-sidebar-toggle">
                    <i class="hamburger align-self-center"></i>
                </a>

                <div class="navbar-collapse collapse">
                    <ul class="navbar-nav navbar-align">
                        <li class="nav-item dropdown">
                            <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                                <i class="align-middle" data-feather="settings"></i>
                            </a>

                            <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                                <img src="../../static/img/avatars/usuario2.png" class="img-fluid rounded me-1" style="width: 30px;" alt="Usuario" />
                                <span class="text-dark text-capitalize">
                                    <?php
                                    if (isset($_SESSION['supervisor'])) {
                                        echo $_SESSION['supervisor'];
                                    }
                                    ?>
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end pb-0">
                                <a class="dropdown-item" href="static/pages-profile.html"><i class="align-middle me-1" data-feather="user"></i> Perfil</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="index.html"><i class="align-middle me-1" data-feather="settings"></i> Configuracion</a>
                                <div class="dropdown-divider mb-0"></div>
                                <form action="?desconectar" method="post">
                                    <input type="submit" class="dropdown-item text-center py-2" value="Desconectar">
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>