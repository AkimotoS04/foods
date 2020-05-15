<div class="kepala">
<h2><?= $title ?></h2>
</div>
<?php
 
$dataPoints = array();
foreach ($stat as $v){
	array_push($dataPoints, array("label"=> $v['name'], "y"=> ($v['jumlah']*$v['price'])));
};

?>

<div class="row">
	<?php foreach ($foods as $key => $food) : ?>
    <?php $id = $food['id'];?>
	<div class="col-12 col-sm-6 col-md-4">
		<div class="card mb-4 w3-container w3-animate-zoom">
		<div class="imgzoom" style="padding-top:15px">
			<?php
                if ($food['image'] !== null) {
                    // please! config size and position of this one!
                    echo "<img class='card-img-top' src='".base_url().$food['image']."' height='150px'>";
                }
            ?>
			</div>
			<div class="card-body p-3">
				<h4 class="card-title" style="padding-top:15px;"> <?php echo $food['name']; ?> </h4>
				<span ><?php echo ("Rp. ").$food['price']; ?> </span> -
				<span class="font-weight-bold"><?php echo $rnames[$key]; ?> </span>
				<hr>
				<a class="btn btn-dark fs-food-page" role="button" href="<?php echo base_url("foods/delete_menu?id=$id"); ?>"> Delete </a>
				<a class="btn btn-success fs-food-page" role="button" href="<?php echo base_url("foods/update_menu?id=$id"); ?>"> Update </a>
			</div>
    </div>
	</div>
	<?php endforeach; ?>
</div>

<div id="chartContainer" style="height: 370px; width: 100%;"></div>

<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script>
	window.onload = function () {
		var chart = new CanvasJS.Chart("chartContainer", {
			animationEnabled: true,
			exportEnabled: true,
			title:{
				text: "Statistik Total Pendapatan"
			},
			subtitles: [{
				text: "Penjualan Sampai Saat ini"
			}],
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