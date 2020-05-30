<div class="jumbotron">
<h1 class="text-center fs-home-logo"><?= $title ?></h1>
<hr>
<?php foreach ($orders as $key => $order) : ?>
<?php if($order['food_id'] == null ) :?>
  <h4>Menu telah dihapus</h4>
<?php else :?>
  <h4> <?php echo $uname[$key]; ?></h4><h4>
  <?php echo $jumlah[$key]; ?> x <?php echo $food[$key]; ?>
  <br/>
  <?php
    if($rating[$key]!=0)
    {
      for($x=0;$x<floor($rating[$key]);$x++){
        echo'<span class="fa fa-star checked"></span>';
        echo" ";
      }
      for($j=$x;$j<5;$j++){
        echo'<span class="fa fa-star"></span>';
        echo" ";
      }
    }else{
      for($x=0;$x<5;$x++){
        echo'<span class="fa fa-star checked"></span>';
        echo" ";
      }
    }
  ?>
  </h4>
  <h6><?php echo $email[$key]; ?></h6>
<?php endif;?>
<hr>
<?php endforeach; ?>
</div>
