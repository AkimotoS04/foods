

<?php echo form_open('users/register_restaurant'); ?>
<div class="row" style="color:white; margin-top:40px">
  <div class="col-md-4 col-md-offset-4">
    <h2 class="text-center"> Sign Up - Admin     <span class="fs-home-logo">FoodShala</span></h2>
  <div class="form-group">
    <label>Name</label>
    <input name="name" type="text" class="form-control" placeholder="Enter name">
  </div>
  <div class="form-group">
    <label>Email address</label>
    <input name="email" type="email" class="form-control" aria-describedby="emailHelp" placeholder="Enter email">
    <small class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label>Password</label>
    <input name="password" type="password" class="form-control" placeholder="Password">
  </div>
  <div class="form-group">
    <label>Confirm Password</label>
    <input name="password2" type="password" class="form-control" placeholder="Comfirm Password">
  </div>
  <?php echo validation_errors(); ?>
  <button type="submit" class="btn btn-primary btn-block">Register</button>
</div>
</div>
<?php echo form_close(); ?>
