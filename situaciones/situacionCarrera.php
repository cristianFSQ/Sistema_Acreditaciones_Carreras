<?php
session_start();
include '../ClaseConexion.php';
//CONSULTAS A LA BD

$resTotal = $conexion->query("SELECT * FROM carreras");
$cnt = $resTotal->num_rows;

$resSi = $conexion->query("SELECT * FROM carreras WHERE CRR_ACREDITADA='si'");
$cntSi = $resSi->num_rows;
$totalSi = $cntSi * 100 / $cnt;

$resNo = $conexion->query("SELECT * FROM carreras WHERE CRR_ACREDITADA='no'");
$cntNo = $resNo->num_rows;
$totalNo = $cntNo * 100 / $cnt;


while ($filaSi = $resSi->fetch_array(MYSQLI_BOTH)) {
    $Si = "{ name:'" . $filaSi['CRR_ACREDITADA'] . "',y:" . $totalSi . "},";
}

while ($filaNo = $resNo->fetch_array(MYSQLI_BOTH)) {
    $No = "{ name:'" . $filaNo['CRR_ACREDITADA'] . "',y:" . $totalNo . "},";
}

//CONSULTAS A LA BD

$resTotal3 = $conexion->query("SELECT * FROM carreras");
$cnt3 = $resTotal3->num_rows;

$resSi3 = $conexion->query("SELECT * FROM carreras WHERE CRR_TIPO='ingenieria'");
$cntSi3 = $resSi3->num_rows;
$totalSi3 = $cntSi3 * 100 / $cnt3;

$resNo3 = $conexion->query("SELECT * FROM carreras WHERE CRR_TIPO='tecnico'");
$cntNo3 = $resNo3->num_rows;
$totalNo3 = $cntNo3 * 100 / $cnt3;


while ($filaSi3 = $resSi3->fetch_array(MYSQLI_BOTH)) {
    $Si3 = "{ name:'" . $filaSi3['CRR_TIPO'] . "',y:" . $totalSi3 . "},";
}

while ($filaNo3 = $resNo3->fetch_array(MYSQLI_BOTH)) {
    $No3 = "{ name:'" . $filaNo3['CRR_TIPO'] . "',y:" . $totalNo3 . "},";
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
        <div class="container" style="height: 615px; background-color: #66afe9; margin-top: -20px;"> <!-- cuerpo de indicadores generales-->
            <div>
                <h1>Indicadores Carreras</h1>
            </div>
            <!-- panel collapse postgrado -->

            <div class="panel-group col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" href="#contaner1">Cantidad de matriculas por carreras</a>
                        </h4>
                    </div>
                    <div class="panel-body" id="contaner1">
                        <div class="panel-body col-lg-4" id=""></div>
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
                            <a data-toggle="collapse" href="#contaner2">matriculas por año</a>
                        </h4>
                    </div>
                    <div class="panel-body" id="contaner2">
                        <div class="panel-body col-lg-4" id="contenedor2"></div>
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
                            <a data-toggle="collapse" href="#contaner3">Tipo de carreras</a>
                        </h4>
                    </div>
                    <div class="panel-body" id="contaner3">
                        <div class="panel-body col-lg-4" id="contenedor3"></div>
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
                    text: 'Indicador de Porcentaje de Carreras Acreditadas'
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
                        name: 'Porcentaje de Carreras Acreditadas',
                        data: [
<?php
echo $Si;
echo $No;
?>

                        ]
                    }]
            });
        });
        Highcharts.chart('contenedor2', {
            chart: {
                type: 'column',
                options3d: {
                    enabled: true,
                    alpha: 10,
                    beta: 25,
                    depth: 70
                }
            },
            title: {
                text: '3D chart with null values'
            },
            subtitle: {
                text: 'Notice the difference between a 0 value and a null point'
            },
            plotOptions: {
                column: {
                    depth: 25
                }
            },
            xAxis: {
                categories: Highcharts.getOptions().lang.shortMonths
            },
            yAxis: {
                title: {
                    text: null
                }
            },
            series: [{
                    name: 'Sales',
                    data: [
<?php
$sql = mysql_query("SELECT * FROM carreras");
while ($res = mysql_fetch_array($sql)) {
    ?>

                            [<?php echo $res['CRR_MATRICULAS_ACTIVAS'] ?>],
    <?php
}
?>
                    ]
                }]
        });
        $(function () {
            $('#contenedor3').highcharts({
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false
                },
                title: {
                    text: 'Indicador de Porcentaje de Tipos de Carreras'
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
                        name: 'Porcentaje de Tipos de Carreras',
                        data: [
<?php
echo $Si3;
echo $No3;
?>

                        ]
                    }]
            });
        });

    </script>

</body>
</html>