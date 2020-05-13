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
			<input  class="form-control rounded mr-3" type="text" name="cari" placeholder="Search...">
			<input class="btn btn-warning" type="submit" value="Cari"><br>
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
				<hr>
				<div id="input_div">
					<input type="button" value="-" id="moins" onclick="minus()">
					<input type="text" size="2" value="1" id="count">
					<input type="button" value="+" id="plus" onclick="plus()">
				</div>
				<a class="btn btn-success fs-food-page" role="button" href="/foods/foods/add_to_cart/<?php echo $food['id']  ?>"> Add to Cart </a>
			</div>
    </div>
	</div>
	<?php endforeach; ?>
</div>

<script>
    var count = 1;
    var countEl = document.getElementById("count");
    function plus(){
        count++;
        countEl.value = count;
    }
    function minus(){
      if (count > 1) {
        count--;
        countEl.value = count;
      }  
    }
</script>
