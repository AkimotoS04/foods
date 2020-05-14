<div class="jumbotron">
<h1 class="text-center fs-home-logo"><?= $title ?></h1>
<hr>
<?php foreach ($foods as $key => $food) : ?>
  <h4><?php echo $jumlah[$key]; ?> x <?php echo $fname[$key]; ?> -
  <small><?php echo $rname[$key]; ?> </small>
  <a class="btn btn-dark fs-food-page" role="button" href="/foods/foods/order_cart?food_id=<?php echo $food['food_id']  ?>&id=<?php echo $foods[$key]['id'] ?>?jumlah=<?php echo $jumlah[$key]; ?>"> Order </a>
  <a class="btn btn-danger fs-food-page" role="button" href="/foods/foods/delete_cart?id=<?php echo $foods[$key]['id'] ?>"> Cancel </a>
  <br>
  <br>
  <small><?php echo("Rp. ".$price[$key] * $jumlah[$key].",-"); ?></small>
  <br><hr>
</h4>
<?php endforeach; ?>
</div>