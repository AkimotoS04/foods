<div class="kepala row">
	<h2 class="col-sm-12"><?= $title ?></h2>
	<div class="col-sm-4">
		<h3>Categories :</h3>
		<a class="btn btn-warning m-1 w3-button" role="button" href="/foods/foods/filter">Foods</a>
		<a class="btn btn-warning m-1" role="button" href="/foods/foods/filterdrink">Drinks</a>
	</div>
	<div class="col-sm-4">
		<h3>Sort by:</h3>
		<form action="<?php echo base_url().'foods/sort' ?>" method="post">
			<button class="btn btn-warning" role="button" href="/foods/foods/sort_price">Cheapest</button>
		</form>
	</div>
	<div class="col-sm-4">
		<h3>Search :</h3>
		<form class="input-group mb-3" action="<?php echo base_url().'foods/cari' ?>" method="get">
			<input class="form-control rounded mr-3" type="text" name="cari" placeholder="Search...">
			<button class="btn btn-warning" type="submit" value="Cari">Cari</button><br>
		</form>
	</div>
</div>

<div class="row mt-3">
	<?php foreach ($foods as $key => $food) : ?>
	<div class="col-12 col-sm-6 col-md-4">
		<div class="card mb-4 container w3-animate-zoom" style="background-color:white;">
			<div class="imgzoom" style="padding-top:15px">
			<?php
                if ($food['image'] !== null) {
                    // please! config size and position of this one!
                    echo "<img class='card-img-top' src='".base_url().$food['image']."' height='150px'>";
                }else{
					echo "<img class='card-img-top' src='".base_url()."/assets/images/default.png' height='150px'>";
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
				<form method='POST' action='<?php echo base_url('../foods/foods/add_to_cart'); ?>' enctype='multipart/form-data'>
					<div class="qty">
              <span class="minus bg-dark qty-minus">-</span>
              <input class="count" type="number" value="1" name="qty" style="border: 0;width: 2%;" readonly>
              <span class="plus bg-dark qty-plus">+</span>
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

<div class="modal fade bd-example-modal-lg" style="width: 100%;" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Sales Statistic</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		<div class="container">
			<div id="chartContainer" style="height: 370px; width: auto;"></div>
		</div>	
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script>
    $(document).on('click', '.qty-plus', function () {
		$(this).prev().val(+$(this).prev().val() + 1);
	});
	$(document).on('click', '.qty-minus', function () {
		if ($(this).next().val() > 1) $(this).next().val(+$(this).next().val() - 1);
	});
</script>
