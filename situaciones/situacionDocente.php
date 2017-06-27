<?php
session_start();
include '../ClaseConexion.php';

//CONSULTAS A LA BD DOCENTE CON POSTGRADO

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

$resTotalE = $conexion->query("SELECT * FROM docente");
$cntE = $resTotalE->num_rows;

$resSiE = $conexion->query("SELECT * FROM docente WHERE DCT_PORCENTAJE_ED>='75'");
$cntSiE = $resSiE->num_rows;
$totalSiE = $cntSiE * 100 / $cntE;

$resNoE = $conexion->query("SELECT * FROM docente WHERE DCT_PORCENTAJE_ED<'75'");
$cntNoE = $resNoE->num_rows;
$totalNoE = $cntNoE * 100 / $cntE;

while ($filaSiE = $resSiE->fetch_array(MYSQLI_BOTH)) {
    $SiE = "{ name:'" . $filaSiE['DCT_PORCENTAJE_ED'] . "',y:" . $totalSiE . "},";
}

while ($filaNoE = $resNoE->fetch_array(MYSQLI_BOTH)) {
    $NoE = "{ name:'" . $filaNoE['DCT_PORCENTAJE_ED'] . "',y:" . $totalNoE . "},";
}
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <link href="../public/css/bootstrap.min.css" rel="stylesheet" type="text/css"/> 
        <link href="../public/css/situacion.css" rel="stylesheet" type="text/css"/>
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
                    <a class="navbar-brand" href="../appHome.php">Sistema de Acreditaci&oacute;n de Carreras</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#">Inicio</a></li>
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
        <div class="container" style="min-height: 635px; background-color: #66afe9; margin-top: -20px;"> <!-- cuerpo de indicadores generales-->
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
            <!-- panel collapse evaluacion -->

            <div class="panel-group col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" href="#contaner2">Resultados de evaluaci&oacute;n docente</a>
                        </h4>
                    </div>
                    <div class="panel-body" id="contaner2">
                        <div class="panel-body col-lg-4" id="contenedor2"></div>
                        <div class="col-lg-4"></div>
                        <div class="col-lg-4"></div>
                    </div>
                </div>
            </div>
        </div>


        <footer><h5>Powered by ROS 2017</h5></footer> 
    </div>

    <script src="../public/js/jquery.min.js" type="text/javascript"></script>
    <script src="../public/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="../public/code/highcharts.js" type="text/javascript"></script>
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
        $(function () {
            $('#contenedor2').highcharts({
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false
                },
                title: {
                    text: 'Indicador de Porcentaje de Aprobacion de Encuesta Docente'
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
                        name: 'Porcentaje Resultado Encuesta Docente',
                        data: [
<?php
echo $SiE;
echo $NoE;
?>

                        ]
                    }]
            });
        });
    </script>

</body>
</html>
