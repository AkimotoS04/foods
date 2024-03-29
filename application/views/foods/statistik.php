<div class="jumbotron">
<h1 class="text-center fs-home-logo"><?= $title ?></h1>

<?php

$dataPoints = array();
if ($this->session->userdata('user_type') == 0 && strcmp($this->session->userdata('email'),'superadmin@gmail.com') == 0) {
	foreach ($stat as $v){
		array_push($dataPoints, array("label"=> $v['Resto'], "y"=> ($v['jumlah']*$v['price'])));
	};
}elseif ($this->session->userdata('user_type') == 0 && strcmp($this->session->userdata('email'),'superadmin@gmail.com') != 0) {
	foreach ($stat as $v){
		array_push($dataPoints, array("label"=> $v['name'], "y"=> ($v['jumlah']*$v['price'])));
	};
}

$total = 0;

foreach($stat as $s){
	$total = $total + ($s['jumlah']*$s['price']);
}

function rupiah($angka){
	
	$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
	return $hasil_rupiah;
 
}

$resultz = rupiah($total);
?>

<hr>
<h4>Pendapatan Total: <i><?php echo $resultz; ?></i></h4>
<h4>Pendapatan dari penjualan tiap menu:</h4>
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