<div class="jumbotron">
<h1 class="text-center fs-home-logo"><?= $title ?></h1>
<hr>
<?php foreach ($orders as $key => $order) : ?>

  <small><?php echo $food[$key]; ?> </small>
  <br>
  <br>
  <?php foreach ($orders as $key => $order) : ?>
    <small><?php echo  $jumlah[$key]; ?></small>
    <?php endforeach; ?>


  <br><hr>
</h4>
<?php endforeach; ?>
</div>