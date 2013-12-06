@extends('layouts.master')

@section('main')
	@foreach(['r', 'g', 'b'] as $clr)
		<div id="chart-{{ $clr }}" style="width: 450px; height: 250px;"></div>
	@endforeach
@stop

@section('page_scripts')
@parent
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
	<script type="text/javascript">
	google.load("visualization", "1", {packages:["corechart"]});
	google.setOnLoadCallback(drawChart);
	function drawChart(){
		  // Create the three charts: before, after, and diff.
		var chartBefore = new google.visualization.ScatterChart(document.getElementById('chart-r'));
		var chartAfter = new google.visualization.ScatterChart(document.getElementById('chart-g'));
		var chartDiff = new google.visualization.ScatterChart(document.getElementById('chart-b'));
		var options = {
				title: 'Red',
				hAxis: {title: 'Axis 1',  minValue: 0, maxValue: 255},
				vAxis: {title: 'Axis 2',  minValue: 0, maxValue: 255},
				legend: 'none',
				series: [
						{color: 'grey', visibleInLegend: true}, 
						{color: 'red', visibleInLegend: true}, 
						{color: 'green', visibleInLegend: true}, 
						{color: 'blue', visibleInLegend: true}
						]
		};


		var controls = google.visualization.arrayToDataTable([
							['Red', 'Green', 'Blue'],
							<?php foreach($controls as $rgba): ?>
							[ <?php echo $rgba->red.', '.$rgba->green.', null'; ?>],
							<?php endforeach; ?>
							<?php foreach($controls as $rgba): ?>
							[ <?php echo $rgba->red.', null, '.$rgba->blue; ?>],
							<?php endforeach; ?>
						]);
		var actuals = google.visualization.arrayToDataTable([
							['Red', 'Green', 'Blue'],
							<?php foreach($actuals as $rgba): ?>
							[ <?php echo $rgba->red.', '.$rgba->green.', null'; ?>],
							<?php endforeach; ?>
							<?php foreach($actuals as $rgba): ?>
							[ <?php echo $rgba->red.', null, '.$rgba->blue; ?>],
							<?php endforeach; ?>
						]);

		// Draw the before and after charts.
		options.title = 'Controls';
		chartBefore.draw(controls, options);

		options.title = 'Actuals';
		chartAfter.draw(actuals, options);

		// Draw the diff chart.
		var diffData = chartDiff.computeDiff(controls, actuals);
		options.title = 'Variance';
		chartDiff.draw(diffData, options);
	}
	</script>
@stop