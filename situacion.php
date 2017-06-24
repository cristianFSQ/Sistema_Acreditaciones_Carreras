<?php
session_start();
include 'ClaseConexion.php';

//CONSULTAS A LA BD

$resTotal = $conexion->query("SELECT * FROM docente");
$cnt = $resTotal->num_rows;

$resSi = $conexion->query("SELECT * FROM docente WHERE DCT_POSTGRADO='si'");
$cntSi = $resSi->num_rows;
$totalSi = $cntSi * 100 / $cnt;

$resNo = $conexion->query("SELECT * FROM docente WHERE DCT_POSTGRADO='no'");
$cntNo = $resNo->num_rows;
$totalNo = $cntNo * 100 / $cnt;

while ($filaSi = $resSi->fetch_array(MYSQLI_BOTH)) {
    $Si = "{ name:'" . $filaSi['DCT_POSTGRADO'] . "',y:" . $totalSi . "},";
}

while ($filaNo = $resNo->fetch_array(MYSQLI_BOTH)) {
    $No = "{ name:'" . $filaNo['DCT_POSTGRADO'] . "',y:" . $totalNo . "},";
}
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <link href="public/css/bootstrap.min.css" rel="stylesheet" type="text/css"/> 
        <link href="public/css/situacion.css" rel="stylesheet" type="text/css"/>


        <title>Situacion General Actual</title>
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
                    <a class="navbar-brand" href="appHome.php">Sistema de Acreditaci&oacute;n de Carreras</a>
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
        <div class="container" style="height: 615px; background-color: #66afe9; margin-top: -20px;"> <!-- cuerpo de indicadores generales-->
            <div>
                <h1>Indicadores Docente</h1>
            </div>
            <!-- panel collapse postgrado -->

            <div class="panel-group col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" href="#contaner1">Docente con Postgrado</a>
                        </h4>
                    </div>
                    <div class="panel-body" id="contaner1">
                        <div class="panel-body col-lg-4" id="contenedor1"></div>
                        <div class="col-lg-4"></div>
                        <div class="col-lg-4"></div>
                    </div>
                </div>
            </div>
            <!-- panel collapse capacitacion -->
            
            <div class="panel-group col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" href="#contaner2">Docente con Capacitaciones</a>
                        </h4>
                    </div>
                    <div class="panel-body" id="contaner2">
                        <div class="col-lg-4" id="contenedor2"></div>
                        <div class="col-lg-4"></div>
                        <div class="col-lg-4"></div>
                    </div>
                </div>
            </div>
            <!-- panel collapse evaluacion -->
            
            <div class="panel-group col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" href="#contaner3">Resultados de evaluaci&oacute;n docente</a>
                        </h4>
                    </div>
                    <div class="panel-body" id="contaner3">
                        <div class="col-lg-4" id="contenedor3"></div>
                        <div class="col-lg-4"></div>
                        <div class="col-lg-4"></div>
                    </div>
                </div>
            </div>
        </div>


        <footer><h5>Powered by ROS 2017</h5></footer> 
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script> 
    <script type="text/javascript">
        $(function () {
            $('#contenedor1').highcharts({
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false
                },
                title: {
                    text: null
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
                                color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'blue'
                            }
                        }
                    }
                },
                series: [{
                        type: 'pie',
                        name: 'Porcentaje Postgrado',
                        data: [
<?php
echo $Si;
echo $No;
?>

                        ]
                    }]
            });
        });

    </script>

</body>
</html>
