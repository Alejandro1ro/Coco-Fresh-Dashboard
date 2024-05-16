<?php include ('conexion.php')?>
<?php 
    session_start();
    if(isset($_POST)){
        $usuario = $_POST['usuario'];
        $contraseña = $_POST['contraseña'];

        $sql = "SELECT * FROM tbl_cuentas WHERE Usuario LIKE '$usuario' AND Contraseña LIKE '$contraseña';";
        $resultado = mysqli_query($conexion, $sql);

        if(mysqli_num_rows($resultado) > 0){
            $_SESSION['supervisor'] = $usuario;
            header ('Location: ../doc/c_estadisticas/estadisticas.php');
        }else{
            header ('Location: ../index.php');
        }
    }
?>