<div class="jumbotron">
<h2><?= $title ?></h2>
<hr>
<br>
<?php foreach ($foods as $key => $food) : ?>
  <h4> <?php echo $fname[$key]; ?> -
  <small><?php echo $rname[$key]; ?> </small>
 
  <br><hr>
</h4>
<?php endforeach; ?>
</div>