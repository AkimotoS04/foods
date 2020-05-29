<div class="jumbotron">
<h1 class="text-center fs-home-logo"><?= $title ?></h1>
<hr>
<?php foreach ($foods as $f) : ?>
  <h4><?php echo $f['jumlah']; ?> x <?php echo $f['Makanan']; ?> -
  <small><?php echo $f['Resto']; ?> </small>
  <br/>
  <div class="my-2">
    <small>Total Harga : <?php echo("Rp. ".$f['Price'] * $f['jumlah'].",-"); ?></small>
  </div>
  <div>
  <form method='POST' action='<?php echo base_url('../foods/foods/rating'); ?>' enctype='multipart/form-data'>
    <div class="input-group mb-3">
      <div class="input-group-prepend">
      </div>
      <div class="qty mx-3">
      </div>
      <div class="input-group-prepend">
      </div>
    </div>
		<hr>
	</form>
</div>
</h4>
<?php endforeach; ?>
</div>
