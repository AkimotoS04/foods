<div class="jumbotron">
<h2><?= $title ?></h2>
<hr>
<br>
<?php foreach ($foods as $key => $food) : ?>
  <h4> <?php echo $fname[$key]; ?> -
  <small><?php echo $rname[$key]; ?> </small> -
  <small><?php echo $jumlah[$key]; ?> </small>
  <a class="btn btn-dark fs-food-page" role="button" href="/foods/foods/order_cart/<?php echo $food['food_id']  ?>"> Order </a>
  <br><hr>
</h4>
<?php endforeach; ?>
</div>