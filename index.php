<?php include('conexiones/conexion.php'); ?>
<?php include('assets/header.php') ?>
<main class="d-flex w-100" id="sistema">
    <div class="container d-flex flex-column">
        <div class="row vh-100">
            <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
                <div class="d-table-cell align-middle">
                    <div class="text-center mt-4">
                        <h1 class="h2">BIENVENIDO</h1>
                        <p class="lead">Para continuar inicie sesion</p>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="m-sm-4">
                                <div class="text-center">
                                    <img src="static/img/avatars/usuario2.png" alt="Charles Hall" class="img-fluid rounded-circle" width="132" height="132" />
                                </div>
                                <form action="conexiones/sesion.php" method="post">
                                    <div class="mb-3">
                                        <label class="form-label">Usuario</label>
                                        <input class="form-control form-control-lg" type="text" name="usuario" placeholder="Ingrese su usuario" />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Contraseña</label>
                                        <input class="form-control form-control-lg" type="password" name="contraseña" placeholder="Ingrese su contraseña" />
                                        <small class="d-flex justify-content-between">
                                            <a href="#" class="ms-3 mt-1">Terminos</a>  
                                            <a href="#" class="me-3 mt-1">Privacidad</a>
                                        </small>
                                    </div>
                                    <div class="text-center mt-3">
                                        <input type="submit" class="btn btn-lg btn-primary" value="Iniciar sesion">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php include('assets/footer.php') ?>