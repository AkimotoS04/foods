<div class="kepala row">
	<h2 class="col-sm-12"><?= $title ?></h2>
	<h3 class="col-sm-4">Categories :</h3>
	<h3 class="col-sm-4">Sort by:</h3>
	<h3 class="col-sm-4">Search :</h3>
	<div class="col-sm-4">
		<button class="btn btn-warning m-1" role="button" href="">Appertizer</button>
		<button class="btn btn-warning m-1" role="button" href="">Main Course</button>
		<button class="btn btn-warning m-1" role="button" href="">Dessert</button>
		<button class="btn btn-warning m-1" role="button" href="">Drinks</button>
	</div>
	<div class="col-sm-4">
		<form action="<?php echo base_url().'foods/sort' ?>" method="post">
			<button class="btn btn-warning" role="button" href="/foods/foods/sort_price">Cheapest</button>
		</form>
	</div>
	<div class="col-sm-4">
		<form class="input-group mb-3 " action="<?php echo base_url().'foods/cari' ?>" method="get">
			<input class="form-control rounded mr-3" type="text" name="cari" placeholder="Search...">
			<button class="btn btn-warning" type="submit" value="Cari">Cari</button><br>
		</form>
	</div>
</div>

<div class="row mt-3">
	<?php foreach ($foods as $key => $food) : ?>
	<div class="col-12 col-sm-6 col-md-4">
		<div class="card mb-4 w3-container w3-animate-zoom" style="background-color:white;">
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
				<div style="font-size:25px">
				<span class="fa fa-star checked"></span>
				<span class="fa fa-star checked"></span>
				<span class="fa fa-star checked"></span>
				<span class="fa fa-star"></span>
				<span class="fa fa-star"></span>
			</div>
				<form method='POST' action='<?php echo base_url('../foods/foods/add_to_cart'); ?>' enctype='multipart/form-data'>
				<div>
				<input type="button" value="-" class="qty-minus">
				<input type="number" value="1" name="qty"class="qty">
				<input type="button" value="+" class="qty-plus">
				</div>
					<hr>
					<input type='hidden' name='id' value="<?php echo $food['id'] ?>">
					<button type='submit' name='submit' class='btn btn-success fs-food-page'>Add to Cart</button>
				</form>
			</div>
    </div>
	</div>
	<?php endforeach; ?>
</div>

<script>
    $(document).on('click', '.qty-plus', function () {
		$(this).prev().val(+$(this).prev().val() + 1);
	});
	$(document).on('click', '.qty-minus', function () {
		if ($(this).next().val() > 0) $(this).next().val(+$(this).next().val() - 1);
	});
</script>
