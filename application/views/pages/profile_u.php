<?php 
	foreach($profile as $pro){
?>
    

<div class="container pt-5 pr-5 pb-5 bg-light mt-3 mb-3 w3-animate-zoom">
    <div class="row content">
        <div class="col-lg-4 order-lg-1 text-center">
            <div class = "mx-auto img-fluid img-circle d-block" alt="avatar">
            <?php
            if ($pro['image'] !== null) {
                echo "<img class='about-main' width = '200' height = '200' src='".base_url().$pro['image']."'>";
            }else{
                echo "<img class='about-main' width = '200' height = '200' src='".base_url().'assets/images/user.png'."'>";
            }
            ?>
            </div>
        </div>
        <div class="col-lg-8 order-lg-2">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a href="" data-target="#profile" data-toggle="tab" class="nav-link active">Profile</a>
                </li>
                <li class="nav-item">
                    <a href="" data-target="#edit" data-toggle="tab" class="nav-link">Edit</a>
                </li>
            </ul>
            <div class="tab-content py-4 px-4 bg-light">
                <div class="tab-pane active" id="profile">
                    <h5 class="mb-3 fs-home-logo" style="font-size:50px">User Profile</h5>
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
                                    <span class="monospace"><strong>Email</strong></span>
                                </div>
                                <div class="col-md-8">
                                    <span class="monospace">: <?php  echo $pro['email']; ?></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <span class="monospace"><strong>Tahun Berdiri</strong></span>
                                </div>
                                <div class="col-md-8">
                                    <span class="monospace">: <?php  echo $pro['Birth']; ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/row-->
                </div>
                
                <div class="tab-pane" id="edit">
                <h5 class="mb-3 fs-home-logo" style="font-size:50px">Edit Profile</h5>
                <hr>
                    <?php echo form_open_multipart("users/update_user_u?id=".$pro['id']); ?>
                        <div class="form-group row">
                            <h5 class="col-md-3 col-form-label form-control-label monospace">ID</h5>
                            <div class="col-md-9">
                                <input name="id" type="text" class="form-control monospace" value="<?php echo $pro['id'];?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row <?=form_error("name") ? "has-error" : null?>">
                            <h5 class="col-lg-3 col-form-label form-control-label monospace">Name</h5>
                            <div class="col-md-9">
                                <input name="name" type="text" class="form-control monospace" value="<?php echo $pro['name']; ?>" placeholder="Enter name of food.">
                                <span class='help-block' style='color:red'><?php echo form_error('name'); ?></span>
                            </div>
                        </div>
                    
                        <div class="form-group row">
                            <h5 class="col-lg-3 col-form-label form-control-label monospace">Image</h5>
                            <div class="col-md-9">
                                <input type="file" name="image" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <button type="submit" class="btn btn-primary btn-block">Update</button>
                        </div>
                        </div>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>
