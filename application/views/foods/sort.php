<div class="kepala">
<h2><?= $title ?></h2>
<form action="<?php echo base_url().'foods/cari' ?>" method="get">
	<input type="text" name="cari" placeholder="Search...">
	<input class="btn btn-primary" type="submit" value="Cari">
</form>

<div class="row" style="color:black">
	<?php foreach ($foods as $key => $food) : ?>
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
				<br>
				<hr>
				<a class="btn btn-success fs-food-page" role="button" href="/foods/foods/add_to_cart/<?php echo $food['id']  ?>"> Add to Cart </a>
			</div>
    </div>
	</div>
	<?php endforeach; ?>
</div>
