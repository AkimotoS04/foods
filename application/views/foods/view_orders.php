<div class="jumbotron">
<h1 class="text-center fs-home-logo"><?= $title ?></h1>
<hr>
<?php foreach ($orders as $key => $order) : ?>
  <h4> <?php echo $uname[$key]; ?>
  <?php echo $email[$key]; ?>
  <br>
  <?php echo $food[$key]; ?>
  <?php echo $jumlah[$key]; ?>
  
  <br><hr>
</h4>
<?php endforeach; ?>
</div>
