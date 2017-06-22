<?php
include 'ClaseConexion.php';

if (isset($_POST["usuario"])) {
    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];
    $consulta = "SELECT usuario, clave FROM usuarios WHERE usuario='$usuario' and clave='$clave'";
    $tipo_administrador = "SELECT tipo FROM usuarios WHERE tipo='administrador'";
    $resultado = mysqli_query($conexion, $consulta);
    $filas = mysqli_num_rows($resultado);
    if ($filas > 0) {
        header("location:appHome.php");
    } else {
        echo '<script>
            alert("El usuario con el que intento ingresar no se encuentra registrado.");
            window.history.go(-1);
            </script>';
        exit;
        //echo("El usuario con el que intento ingresar no se encuentra registrado. Intentelo nuevamente cuando tenga certeza de su registro");
    }
    mysqli_free_result($resultado);
    mysqli_close($conexion);
}
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <title>Sistema de Acreditaci&oacute;n</title>
    </head>
    <body style="background-color: #c4e3f3;">
        <!-- barra de navegacion -->
        <nav class="navbar navbar-default"> 
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">Sistema Acreditacion</a>
                </div>
            </div>
        </nav>

        <!-- Contenedores -->

        <div class="container" style="height: 615px; background-color: #66afe9; margin-top: -20px;">
            <div class="col-lg-12" style=" border: 1px black solid;"    >
                <h2 style="text-align: center;">Sistema de Acreditaci&oacute;n &Aacute;rea Inform&aacute;tica</h2>
            </div>
            <div class="col-lg-12" style=" border: 1px black solid; margin-top: 2%;">
                <div class="col-lg-4"></div>
                <div class="formulario_login col-lg-4">
                    <form action="index.php" method="post">
                        <h2>Login</h2>
                        <div class="form-group">
                           
                            <input id="usuario" class="form-control" type="text" placeholder="&#128272; Usuario" name="usuario"> 
                        </div>
                        <div class="form-group">
                           
                            <input id="password" class="form-control" type="password" placeholder="&#128272; Contraseña" name="clave"> 
                        </div>
                        <div class="form-group">
                            <button class="btn btn-default" type="submit">Ingresar</button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-4"></div>
            </div>
        </div>

        <!-- --------------------------------------------------------------------------- -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
    </body>
</html>
