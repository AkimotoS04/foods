

<?php echo form_open('users/register'); ?>
<div class="row" style="color:white">
  <div class="col-md-4 col-md-offset-4">
    <h2 class="text-center"> <?= $title; ?>     <span class="fs-home-logo">FoodShala</span></h2>
  <div class="form-group">
    <label>Name</label>
    <input name="name" type="text" class="form-control" placeholder="Enter name">
  </div>
  <div class="form-group">
    <label>Birth Date</label>
    <input name="Birth" type="date" class="form-control" placeholder="Enter Birthdate">
  </div>
  <div class="form-group">
    <label>Email address</label>
    <input name="email" type="email" class="form-control" aria-describedby="emailHelp" placeholder="Enter email">
    <small class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
  <label>Are You Vegan ?</label>
  <select class="form-control" name="vegan">
    <option value="1">Yes</option>
    <option value="0">No</option>
  </select>
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
  <a class="btn btn-success btn-block" href="register_restaurant" role="button" > Sell Food With Us </a>
</div>
</div>
<?php echo form_close(); ?>
