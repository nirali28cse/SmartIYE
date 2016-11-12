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


<?php

use app\models\MachineParameters;
$get_tags =  MachineParameters::find()->joinWith(['machine.plant'=>function ($query) {  $query->Where(['user_id'=>Yii::$app->user->id]); } ])->all();


?>

   <section class="content">
      <div class="row">
	  
	  <?php foreach($get_tags as $get_tag){ ?>
	  	    <div id="container_chart<?php echo $get_tag->id; ?>" style="width:100%; height:400px;"></div>	  
			<div id="container_guage<?php echo $get_tag->id; ?>" style="width:100%; height:300px;"></div>	  

	  

  <!-- 2. Add the JavaScript to initialize the chart on document ready -->
  <script>
			var chart<?php echo $get_tag->id; ?>; // global

			function requestData<?php echo $get_tag->id; ?>() {
			  $.ajax({
				url: '<?php echo  Yii::getAlias('@web'); ?>/index.php?r=site/livedata',
				data: {tag_id:<?php echo $get_tag->tag_id; ?>},
				success: function(point) {
				  var series = chart<?php echo $get_tag->id; ?>.series[0],
					shift = series.data.length > 30; // shift if the series is longer than 20

				  // add the point
				  chart<?php echo $get_tag->id; ?>.series[0].addPoint(eval(point), true, shift);

				  // call it again after one second
				  setTimeout(requestData<?php echo $get_tag->id; ?>, 30000);
				},
				cache: false
			  });
			}

			$(document).ready(function() {
			  chart<?php echo $get_tag->id; ?> = new Highcharts.Chart({
				chart: {
				  renderTo: 'container_chart<?php echo $get_tag->id; ?>',
				  defaultSeriesType: 'spline',
				  events: {
					load: requestData<?php echo $get_tag->id; ?>
				  }
				},
				title: {
				  text: '<?php echo $get_tag->param_name; ?>\'s Chart'
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
					text: '<?php echo $get_tag->units; ?>',
					margin: 80
				  }
				},
				series: [{
				  name: '<?php echo $get_tag->param_name; ?>',
				  data: []
				}]
			  });

			});
			
			
			
			$(function () {
			
			var chart<?php echo $get_tag->id.$get_tag->tag_id; ?> = new Highcharts.Chart({
			
				chart: {
					renderTo: 'container_guage<?php echo $get_tag->id; ?>',
					type: 'gauge',
					plotBackgroundColor: null,
					plotBackgroundImage: null,
					plotBorderWidth: 0,
					plotShadow: false
				},
				
				title: {
					text: 'Guage for <?php echo $get_tag->param_name; ?>'
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
						text: '<?php echo $get_tag->units; ?>'
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
					name: '<?php echo $get_tag->param_name; ?>',
					data: [0],
					tooltip: {
						valueSuffix: ' <?php echo $get_tag->units; ?>'
					}
				}]
			
			}, 
			
			function (chart) {
			setInterval(function() {
			$(function() {
			$.getJSON('<?php echo  Yii::getAlias('@web'); ?>/index.php?r=site/livedataguage&tag_id=<?php echo $get_tag->tag_id; ?>', function(data) {
				$.each(data, function(key,val) {
					newVal = val;
					var point = chart<?php echo $get_tag->id.$get_tag->tag_id; ?>.series[0].points[0];
					point.update(newVal);
				});
			});
			})
		},30000)
		});

		});
	
  </script>
  	  <?php } ?>

  
      </div>
      <!-- /.row -->

    </section>


  
  
  
