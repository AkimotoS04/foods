<!DOCTYPE html>
<html lang="en">
<head>
  <title>Profile</title>

</head>
<body>
<?php 
		foreach($profile as $pro){
	?>
    

<div class="container pt-5 pr-5 pb-5 bg-light mt-3 mb-3">
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
                            <h5 class="mb-3">User Profile</h5>
                            <hr>
                            <div class="row">
                                <div class="col-md-8">
                                    <h6><strong>Nama : </strong><?php  echo $pro['name']; ?> </h6>
                                    <h6><strong>Email : </strong><?php  echo $pro['email']; ?> </h6>
                                    <h6><strong>Tanggal Lahir : </strong><?php  echo $pro['Birth']; ?> </h6>
                                </div>
                            </div>
                            <!--/row-->
                        </div>
                     
                        <div class="tab-pane" id="edit">
                        <h5 class="mb-3">Edit Profile</h5>
                        <hr>
                            <?php echo form_open_multipart("users/update_user_u?id=".$pro['id']); ?>
                            <div class="row">
                                <div class="col-md-4 col-md-offset-4">
                                  
                                <div class="form-group">
                                    <h5 class="col-lg-3 col-form-label form-control-label">ID</h5>
                                    <input name="id" type="text" class="form-control" value="<?php echo $pro['id'];?>" readonly>
                                </div>
                                <div class="form-group <?=form_error("name") ? "has-error" : null?>">
                                <h5 class="col-lg-3 col-form-label form-control-label">Name</h5>
                                    <input name="name" type="text" class="form-control" value="<?php echo $pro['name']; ?>" placeholder="Enter name of food.">
                                    <span class='help-block' style='color:red'><?php echo form_error('name'); ?></span>
                                </div>
                                
                                <div class="form-group <?=form_error("price") ? "has-error" : null?>">
                                    <h5 class="col-lg-3 col-form-label form-control-label">Email</h5>
                                    <input name="email" type="text" value="<?php echo $pro['email']; ?>" class="form-control" placeholder="Enter price.">
                                    <span class='help-block' style='color:red'><?php echo form_error('email'); ?></span>
                                </div>
                           
                                <div class="form-group">
                                    <h5 class="col-lg-3 col-form-label form-control-label">Image</h5>
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
                <div class = "mx-auto img-fluid img-circle d-block" alt="avatar">
                    <img width = 200 height = 200 src="../<?php echo $pro['image']; ?>">
                </div>
                </div>
            </div>
        </div>
<?php } ?>
</body>
</html>
