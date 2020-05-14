<div class="jumbotron">
<h1 class="text-center fs-home-logo"><?= $title ?></h1>
<hr>
<?php foreach ($foods as $key => $food) : ?>
  <h4> <?php echo $fname[$key]; ?> -
  <small><?php echo $rname[$key]; ?> </small>
 
  <br><hr>
</h4>
<?php endforeach; ?>
</div>