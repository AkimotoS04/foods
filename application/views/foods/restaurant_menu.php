<div class="jumbotron">
	<h1 class="text-center fs-home-logo"><?= $title ?></h1>
	<hr>

	<div class="row">
		<?php foreach ($foods as $key => $food) : ?>
		<?php $id = $food['id'];?>
		<div class="col-12 col-sm-6 col-md-4">
			<div class="card mb-4 container w3-animate-zoom">
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
					<div style="font-size:25px">
					<?php
						if($rating[$key]!=0)
						{
							for($x=0;$x<floor($rating[$key]);$x++){
								echo'<span class="fa fa-star checked"></span>';
								echo" ";
							}
							for($j=$x;$j<5;$j++){
								echo'<span class="fa fa-star"></span>';
								echo" ";
							}
						}else{
							for($x=0;$x<5;$x++){
								echo'<span class="fa fa-star checked"></span>';
								echo" ";
							}
						}
					?>
			</div>
					<hr>
					<a class="btn btn-danger fs-food-page" role="button" href="<?php echo base_url("foods/delete_menu?id=$id"); ?>"> Delete </a>
					<a class="btn btn-success fs-food-page" role="button" href="<?php echo base_url("foods/update_menu?id=$id"); ?>"> Update </a>

				</div>
			</div>
		</div>
		<?php endforeach; ?>
	</div>
</div>