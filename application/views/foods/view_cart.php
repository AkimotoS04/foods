<div class="jumbotron">
<h2><?= $title ?></h2>
<hr>
<br>
<?php foreach ($foods as $key => $food) : ?>
  <h4><?php echo $jumlah[$key]; ?> x <?php echo $fname[$key]; ?> -
  <small><?php echo $rname[$key]; ?> </small>
  <a class="btn btn-dark fs-food-page" role="button" href="/foods/foods/order_cart/<?php echo $food['food_id']  ?>"> Order </a>
  <a class="btn btn-danger fs-food-page" role="button" href="/foods/foods/delete_cart/<?php echo $food['food_id']  ?>"> Cancel </a>
  <br>
  <br>
  <small><?php echo("Rp. ".$price[$key] * $jumlah[$key].",-"); ?></small>
  <br><hr>
</h4>
<?php endforeach; ?>
</div>