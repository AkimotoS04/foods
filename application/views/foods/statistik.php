<div class="jumbotron" style="margin-top:5%;">
<h1 class="text-center fs-home-logo"><?= $title ?></h1>

<?php
 
$dataPoints = array();
foreach ($stat as $v){
	array_push($dataPoints, array("label"=> $v['name'], "y"=> ($v['jumlah']*$v['price'])));
};

?>

<hr>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>

<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script>
	window.onload = function () {
		var chart = new CanvasJS.Chart("chartContainer", {
			animationEnabled: true,
			exportEnabled: true,
			data: [{
				type: "pie",
				showInLegend: "true",
				legendText: "{label}",
				indexLabelFontSize: 16,
				indexLabel: "{label} - #percent%",
				yValueFormatString: "Rp###,###.00",
				dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
			}]
		});
		chart.render();
	}
</script>
</div>