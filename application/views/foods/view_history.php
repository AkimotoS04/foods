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
  <form method='POST' action='<?php echo base_url('../foods/rating'); ?>' enctype='multipart/form-data'>
    <div class="input-group mb-3">
      <div class="input-group-prepend">
      </div>
      <div class="qty mx-3">
      <div style="font-size:25px">
				<?php
				if($f['Rate']!=0)
				{
					for($x=0;$x<floor($f['Rate']);$x++){
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
				</div>
    </div>
		<hr>
	</form>
</div>
</h4>
<hr>
<?php endforeach; ?>
</div>
<script>
    $(document).on('click', '.qty-plus', function () {
		$(this).prev().val(+$(this).prev().val() + 1);
	});
	$(document).on('click', '.qty-minus', function () {
		if ($(this).next().val() > 1) $(this).next().val(+$(this).next().val() - 1);
	});
</script>
