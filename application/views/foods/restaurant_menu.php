<div class="kepala">
<h2><?= $title ?></h2>
</div>

<div class="row">
	<?php foreach ($foods as $key => $food) : ?>
    <?php $id = $food['id'];?>
	<div class="col-12 col-sm-6 col-md-4">
		<div class="card mb-4 w3-container w3-animate-zoom">
			<?php
                if ($food['image'] !== null) {
                    // please! config size and position of this one!
                    echo "<img class='card-img-top' src='".base_url().$food['image']."' height='150px'>";
                }
            ?>
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
