<html>
  <head>
    <title> Foodies: Meals That Matter </title>

    <!-- Meta tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Imported CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/style.css'); ?>">

    <!-- Imported Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>



    <!-- Imported Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Cookie" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
    .checked {
      color: orange;
    }
    .qty .count {
      color: #000;
      display: inline-block;
      vertical-align: top;
      font-size: 25px;
      font-weight: 700;
      line-height: 30px;
      padding: 0 2px
      ;min-width: 35px;
      text-align: center;
    }
    .qty .plus {
        cursor: pointer;
        display: inline-block;
        vertical-align: top;
        color: white;
        width: 30px;
        height: 30px;
        font: 30px/1 Arial,sans-serif;
        text-align: center;
        border-radius: 50%;
        }
    .qty .minus {
        cursor: pointer;
        display: inline-block;
        vertical-align: top;
        color: white;
        width: 30px;
        height: 30px;
        font: 30px/1 Arial,sans-serif;
        text-align: center;
        border-radius: 50%;
        background-clip: padding-box;
    }
    .minus:hover{
        background-color: #717fe0 !important;
    }
    .plus:hover{
        background-color: #717fe0 !important;
    }
    /*Prevent text selection*/
    span{
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
    }
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
    input:disabled{
        background-color:white;
    }
         
    </style>

  </head>
  <body class="scrollbar-dusty-grass thin square">

    <nav class="navbar navbar-expand-lg w3-bar w3-black navbar-custom">
      <span class="navbar-brand fs-header-title" >Foodies</span>
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
              <a class="btn btn-warning" style="margin-right:10px;" href="<?php echo base_url(); ?>foods/restaurant_menu ">Restaurant Menu</a>
            <?php endif; ?>
          <?php endif; ?>
          <?php if ($this->session->userdata('user_type') != null) : ?>
            <?php if ($this->session->userdata('user_type') == 0) : ?>
              <a class="btn btn-warning" style="margin-right:10px;" href="<?php echo base_url(); ?>users/profile ">Profile's</a>
            <?php endif; ?>
          <?php endif; ?>
          <?php if ($this->session->userdata('user_type') != null) : ?>
            <?php if ($this->session->userdata('user_type') == 1) : ?>
              <a class="btn btn-info" style="margin-right:10px;" href="<?php echo base_url(); ?>foods/view_cart">View Cart</a>
            <?php endif; ?>
          <?php endif; ?>
          <?php if ($this->session->userdata('user_type') != null) : ?>
            <?php if ($this->session->userdata('user_type') == 1) : ?>
              <a class="btn btn-warning" style="margin-right:10px;" href="<?php echo base_url(); ?>users/profile_u ">Profile's</a>
            <?php endif; ?>
          <?php endif; ?>
          <?php if ($this->session->userdata('user_type') != null) : ?>
            <?php if ($this->session->userdata('user_type') == 1) : ?>
              <a class="btn btn-warning" style="margin-right:10px;" href="<?php echo base_url(); ?>foods/view_history ">Order History</a>
            <?php endif; ?>
          <?php endif; ?>
          <?php if($this->session->userdata('user_type') != null) : ?>
          <?php if($this->session->userdata('user_type') == 0) : ?>
          <?php if(strcmp($this->session->userdata('email'),'superadmin@gmail.com') == 0) : ?>
            <a class="btn btn-warning" style = "margin-right:10px;" href="<?php echo base_url(); ?>users/new_admin">New Admin</a>
          <?php endif; ?>
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

      <?php if ($this->session->flashdata('double_email')): ?>
        <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('double_email').'</p>'; ?>
      <?php endif; ?>
      
      <?php if ($this->session->flashdata('cart_failed')): ?>
        <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('cart_failed').'</p>'; ?>
      <?php endif; ?>

      <?php if ($this->session->flashdata('not_accepted')): ?>
        <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('not_accepted').'</p>'; ?>
      <?php endif; ?>
      

      
