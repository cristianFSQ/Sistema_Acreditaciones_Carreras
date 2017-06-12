<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Sistema de Acreditaci&oacute;n de Carreras</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link href="public/css/myStyle.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <nav class="navbar navbar-default"> 
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>                        
                    </button>
                    <a class="navbar-brand" href="#">Sistema Acreditacion de Carreras</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#">Inicio</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container" style="height: 750%  ;">
            <div class="col-lg-12" style="margin-bottom: 95px;">
                <h3>Consulta de Indicadores por Categoria</h3>
            </div>
            <div class="container col-lg-12" style="margin-bottom: 100px;">
                <div class="col-lg-4 col-md-4">
                    <a href="#"><img src="public/img/icon-estudiantes.png" alt=""/></a>
                    <p>Alumnos</p>
                </div>
                <div class="col-lg-4 col-md-4">
                    <a href="situacion.php" id="docentes"><img src="public/img/icon-docente.png" alt=""/></a>
                    <p>Docentes</p>
                </div>
                <div class="col-lg-4 col-md-4">
                    <a href="#"><img src="public/img/icono-carrera.png" alt=""/></a>
                    <p>Carreras</p>
                </div>
            </div>
            <footer class="col-lg-12" style="background-color: grey; height: 50px;"><h5>Powered by ROS 2017</h5></footer>  
        </div>
        
        

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
    </body>
</html>
