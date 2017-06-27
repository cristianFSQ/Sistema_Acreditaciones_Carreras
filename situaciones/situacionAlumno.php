<?php
session_start();
include '../ClaseConexion.php';

$resTotal = $conexion->query("SELECT * FROM alumnos");
$cnt = $resTotal->num_rows;

$resSi = $conexion->query("SELECT * FROM alumnos WHERE ALM_CREDITO_AVAL='si'");
$cntSi = $resSi->num_rows;
$totalSi = $cntSi * 100 / $cnt;

$resNo = $conexion->query("SELECT * FROM alumnos WHERE ALM_CREDITO_AVAL='no'");
$cntNo = $resNo->num_rows;
$totalNo = $cntNo * 100 / $cnt;

while ($filaSi = $resSi->fetch_array(MYSQLI_BOTH)) {
    $Si = "{ name:'" . $filaSi['ALM_CREDITO_AVAL'] . "',y:" . $totalSi . "},";
}

while ($filaNo = $resNo->fetch_array(MYSQLI_BOTH)) {
    $No = "{ name:'" . $filaNo['ALM_CREDITO_AVAL'] . "',y:" . $totalNo . "},";
}

$resTotale = $conexion->query("SELECT * FROM alumnos");
$cnte = $resTotale->num_rows;

$resSie = $conexion->query("SELECT * FROM alumnos WHERE ALM_SITUACION='egresado'");
$cntSie = $resSie->num_rows;
$totalSie = $cntSie * 100 / $cnte;

$resNoe = $conexion->query("SELECT * FROM alumnos WHERE ALM_SITUACION='estudiante'");
$cntNoe = $resNoe->num_rows;
$totalNoe = $cntNoe * 100 / $cnte;

$resCongeladoe = $conexion->query("SELECT * FROM alumnos WHERE ALM_SITUACION='congelado'");
$cntCongeladoe = $resCongeladoe->num_rows;
$totalCongeladoe = $cntCongeladoe * 100 / $cnte;

while ($filaSie = $resSie->fetch_array(MYSQLI_BOTH)) {
    $Sie = "{ name:'" . $filaSie['ALM_SITUACION'] . "',y:" . $totalSie . "},";
}

while ($filaNoe = $resNoe->fetch_array(MYSQLI_BOTH)) {
    $Noe = "{ name:'" . $filaNoe['ALM_SITUACION'] . "',y:" . $totalNoe . "},";
}

while ($filaCongeladoe = $resCongeladoe->fetch_array(MYSQLI_BOTH)) {
    $Congeladoe = "{ name:'" . $filaCongeladoe['ALM_SITUACION'] . "',y:" . $totalCongeladoe . "},";
}
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <link href="../public/css/bootstrap.min.css" rel="stylesheet" type="text/css"/> 
        <link href="../public/css/situacion.css" rel="stylesheet" type="text/css"/>
        <title>Indicadores Alumnos</title>
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
                    <a class="navbar-brand" href="../appHome.php">Sistema de Acreditaci&oacute;n de Carreras</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                        <li ><a href="../situaciones/situacionAlumno.php">Alumnos</a></li>
                        <li ><a href="../situaciones/situacionDocente.php">Docentes</a></li>
                        <li ><a href="../situaciones/situacionCarrera.php">Carreras</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $_SESSION["ses_nombre"]; ?><span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="../cerrarsesion.php">Cerrar Sesion
                                        <?php
                                        if (!empty($_SESSION["nombre_usuario"])) {
                                            $_SESSION["ses_nombre"];
                                        }
                                        ?>  
                                    </a> 
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container" style="min-height: 575px; background-color: #66afe9; margin-top: -20px;"> <!-- cuerpo de indicadores generales-->
            <div>
                <h1>Indicadores Alumnos</h1>
            </div>
            <!-- panel collapse postgrado -->
            <div id="accordion" class="panel-group col-lg-12">
            
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#contaner1">Alumnos con Credito Aval del Estado</a>
                        </h4>
                    </div>
                    <div class="panel-body panel-collapse collapse in" id="contaner1">
                        <div class="panel-body col-lg-6" id="contenedor1"></div>
                        <div class="col-lg-6">
                            <table style="margin-left: 25%; margin-top: 25%;">
                                <tr>
                                    <td style="min-width: 200px;">d</td>
                                    <td style="background-color: red; border-radius: 50px; padding: 5px; width: 50px;"></td>
                                </tr>
                                <tr>
                                    <td style="min-width: 200px;">a</td>
                                    <td style="background-color: orange; border-radius: 50px; padding: 5px;"></td>
                                </tr>
                                <tr>
                                    <td style="min-width: 200px;">a</td>
                                    <td style="background-color: green; border-radius: 50px; padding: 5px;"></td>
                                </tr>
                            </table>
                        </div>
                       
                    </div>
                </div>
            
            <!-- panel collapse capacitacion -->

           
               
            
            <!-- panel collapse evaluacion -->

            
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#contaner3">Situaciones de los Alumnos</a>
                        </h4>
                    </div>
                    <div class="panel-body panel-collapse collapse" id="contaner3">
                        <div class="panel-body col-lg-6" id="contenedor3"></div>
                        <div class="col-lg-6">
                            <table style="margin-left: 25%; margin-top: 25%;">
                                <tr>
                                    <td style="min-width: 200px;">d</td>
                                    <td style="background-color: red; border-radius: 50px; padding: 5px; width: 50px;"></td>
                                </tr>
                                <tr>
                                    <td style="min-width: 200px;">a</td>
                                    <td style="background-color: orange; border-radius: 50px; padding: 5px;"></td>
                                </tr>
                                <tr>
                                    <td style="min-width: 200px;">a</td>
                                    <td style="background-color: green; border-radius: 50px; padding: 5px;"></td>
                                </tr>
                            </table>
                        </div>
                        
                    </div>
                </div>
            
        </div>
      </div>

        <footer><h5 style="text-align: center; font-weight: bold;">Powered by ROS 2017</h5></footer> 

    <script src="../public/js/jquery.min.js" type="text/javascript"></script>
    <script src="../public/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="../public/code/highcharts.js" type="text/javascript"></script>
    <script src="../public/code/highcharts-3d.js" type="text/javascript"></script>
    <script src="../public/code/modules/exporting.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(function () {
            $('#contenedor1').highcharts({
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false
                },
                title: {
                    text: 'Indicador de Porcentaje de Alumnos con Credito Aval del Estado'
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                            style: {
                                color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                            }
                        }
                    }
                },
                series: [{
                        type: 'pie',
                        name: 'Porcentaje Porcentaje Alumnos con Credito Aval del Estado',
                        data: [
<?php
echo $Si;
echo $No;
?>

                        ]
                    }]
            });
        });

        
        $(function () {
            $('#contenedor3').highcharts({
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false
                },
                title: {
                    text: 'Indicador de Porcentaje de Situaciones de Alumnos'
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                            style: {
                                color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                            }
                        }
                    }
                },
                series: [{
                        type: 'pie',
                        name: 'Porcentaje de las situaciones de Alumnos',
                        data: [
<?php
echo $Sie;
echo $Noe;
echo $Congeladoe;
?>

                        ]
                    }]
            });
        });
        
    </script>

</body>
</html>
