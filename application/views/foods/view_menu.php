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
                <a routerLink="/book" class="previous bg-black">&#8249; Back</a>
              </div>
              <div class="col">
                <button class="btn btn-primary col-6" routerLink="/update-pustaka/{{perpustakaan.result.isbn}}">Update</button>
              </div>
            </div>
        </div>
        
    </div>






<div class="container pt-5 pr-5 pb-5 bg-light mt-3 mb-3 w3-animate-zoom">
    <div class="row">
        <div class="col-lg-4 order-lg-1 text-center">
            <div class = "mx-auto img-fluid img-circle d-block" alt="avatar">
            <?php
            if ($pro['image'] !== null) {
                echo "<img class='about-main' width = '200' height = '200' src='".base_url().$pro['image']."'>";
            }else{
                echo "<img class='about-main' width = '200' height = '200' src='".base_url().'assets/images/default.png'."'>";
            }
            ?>
            </div>
        </div>
        <div class="col-lg-8 order-lg-2">
            <div class="tab-content py-4 px-4 bg-light">
                <div class="tab-pane active" id="profile">
                    <h5 class="mb-3 fs-home-logo" style="font-size:50px">View Description</h5>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4">
                                    <span class="monospace"><strong>Nama</strong></span>
                                </div>
                                <div class="col-md-8">
                                    <span class="monospace">: <?php  echo $pro['name']; ?></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <span class="monospace"><strong>Price</strong></span>
                                </div>
                                <div class="col-md-8">
                                    <span class="monospace text-lowercase">: <?php  echo $pro['price']; ?></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <span class="monospace"><strong>Description</strong></span>
                                </div>
                                <div class="col-md-8">
                                    <span class="monospace">: <?php  echo $pro['description']; ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/row-->
                </div>

            </div>
        </div>
    </div>
</div>
<?php } ?>
