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
          renderTo: 'container',
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
            text: 'cms',
            margin: 80
          }
        },
        series: [{
          name: 'Parameter Name',
          data: []
        }]
      });

    });
  </script>
