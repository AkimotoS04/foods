<div class="jumbotron w3-container w3-center w3-animate-zoom" style="margin-top:100px; opacity:0.9">
  <h2 class="display-4 text-center"> Welcome to <span class="fs-home-logo">FoodShala</span> <br> Meals That Matter.</h2>
  <?php if (!$this->session->userdata('logged_in')) : ?>
  <div class= "fs-home-main-buttons">
    <a class="btn btn-primary fs-home-main-button" type="submit" href="<?php echo(base_url().'users/register'); ?>" role="button">Register</a>
    <a class="btn btn-success fs-home-main-button" type="submit" href="<?php echo(base_url().'users/login'); ?>" role="button">Login</a>
  </div>
  <?php endif; ?>
</div>
