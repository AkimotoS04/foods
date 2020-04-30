<html>
  <head>
    <title> FoodShala: Meals That Matter </title>
    
    <!-- Meta tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Imported stylesheet -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">

    <!-- Imported Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <!-- Imported Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Cookie" rel="stylesheet">

  <style>
    .monospace {
      font-family: "Lucida Console", Courier, monospace;
    }
    
    .banner{
	background:url(/foods/images/banner.jpg) no-repeat center top;
	background-size:cover;
	min-height:100%;
  }

  .bannerlogin{
	background:url(./foods/images/banner.jpg) no-repeat center top;
	background-attachment:fixed;
	background-size:cover;
	min-height:100%;
  }

  .kepala {
  color: white;
  }

  .transbox {
  margin: 30px;
  background-color: #ffffff;
  border: 1px solid black;
  opacity: 0.6;
}

.my-super-cool-btn{
  position:relative;
  text-decoration:none;
  color:#fff;
  letter-spacing:1px;
  font-size:2rem;
  box-sizing:border-box;
}
.my-super-cool-btn span{
  position:relative;
  box-sizing:border-box;
  display:flex;
  align-items:center;
  justify-content:center;
  width:200px;
  height:200px;
}
.my-super-cool-btn span:before{
  content:'';
  width:100%;
  height:100%;
  display:block;
  position:absolute;
  border-radius:100%;
  border:7px solid #F3CF14;
  box-sizing:border-box;
  transition: all .85s cubic-bezier(0.25, 1, 0.33, 1);
  box-shadow: 0 30px 85px rgba(0,0,0,0.14), 0 15px 35px rgba(0,0,0,0.14);
}
.my-super-cool-btn:hover span:before{
  transform:scale(0.8);
  box-shadow: 0 20px 55px rgba(0,0,0,0.14), 0 15px 35px rgba(0,0,0,0.14);
}
.my-super-cool-btn .dots-container{
  opacity:0;
  animation: intro 1.6s;
  animation-fill-mode: forwards;
}
.my-super-cool-btn .dot{
  width:8px;
  height:8px;
  display:block;
  background-color:#F3CF14;
  border-radius:100%;
  position:absolute;
  transition: all .85s cubic-bezier(0.25, 1, 0.33, 1);
}
.my-super-cool-btn .dot:nth-child(1){
  top:50px;
  left:50px;
  transform:rotate(-140deg);
  animation: swag1-out 0.3s;
  animation-fill-mode: forwards;
  opacity:0;
}
.my-super-cool-btn .dot:nth-child(2){
  top:50px;
  right:50px;
  transform:rotate(140deg);
  animation: swag2-out 0.3s;
  animation-fill-mode: forwards;
  opacity:0;
}
.my-super-cool-btn .dot:nth-child(3){
  bottom:50px;
  left:50px;
  transform:rotate(140deg);
  animation: swag3-out 0.3s;
  animation-fill-mode: forwards;
  opacity:0;
}
.my-super-cool-btn .dot:nth-child(4){
  bottom:50px;
  right:50px;
  transform:rotate(-140deg);
  animation: swag4-out 0.3s;
  animation-fill-mode: forwards;
  opacity:0;
}
.my-super-cool-btn:hover .dot:nth-child(1){
  animation: swag1 0.3s;
  animation-fill-mode: forwards;
}
.my-super-cool-btn:hover .dot:nth-child(2){
  animation: swag2 0.3s;
  animation-fill-mode: forwards;
}
.my-super-cool-btn:hover .dot:nth-child(3){
  animation: swag3 0.3s;
  animation-fill-mode: forwards;
}
.my-super-cool-btn:hover .dot:nth-child(4){
  animation: swag4 0.3s;
  animation-fill-mode: forwards;
}
@keyframes intro {
   0% {
     opacity:0;
  }
  100% {
     opacity:1;
  }
}
@keyframes swag1 {
   0% {
     top:50px;
     left:50px;
     width:8px;
  }
  50% {
    width:30px;
    opacity:1;
  }
  100% {
     top:20px;
     left:20px;
     width:8px;
     opacity:1;
  }
}
@keyframes swag1-out {
   0% {
     top:20px;
     left:20px;
     width:8px;
  }
  50% {
     width:30px;
    opacity:1;
  }
  100% {
     top:50px;
     left:50px;
     width:8px;
    opacity:0;
  }
}
@keyframes swag2 {
   0% {
     top:50px;
     right:50px;
     width:8px;
  }
  50% {
    width:30px;
    opacity:1;
  }
  100% {
     top:20px;
     right:20px;
     width:8px;
     opacity:1;
  }
}
@keyframes swag2-out {
   0% {
     top:20px;
     right:20px;
     width:8px;
  }
  50% {
     width:30px;
    opacity:1;
  }
  100% {
     top:50px;
     right:50px;
     width:8px;
    opacity:0;
  }
}
@keyframes swag3 {
   0% {
     bottom:50px;
     left:50px;
     width:8px;
  }
  50% {
    width:30px;
    opacity:1;
  }
  100% {
     bottom:20px;
     left:20px;
     width:8px;
     opacity:1;
  }
}
@keyframes swag3-out {
   0% {
     bottom:20px;
     left:20px;
     width:8px;
  }
  50% {
     width:30px;
    opacity:1;
  }
  100% {
     bottom:50px;
     left:50px;
     width:8px;
    opacity:0;
  }
}
@keyframes swag4 {
   0% {
     bottom:50px;
     right:50px;
     width:8px;
  }
  50% {
    width:30px;
    opacity:1;
  }
  100% {
     bottom:20px;
     right:20px;
     width:8px;
     opacity:1;
  }
}
@keyframes swag4-out {
   0% {
     bottom:20px;
     right:20px;
     width:8px;
  }
  50% {
     width:30px;
    opacity:1;
  }
  100% {
     bottom:50px;
     right:50px;
     width:8px;
    opacity:0;
  }
}

.imgzoom {
  transition: transform .2s; /* Animation */
}

.imgzoom:hover {
  transform: scale(1.05); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
}

    </style>

  </head>
  <body>
    
    <nav class="navbar navbar-expand-lg w3-bar w3-black navbar-custom">
      <span class="navbar-brand fs-header-title" >FoodShala</span>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse">
        <div class="navbar-nav">
          <a class="w3-bar-item w3-button" href="<?php echo base_url(); ?>">Home <span class="sr-only">(current)</span></a>
          <a class="w3-bar-item w3-button" href="<?php echo base_url(); ?>foods/index">Foods</a>
          <a class="w3-bar-item w3-button" href="<?php echo base_url(); ?>about/index">About</a>

          <?php if ($this->session->userdata('user_type') != null) : ?>
            <?php if ($this->session->userdata('user_type') == 0) : ?>
              <a class="btn btn-info" style="margin-right:10px;" href="<?php echo base_url(); ?>foods/add_menu">Add Menu Items</a>
            <?php endif; ?>
          <?php endif; ?>
          <?php if ($this->session->userdata('user_type') != null) : ?>
            <?php if ($this->session->userdata('user_type') == 0) : ?>
              <a class="btn btn-warning" style="margin-right:10px;" href="<?php echo base_url(); ?>foods/view_orders">View Orders</a>
            <?php endif; ?>
          <?php endif; ?>
          <?php if ($this->session->userdata('user_type') != null) : ?>
            <?php if ($this->session->userdata('user_type') == 0) : ?>
              <a class="btn btn-warning" href="<?php echo base_url(); ?>foods/restaurant_menu ">Restaurant Menu</a>
            <?php endif; ?>
          <?php endif; ?>
          <?php if ($this->session->userdata('user_type') != null) : ?>
            <?php if ($this->session->userdata('user_type') == 1) : ?>
              <a class="btn btn-info" href="<?php echo base_url(); ?>foods/view_cart">View Cart</a>
            <?php endif; ?>
          <?php endif; ?>

        </div>
      </div>
      <div class="collapse navbar-collapse justify-content-end">
        <div class="navbar-nav">
          <?php if ($this->session->userdata('logged_in')) : ?>
            <a class="btn btn-danger" href="<?php echo base_url(); ?>users/logout">Logout ( <?php echo ucwords($this->session->userdata('name')); ?> )</a>
          <?php endif; ?>
        </div>
      </div>
    </nav>

    <div class="banner">
    <div class="container">
      <!-- Flash Messages -->
      <?php if ($this->session->flashdata('user_registered')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_registered').'</p>'; ?>
      <?php endif; ?>

      <?php if ($this->session->flashdata('login_failed')): ?>
        <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('login_failed').'</p>'; ?>
      <?php endif; ?>

      <?php if ($this->session->flashdata('food_ordered')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('food_ordered').'</p>'; ?>
      <?php endif; ?>

      <?php if ($this->session->flashdata('added_to_cart')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('added_to_cart').'</p>'; ?>
      <?php endif; ?>

      <?php if ($this->session->flashdata('add_cart_failed')): ?>
        <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('add_cart_failed').'</p>'; ?>
      <?php endif; ?>

      <?php if ($this->session->flashdata('order_failed')): ?>
        <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('order_failed').'</p>'; ?>
      <?php endif; ?>
      