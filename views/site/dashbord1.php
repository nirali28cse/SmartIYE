<?php
$this->title = 'Chart Dashbord';
?>

<style>
.highcharts-credits{
	display: none;
}
.content{
	padding-top: 0px;
}
</style>

<!-- ChartJS 1.0.1 -->
<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
<script src="http://code.highcharts.com/highcharts.js"></script>
<script src="http://code.highcharts.com/highcharts-more.js"></script>
<script src="http://code.highcharts.com/modules/exporting.js"></script>


   <section class="content">
      <div class="row">
	  <div id="container_chart" style="width:100%; height:400px;"></div>
	  
	  <div id="container_guage" style="width:100%; height:300px;"></div>
	  
      </div>
      <!-- /.row -->

    </section>


  <!-- 2. Add the JavaScript to initialize the chart on document ready -->
  <script>
    var chart; // global
    var chartRsrp;

    function requestData() {
      $.ajax({
        url: '<?php echo  Yii::getAlias('@web'); ?>/index.php?r=site/livedata',
        success: function(point) {
          var series = chart.series[0],
            shift = series.data.length > 30; // shift if the series is longer than 20

          // add the point
          chart.series[0].addPoint(eval(point), true, shift);

          // call it again after one second
          setTimeout(requestData, 1700);
        },
        cache: false
      });
    }

    $(document).ready(function() {
      chart = new Highcharts.Chart({
        chart: {
          renderTo: 'container_chart',
          defaultSeriesType: 'spline',
          events: {
            load: requestData
          }
        },
        title: {
          text: 'Parameter Chart'
        },
        xAxis: {
          type: 'datetime',
          tickPixelInterval: 150,
          maxZoom: 20 * 1000
        },
        yAxis: {
          minPadding: 2.5,
          maxPadding: 2.5,
          title: {
            text: 'Units',
            margin: 80
          }
        },
        series: [{
          name: 'Parameter Name',
          data: []
        }]
      });

    });
	
	
	
	$(function () {
    
    var chart = new Highcharts.Chart({
    
        chart: {
            renderTo: 'container_guage',
            type: 'gauge',
            plotBackgroundColor: null,
            plotBackgroundImage: null,
            plotBorderWidth: 0,
            plotShadow: false
        },
        
        title: {
            text: 'Meter Guage'
        },
        
        pane: {
            startAngle: -150,
            endAngle: 150,
            background: [{
                backgroundColor: {
                    linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
                    stops: [
                        [0, '#FFF'],
                        [1, '#333']
                    ]
                },
                borderWidth: 0,
                outerRadius: '109%'
            }, {
                backgroundColor: {
                    linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
                    stops: [
                        [0, '#333'],
                        [1, '#FFF']
                    ]
                },
                borderWidth: 1,
                outerRadius: '107%'
            }, {
                // default background
            }, {
                backgroundColor: '#DDD',
                borderWidth: 0,
                outerRadius: '105%',
                innerRadius: '103%'
            }]
        },
           
        // the value axis
        yAxis: {
            min: 0,
            max: 200,
            
            minorTickInterval: 'auto',
            minorTickWidth: 1,
            minorTickLength: 10,
            minorTickPosition: 'inside',
            minorTickColor: '#666',
    
            tickPixelInterval: 30,
            tickWidth: 2,
            tickPosition: 'inside',
            tickLength: 10,
            tickColor: '#666',
            labels: {
                step: 2,
                rotation: 'auto'
            },
            title: {
                text: 'Units'
            },
            plotBands: [{
                from: 0,
                to: 120,
                color: '#55BF3B' // green
            }, {
                from: 120,
                to: 160,
                color: '#DDDF0D' // yellow
            }, {
                from: 160,
                to: 200,
                color: '#DF5353' // red
            }]        
        },
    
        series: [{
            name: 'Speed',
            data: [80],
            tooltip: {
                valueSuffix: ' Units'
            }
        }]
    
    }, 
	
	function (chart) {
    setInterval(function() {
    $(function() {
    $.getJSON('<?php echo  Yii::getAlias('@web'); ?>/index.php?r=site/livedataguage', function(data) {
        $.each(data, function(key,val) {
            newVal = val;
            var point = chart.series[0].points[0];
            point.update(newVal);
        });
    });
    })
},3000)
});

});
	
  </script>
