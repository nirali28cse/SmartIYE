<?php
$this->title = 'Chart Dashbord';
?>

<style>
.highcharts-credits{
	display: none;
}
</style>

<!-- ChartJS 1.0.1 -->
<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
<script src="http://code.highcharts.com/highcharts.js"></script>


   <section class="content">
      <div class="row">
	  <div id="container" style="width:100%; height:400px;"></div>
	  
      </div>
      <!-- /.row -->

    </section>

<script>


var chart; // global

function requestData() {
    $.ajax({
        url: '<?php echo  Yii::getAlias('@web'); ?>/index.php?r=site/livedata',
        success: function(point) {
            var series = chart.series[0],
                shift = series.data.length > 20; // shift if the series is 
                                                 // longer than 20


            // add the point
            chart.series[0].addPoint(point, true, shift);
            
            // call it again after one second
            setTimeout(requestData, 1000);    
        },
        cache: false
    });
}

$(document).ready(function() {
    chart = new Highcharts.Chart({
        chart: {
            renderTo: 'container',
            defaultSeriesType: 'spline',
            events: {
                load: requestData
            }
        },
        title: {
            text: 'Live Data'
        },
        xAxis: {
            type: 'datetime',
            tickPixelInterval: 150,
            maxZoom: 20 * 1000
        },
        yAxis: {
            minPadding: 0.2,
            maxPadding: 0.2,
            title: {
                text: 'Value',
                margin: 80
            }
        },
        series: [{
            name: 'Random data',
            data: []
        }]
    });        
});

</script>
