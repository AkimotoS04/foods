<?php echo $navbar; ?>
<div class="w3-container w3-center w3-animate-zoom" style="margin-top:60px;color:white">
  <h2 class="display-4 text-center"> Welcome to <span class="fs-home-logo">FoodShala</span> <br> Meals That Matter.</h2>
  <?php if (!$this->session->userdata('logged_in')) : ?>
  <div class= "fs-home-main-buttons">
    <a class="my-super-cool-btn"  type="submit" href="<?php echo(base_url().'users/register'); ?>" role="button"> 
    <div class="dots-container" >
      <div class="dot"></div>
      <div class="dot"></div>
      <div class="dot"></div>
      <div class="dot"></div>
    </div>
    <span style="color:white">Register</span>
  </a>
    <a class="my-super-cool-btn" type="submit" href="<?php echo(base_url().'users/login'); ?>" role="button">
    <div class="dots-container" >
      <div class="dot"></div>
      <div class="dot"></div>
      <div class="dot"></div>
      <div class="dot"></div>
    </div>
    <span style="color:white">Login</span>
  </a>
  </div>
  <?php endif; ?>
</div>