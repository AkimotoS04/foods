<div class="jumbotron" style="margin-top:5%;">
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
      <?php if($f['Rate'] == null) : ?>
        <div class="rating">
    
    <span role="button" onclick="window.location.href='<?php echo base_url('../foods/foods/rating?rating=5&id='.$f['id'].''); ?>';">☆</span>
    <span role="button" onclick="window.location.href='<?php echo base_url('../foods/foods/rating?rating=4&id='.$f['id'].''); ?>';">☆</span>
    <span role="button" onclick="window.location.href='<?php echo base_url('../foods/foods/rating?rating=3&id='.$f['id'].''); ?>';">☆</span>
    <span role="button" onclick="window.location.href='<?php echo base_url('../foods/foods/rating?rating=2&id='.$f['id'].''); ?>';">☆</span>
    <span role="button" onclick="window.location.href='<?php echo base_url('../foods/foods/ratng?rating=1&id='.$f['id'].''); ?>';">☆</span>
    </div>
        <?php else : ?>

        <?php endif; ?>
        

      </div>
      <div class="input-group-prepend">
      <?php if($f['Rate'] == null) : ?>
        <?php else : ?>
          <button type='submit' name='submit' class='btn btn-success font-weight-bold rounded fs-food-page' disabled>Rated</button>
          <?php endif; ?>
      </div>
    </div>
		<hr>
	</form>
</div>
</h4>
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
