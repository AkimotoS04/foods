<div class="jumbotron">
<h1 class="text-center fs-home-logo"><?= $title ?></h1>
<hr>
<?php foreach ($orders as $key => $order) : ?>
  <h4> <?php echo $uname[$key]; ?></h4><h4>
  <?php echo $jumlah[$key]; ?> x <?php echo $food[$key]; ?>
  </h4>
  <h6><?php echo $email[$key]; ?></h6>
<hr>
<?php endforeach; ?>
</div>
