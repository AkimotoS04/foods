<div class="jumbotron">
<h1 class="text-center fs-home-logo"><?= $title ?></h1>
<hr>
<?php foreach ($foods as $key => $food) : ?>
  <h4><?php echo $jumlah[$key]; ?> x <?php echo $fname[$key]; ?> -
  <small><?php echo $rname[$key]; ?> </small>
  <button class="btn btn-dark fs-food-page" data-toggle="modal" data-target="#myModal" data-backdrop='static' data-keyboard='false'> Order </button>
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title" id="myModal">Please Rate Our Food</h4>
      </div>
      <div class="modal-body">
      <div class="rating">
    
    <span role="button" class="fs-home-logo" onclick="window.location.href='<?php echo base_url('/foods/order_cart?rating=5&id='.$foods[$key]['id'].''); ?>';">☆</span>
    <span role="button" class="fs-home-logo" onclick="window.location.href='<?php echo base_url('/foods/order_cart?rating=4&id='.$foods[$key]['id'].''); ?>';">☆</span>
    <span role="button" class="fs-home-logo" onclick="window.location.href='<?php echo base_url('/foods/order_cart?rating=3&id='.$foods[$key]['id'].''); ?>';">☆</span>
    <span role="button" class="fs-home-logo" onclick="window.location.href='<?php echo base_url('/foods/order_cart?rating=2&id='.$foods[$key]['id'].''); ?>';">☆</span>
    <span role="button" class="fs-home-logo" onclick="window.location.href='<?php echo base_url('/foods/order_cart?rating=1&id='.$foods[$key]['id'].''); ?>';">☆</span>
    </div>

      </div>
    </div>
  </div>
</div>

    
      
  <a class="btn btn-danger fs-food-page" role="button" href="<?php echo base_url("/foods/delete_cart?id=".$foods[$key]['id'])?>"> Cancel </a>
  <br>
  <div class="my-2">
  <small>Total Harga : <?php echo("Rp. ".$price[$key] * $jumlah[$key].",-"); ?></small>
  </div>
  <br><hr>
</h4>
<?php endforeach; ?>
</div>


