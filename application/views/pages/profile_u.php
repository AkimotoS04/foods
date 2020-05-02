<!DOCTYPE html>
<html lang="en">
<head>
  <title>Profile</title>

</head>
<body>
<?php 
		foreach($profile as $pro){
	?>
    

<div class="container pt-5 pr-5 pb-5 bg-light mt-3 mb-3 w3-animate-zoom">
            <div class="row content">
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
                                <div class="col-md-8 fs-home-logo">
                                    <h4 class="monospace"><strong>Nama : </strong><?php  echo $pro['name']; ?> </h4>
                                    <h4 class="monospace"><strong>Email : </strong><?php  echo $pro['email']; ?> </h4>
                                    <h4 class="monospace"><strong>Tanggal Lahir : </strong><?php  echo $pro['Birth']; ?> </h4>
                                </div>
                            </div>
                            <!--/row-->
                        </div>
                     
                        <div class="tab-pane" id="edit">
                        <h5 class="mb-3 fs-home-logo" style="font-size:50px">Edit Profile</h5>
                        <hr>
                            <?php echo form_open_multipart("users/update_user_u?id=".$pro['id']); ?>
                            <div class="row">
                                <div class="col-md-4">
                                  
                                <div class="form-group">
                                    <h5 class="col-lg-3 col-form-label form-control-label monospace">ID</h5>
                                    <input name="id" type="text" class="form-control monospace" value="<?php echo $pro['id'];?>" readonly>
                                </div>
                                <div class="form-group <?=form_error("name") ? "has-error" : null?>">
                                <h5 class="col-lg-3 col-form-label form-control-label monospace">Name</h5>
                                    <input name="name" type="text" class="form-control monospace" value="<?php echo $pro['name']; ?>" placeholder="Enter name of food.">
                                    <span class='help-block' style='color:red'><?php echo form_error('name'); ?></span>
                                </div>
                           
                                <div class="form-group">
                                    <h5 class=" monospacecol-lg-3 col-form-label form-control-label">Image</h5>
                                    <input type="file" name="image" />
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">Update</button>
                                </div>
                            </div>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 order-lg-1 text-center">
                <div class = "mx-auto img-fluid img-circle d-block about-images w3-animate-zoom" alt="avatar">
                <?php
                if ($pro['image'] !== null) {
                    echo "<img class='about-main' width = '200' height = '200' src='".base_url().$pro['image']."'>";
                }else{
                    echo "<img class='about-main' width = '200' height = '200' src='".base_url().'assets/images/user.png'."'>";
                }
                ?>
                </div>
                </div>
            </div>
        </div>
<?php } ?>
</body>
</html>
