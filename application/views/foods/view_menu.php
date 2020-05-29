<?php
	foreach($foods as $pro){
?>

<div class="container pt-5 pr-5 pb-5 bg-light mt-3 mb-3 w3-animate-zoom">
    
        <h3>View Description</h3>
    
        <table class ="table table-hover table-striped">
            <td>
                <?php
            if ($pro['image'] !== null) {
                echo "<img class='zoom' width = '200' height = '200' src='".base_url().$pro['image']."'>";
            }else{
                echo "<img class='zoom' width = '200' height = '200' src='".base_url().'assets/images/default.png'."'>";
            }
            ?>
            </td>
            <td>
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
                        </tbody>
                    </td>
        </table>
        
        
        <div class="container">
            <div class="row">
              <div class="col">
                <a href=<?php echo base_url('foods/index');?> class="previous bg-black">&#8249; Back</a>
              </div>
           
            </div>
        </div>
        
    </div>



<?php } ?>
