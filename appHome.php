<?php  session_start();?>
<!DOCTYPE html>
<html>
    <head>
        <title>Sistema de Acreditaci&oacute;n de Carreras</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link href="public/css/myStyle.css" rel="stylesheet" type="text/css"/>
    </head>
    <body style="background-color: #c4e3f3;">
        <nav class="navbar navbar-default"> 
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>                        
                    </button>
                    <a class="navbar-brand" href="#">Sistema de Acreditaci&oacute;n de Carreras</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#">Inicio</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#"><span class="glyphicon"></span><?php echo $_SESSION["ses_nombre"];?></a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container" style="height: 615px; background-color: #66afe9; margin-top: -20px;">
            <div class="container col-lg-12"  style="text-align: center;">
                <div>
                    <h3>Consulta de Indicadores por Categoria</h3>
                </div>
                <div class="col-lg-4 col-md-4">
                    <a href="Docentes.php"><img src="public/img/icon-estudiantes.png" alt=""/></a>
                    <h2>Alumnos</h2>
                </div>
                <div class="col-lg-4 col-md-4">
                    <a href="situacion.php" id="docentes"><img src="public/img/icon-docente.png" alt=""/></a>
                    <h2>Docentes</h2>
                </div>
                <div class="col-lg-4 col-md-4">
                    <a href="#"><img src="public/img/icono-carrera.png" alt=""/></a>
                    <h2>Carreras</h2>
                </div>
            </div>
            <footer><h5>Powered by ROS 2017</h5></footer> 
        </div>



        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 

    </body>
</html>
