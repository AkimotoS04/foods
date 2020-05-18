
<?php echo form_open('users/login'); ?>

<div class="container w3-animate-zoom" style="margin-top:120px; color:white">
  <div class="row">
    <div class="col-md-3">
    </div>
    <div class="col-md-6">
      <h2 class="text-center"> <?= $title; ?><p><span class="fs-home-logo">Foodies</span><p></h2>
      <div class="form-group <?=form_error("email") ? "has-error" : null?>">
        <label>Email address</label>
        <input name="email" type="email" value="<?php echo set_value('email'); ?>" class="form-control" aria-describedby="emailHelp" placeholder="Enter email" autofocus>
        <span class='help-block' style='color:red'><?php echo form_error('email'); ?></span>
      </div>
      <div class="form-group <?=form_error("password") ? "has-error" : null?>">
        <label>Password</label>
        <input name="password" value="<?php echo set_value('password'); ?>" type="password" class="form-control" placeholder="Password">
        <span class='help-block' style='color:red'><?php echo form_error('password'); ?></span>
      </div>
      <button type="submit" class="btn btn-primary btn-block">Submit</button>
    </div>
  </div>

</div>
<?php echo form_close(); ?>
