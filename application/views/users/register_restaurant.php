

<?php echo form_open('users/register_restaurant'); ?>
<div class="row w3-container w3-animate-zoom" style="color:white; margin-top:40px">
  <div class="col-md-4 col-md-offset-4">
    <h2 class="text-center"> Sign Up - Admin     <span class="fs-home-logo">FoodShala</span></h2>
  <div class="form-group <?=form_error("name") ? "has-error" : null?>">
    <label>Name</label>
    <input name="name"  value="<?php echo set_value('name'); ?>" type="text" class="form-control" placeholder="Enter name">
    <span class='help-block' style='color:red'><?php echo form_error('name'); ?></span>
  </div>
  <div class="form-group <?=form_error("Birth") ? "has-error" : null?>">
    <label>Birth Date</label>
    <input name="Birth" value="<?php echo set_value('Birth'); ?>" type="date" class="form-control" placeholder="Enter Birthdate">
    <span class='help-block' style='color:red'><?php echo form_error('Birth'); ?></span>
  </div>
  <div class="form-group <?=form_error("email") ? "has-error" : null?>">
    <label>Email address</label>
    <input name="email" value="<?php echo set_value('email'); ?>" type="email" class="form-control" aria-describedby="emailHelp" placeholder="Enter email">
    <small class="form-text text-muted">We'll never share your email with anyone else.</small>
    <span class='help-block' style='color:red'><?php echo form_error('email'); ?></span>
  </div>
  <div class="form-group <?=form_error("email") ? "has-error" : null?>">
    <label>Password</label>
    <input name="password" type="password" class="form-control" placeholder="Password">
    <span class='help-block' style='color:red'><?php echo form_error('password'); ?></span>
  </div>
  <div class="form-group <?=form_error("email") ? "has-error" : null?>">
    <label>Confirm Password</label>
    <input name="password2" type="password" class="form-control" placeholder="Confirm Password">
    <span class='help-block' style='color:red'><?php echo form_error('password2'); ?></span>
  </div>
  <button type="submit" class="btn btn-primary btn-block">Register</button>
</div>
</div>
<?php echo form_close(); ?>
