<div class="container" style="color:white">
<h2><?= $title ?></h2>
<br>
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
