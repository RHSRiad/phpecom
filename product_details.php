<?php 
require('include/dbconn.php');
include("functions/common_function.php");
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP e-comm project</title>

    <!-- bootstrap css link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- fontawesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- css link -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
<!-- navbar -->
<div class="container-fluid p-0">
    <!-- first child -->
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
  <a href="index.php"> <img src="assets/img/logo.png"  class="logo" alt=""></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="product_all.php">products</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="#">register</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="#">contact</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="#"><i class="fa fa-shopping-cart" aria-hidden="true"></i> <sup><?php cartItem();?></sup></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Total Price: <span><?php cart_total();?>tk</span></a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" action="search_product.php" method="get"> 
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search_input">
      <!-- <button class="" type="submit">Search</button> -->
      <input type="submit" value="Search" class="btn btn-outline-light my-2 my-sm-0" name="search_action">
    </form>
  </div>
</nav>

<!-- second child sub header -->

<div class="navbar navbar-expand-lg navbar-dark bg-secondary ">
  <ul class="navbar-nav mr-auto ">
  <?php 
    if(!isset($_SESSION['username'])){
      echo "<li class='nav-item'>
      <a class='nav-link ' href='#'>Welcome Guest</a>
    </li>";
    
    }else{
      echo "<li class='nav-item'>
      <a class='nav-link ' href='profile.php'>Welcome " . $_SESSION['username']."</a>
    </li>";
    }
    ?>

    <?php 
    if(!isset($_SESSION['username'])){
      echo "<li class='nav-item'>
      <a class='nav-link ' href='login_section/login.php'>login</a>
    </li>";
    
    }else{
      echo "<li class='nav-item'>
      <a class='nav-link ' href='login_section/logout.php'>Logout</a>
    </li>";
    }
    ?>
    </ul>
</div>

<!-- third child product title -->

<div class="text-center text-secondary p-2">
  <h2>Supper store</h2>
  <p>Choose your best product which is you need</p>
</div>

<!-- forth child product section -->

<div class="row">
  <div class="col-md-10">
    <div class="row">
    
    <?php 
   
   product_details();
   getuniqeProduct();
   getuniqebrand();
      
    ?>
     
    </div>
  </div>
  <div class="col-md-2 bg-secondary p-0">
  <ul class="navbar-nav text-center">
      <li class="nav-item bg-info">
        <h3><a class="nav-link text-light" href="#">Brand</a></h3>
      </li>

      <?php 
      
      getBrand();

      ?>
    </ul>

    <!-- category list -->
    <ul class="navbar-nav text-center">
      <li class="nav-item bg-info">
        <h3><a class="nav-link text-light" href="#">Category</a></h3>
      </li>

      <?php 
     getCategories();
     
     ?>



    </ul>

  </div>
</div>


<!-- footer area -->

<div class="conainer-fluid bg-info text-center p-3">
    <p>All right reserved | Develope by RHS Riad 2023</p>
</div>


</div>



<!-- bootstrap js -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>