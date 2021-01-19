<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title><?php echo $title;?></title>
  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url(""); ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="<?php echo base_url(""); ?>assets/css/sb-admin-2.min.css" rel="stylesheet">
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"> -->
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script> -->
  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script> -->
  <!-- <script src="<?php echo base_url(""); ?>assets/vendor/jquery/jquery.min.js"></script> -->
  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url(""); ?>assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url(""); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url(""); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>
  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url(""); ?>assets/js/sb-admin-2.min.js"></script>
  <!-- Page level plugins -->
  <script src="<?php echo base_url(""); ?>assets/vendor/chart.js/Chart.min.js"></script>
  <!-- Page level custom scripts -->
  <script src="<?php echo base_url(""); ?>assets/js/demo/chart-area-demo.js"></script>
  <script src="<?php echo base_url(""); ?>assets/js/demo/chart-pie-demo.js"></script>
</head>
<!-- Begin Page Content -->
<div class="container ">
  <div id="page-top" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#page-top" data-slide-to="0" class="active"></li>
      <li data-target="#page-top" data-slide-to="1"></li>
      <li data-target="#page-top" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <!-- <div class=""> -->
      <div class=" carousel-item active jumbotron jumbotron-fluid text-white rounded bg-gradient-dark  text-center" style="margin-bottom:0;">
        <div class="container">
          <h1 class="display">“Any fool can know. The point is to understand.”</h1>
          <p class="lead">― Albert Einstein</p>
        </div>
        <!-- </div> -->
      </div>
      <div class="carousel-item">
        <div class="jumbotron jumbotron-fluid text-white rounded bg-gradient-dark  text-center" style="margin-bottom:0;">
          <div class="container">
            <h1 class="display-7">“The knowledge of all things is possible” </h1>
            <p class="lead">― Leonardo da Vinci</p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <div class="jumbotron jumbotron-fluid text-white rounded bg-gradient-dark  text-center" style="margin-bottom:0;">
          <div class="container">
            <h1 class="display-5">“The only true wisdom is in knowing you know nothing.” </h1>
            <p class="lead">― Socrates</p>
          </div>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#page-top" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#page-top" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  <div class="navbar border rounded ">
    <a class="nav-link active" href="<?php echo base_url(); ?>">Home</a>
    <a class="nav-link" href="<?php echo base_url('book/book_list'); ?>">Book List</a>
    <div class="p-2 ml-auto">
      <?php
      $cart = 'Cart : ' . $this->cart->total_items() . 'items'
      ?>
      <?php echo anchor('book/cartdetail', $cart) ?>
    </div>
    <div class="p-2">
      <?php
      if ($this->session->userdata('username')) 
      ?>
        <div>
          <?php echo anchor('order/profile/'.$this->session->userdata('s_id'), 'Orders') ?> 
        </div>
    </div>
    <div class="p-2">
      <?php
      if ($this->session->userdata('username')) {
      ?>
        <div>Welcome <?php echo $this->session->userdata('username') ?>
          <?php echo anchor('acc/logout', 'Logout') ?>
        <?php } else { ?>
          <?php echo anchor('acc/login', 'Login') ?>
        <?php } ?>
        </div>
    </div>
  </div>
</div>