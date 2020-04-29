<?php echo $navbar; ?>
<div class="jumbotron w3-container w3-center w3-animate-zoom" style="color:white; background-color: rgba(255, 255, 255, 0); padding-top: 10%;">
  <h2 class="display-4 text-center"> Welcome to <span class="monospace">FoodShala</span> <br> Meals That Matter.</h2>
  <br/><br/>  
  <?php if (!$this->session->userdata('logged_in')) : ?>
    <!--Button-->
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
  <?php endif; ?>
</div>