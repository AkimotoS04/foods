<div class="jumbotron" style="margin-top:5%;">
<h1 class="text-center fs-home-logo"><?= $title ?></h1>
<hr>
<?php foreach ($foods as $key => $food) : ?>
  <h4><?php echo $jumlah[$key]; ?> x <?php echo $fname[$key]; ?> -
  <small><?php echo $rname[$key]; ?> </small>
  <br/>
  <div class="my-2">
    <small>Total Harga : <?php echo("Rp. ".$price[$key] * $jumlah[$key].",-"); ?></small>
  </div>
  <div>
  <form method='POST' action='<?php echo base_url('../foods/foods/rating'); ?>' enctype='multipart/form-data'>
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text border-dark  bg-dark text-white" id="basic-addon3"><b>Rating</b></span>
      </div>
      <div class="qty mx-3">
        <span class="minus bg-dark qty-minus">-</span>
        <input class="count pl-3 border-dark rounded" type="number" style="width:50px;" value="1" min="1" max="5" name="rating" readonly>
        <span class="minus bg-dark qty-plus">+</span>
      </div>
      <div class="input-group-prepend">
        <input type='hidden' name='id' value="<?php echo $food['id'] ?>">
        <button type='submit' name='submit' class='btn btn-success font-weight-bold rounded fs-food-page'>Give Rating</button>
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
