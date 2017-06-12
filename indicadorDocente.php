<?php
$conexion =new mysqli("localhost", "root", "", "acreditacion2.0");

//CONSULTAS A LA BD

$resTotal=$conexion->query("SELECT * FROM docente");
$cnt=$resTotal->num_rows;

$resSi=$conexion->query("SELECT * FROM docente WHERE DCT_POSTGRADO='si'");
$cntSi=$resSi->num_rows;
$totalSi=$cntSi*100/$cnt;

$resNo=$conexion->query("SELECT * FROM docente WHERE DCT_POSTGRADO='no'");
$cntNo=$resNo->num_rows;
$totalNo=$cntNo*100/$cnt;

while($filaSi= $resSi->fetch_array(MYSQLI_BOTH))
{
	$Si="{ name:'".$filaSi['DCT_POSTGRADO']."',y:".$totalSi."},";
}

while($filaNo= $resNo->fetch_array(MYSQLI_BOTH))
{
	$No="{ name:'".$filaNo['DCT_POSTGRADO']."',y:".$totalNo."},";
}
?>
<html lang="es">
	<head>
		<title>Postgrado Docentes</title>
		<meta charset ="utf-8">
		<meta name="viewport" content="width=device-with, initial-scale=1. maximum-scale=1"/>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<script src="https://code.highcharts.com/highcharts.js"></script>
		<script src="https://code.highcharts.com/modules/exporting.js"></script> 
		<script type="text/javascript">
$(function () {
    $('#container').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false
        },
        title: {
            text: 'Indicador de Docentes con Postgrado'
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
	</head>
	<body>
		<header>
			<div class="alert alert-info">
			<h2></h2>
			</div>
		</header>
		<div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
	</body>
</html>