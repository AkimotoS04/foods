<div class="jumbotron" style="margin-top:5%;">
<h1 class="text-center fs-home-logo"><?= $title ?></h1>
<hr>
<?php foreach ($foods as $key => $food) : ?>
  <h4><?php echo $jumlah[$key]; ?> x <?php echo $fname[$key]; ?> -
  <small><?php echo $rname[$key]; ?> </small>
  <span>Give Rating</span>
  <form method='POST' action='<?php echo base_url('../foods/foods/rating'); ?>' enctype='multipart/form-data'>
					<div class="qty">
          
              <input class="count" type="number" value="1" min="1" max="5" name="rating">
     
          </div>
					<hr>
          <input type='hidden' name='id' value="<?php echo $food['id'] ?>">
					<button type='submit' name='submit' class='btn btn-success fs-food-page'>Give Rating</button>
				</form>
  <br>
  <br>

  <small><?php echo("Rp. ".$price[$key] * $jumlah[$key].",-"); ?></small>
  <br><hr>
</h4>
<?php endforeach; ?>
</div>