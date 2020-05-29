<?php
	foreach($foods as $pro){
?>
<div class="container pt-5 pr-5 pb-5 bg-light mt-3 mb-3 w3-animate-zoom">
    <h1 class="text-center fs-home-logo">Food Description</h1>
    <hr>
    <div class="container">
        <div class="row">
            <div class="col-md-4 text-center">
                <?php
                    if ($pro['image'] !== null) {
                        echo "<img class='img-fluid' src='".base_url().$pro['image']."'>";
                    }else{
                        echo "<img class='img-fluid' src='".base_url().'assets/images/default.png'."'>";
                    }
                ?>
            </div>
            <div class="col-md-8">
                <table class ="table table-hover table-striped">
                    <tbody>
                        <tr>
                            <td>Nama</td>
                            <td><?php  echo $pro['name']; ?></td>
                        </tr>
                        <tr>
                            <td>Harga</td>
                            <td><?php  echo $pro['price']; ?></td>
                        </tr>
                        <tr>
                            <td>Deskripsi</td>
                            <td><?php  echo $pro['description']; ?></td>
                        </tr>
                        <tr>
                            <td>Rating</td>
                            <td><div style="font-size:25px">
					<?php
					if($rating[0]!=0)
					{
						for($x=0;$x<floor($rating[0]);$x++){
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
				</div></td>
                        </tr>
                    </tbody>
                </table>
                <form method='POST' action='<?php echo base_url('/foods/add_to_cart'); ?>' enctype='multipart/form-data'>
                    <h3>Buy 
                    <span class="qty">
                        <span class="minus bg-dark qty-minus">-</span>
                        <input class="count" type="number" value="1" name="qty" style="border: 0;width: 2%;" readonly>
                        <span class="plus bg-dark qty-plus">+</span>
                    </span>
                    ?</h3>
                    
                    <input type='hidden' name='id' value="<?php echo $pro['id'] ?>">
                    <br>
                    <button type='submit' name='submit' class='btn btn-success float-right'>Add to Cart</button>
                    <a href="<?php echo base_url("/foods");?>" class='btn btn-secondary float-right mx-2'>No, Thanks</a>
                </form>
            <div>
        </div>
    <?php } ?>
    </div>
</div>


<script>
    $(document).on('click', '.qty-plus', function () {
		$(this).prev().val(+$(this).prev().val() + 1);
	});
	$(document).on('click', '.qty-minus', function () {
		if ($(this).next().val() > 1) $(this).next().val(+$(this).next().val() - 1);
	});
</script>