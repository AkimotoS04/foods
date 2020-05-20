<div class="jumbotron" style="margin-top:5%;">
<h1 class="text-center fs-home-logo"><?= $title ?></h1>
<hr>
<?php foreach ($orders as $key => $order) : ?>
<?php if($order['food_id'] == null ) :?>
  <h4>Menu telah dihapus</h4>
<?php else :?>
  <h4> <?php echo $uname[$key]; ?></h4><h4>
  <?php echo $jumlah[$key]; ?> x <?php echo $food[$key]; ?>
  </h4>
  <h6><?php echo $email[$key]; ?></h6>
<?php endif;?>
<hr>
<?php endforeach; ?>
</div>
