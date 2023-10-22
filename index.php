<?php
include_once 'conexion.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/series-label.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<link rel="stylesheet" href="estilo.css">
    <title>Document</title>
</head>
<body>
    <label >Totales anuales mayores que</label>
    <input type="text" name="totales" id="totales" onkeyup="enviodatos()" value="">
    <figure class="highcharts-figure">
        <div id="container"></div>
    </figure>
</body>
</html>
<script>

Highcharts.chart('container', {

title: {
    text: 'Empresa XYZ',
    align: 'center'
},

subtitle: {
    text: 'Total de ventas anuales de los ultimos 10 años',
    align: 'center'
},

yAxis: {
    title: {
        text: 'Ventas en $'
    }
},

xAxis: {
    accessibility: {
        rangeDescription: 'Desde 2013 al 2022'
    }
},

legend: {
    layout: 'vertical',
    align: 'right',
    verticalAlign: 'middle'
},

plotOptions: {
    series: {
        label: {
            connectorAllowed: false
        },
        pointStart: 

        function enviodatos() {
    $valor = $('#totales').val();
    $.ajax ({
        url:'datos.php',
        type: 'POST',
        data: {resulta:$valor},
        success: function(res){
            var datos1= JSON.parse(res);
        }
    })
}

    }
},

series: [{
    name: 'Ventas anuales',
    data: [
        function enviodatos() {
    $valor = $('#totales').val();
    $.ajax ({
        url:'datos2.php',
        type: 'POST',
        data: {resulta:$valor},
        success: function(res){
            var datos2= JSON.parse(res);
        }
    })
}
    ]
}],

responsive: {
    rules: [{
        condition: {
            maxWidth: 500
        },
        chartOptions: {
            legend: {
                layout: 'horizontal',
                align: 'center',
                verticalAlign: 'bottom'
            }
        }
    }]
}

});
</script>