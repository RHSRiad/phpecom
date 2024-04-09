<?php 


require('../include/dbconn.php');
include("../functions/common_function.php");
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
    <style>
      .cartimage{
    width:80px;
    height: 80px;
    object-fit: contain;
}
    </style>
</head>
<body>
    
<!-- navbar -->
<div class="container-fluid p-0">
    <!-- first child -->
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
  <a href="../index.php"> <img src="assets/img/logo.png"  class="logo" alt=""></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="../index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../product_all.php">products</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="#">register</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="#">contact</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="checkout_cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i> <sup><?php cartItem();?></sup></a>
      </li>
    </ul>
  </div>
</nav>

<!-- cart show -->

<?php 
cart();
?>

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
      <a class='nav-link ' href='login.php'>Welcome " . $_SESSION['username']."</a>
    </li>";
    }
    ?>

    <?php 
    if(!isset($_SESSION['username'])){
      echo "<li class='nav-item'>
      <a class='nav-link ' href='login.php'>login</a>
    </li>";
    
    }else{
      echo "<li class='nav-item'>
      <a class='nav-link ' href='logout.php'>Logout</a>
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

<div class="container">
    <div class="row">
        <form action="" method="post" class="w-100">
        <table class="table table-bordered text-center">
           

            <?php 
            
            // global $conn;
            // $ip_address = get_ip_address();
            // $total=0;
            // $cart_query="SELECT * FROM cart_details WHERE ip_address='$ip_address'";
            // $cart_sql=mysqli_query($conn,$cart_query);
            // while($cart_rows=mysqli_fetch_array($cart_sql)){
            //     $product_id=$cart_rows['id'];
            //     $product_query="SELECT * FROM product WHERE id=$product_id";
            //     $product_sql=mysqli_query($conn,$product_query);
            //     while($product_rows=mysqli_fetch_array($product_sql)){
            //         $product_price=array($product_rows['product_price']);
            //         $product_value=array_sum($product_price);
            //         $total+=$product_value;



           
            $ip_address = get_ip_address();
            $total=0;
            $cart_query="SELECT * FROM `cart_details` where ip_address='$ip_address'";
            $cart_sql=mysqli_query($conn,$cart_query);
            $cart_num_rows=mysqli_num_rows($cart_sql);
              if($cart_num_rows>0){
                ?>
                 <thead>
                <tr>
                    <th>Product Title</th>
                    <th>Product Image</th>
                    <th>Quantaty</th>
                    <th>Total price</th>
                    <th>Removed</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
             
             <?php  

            while($cart_rows=mysqli_fetch_array($cart_sql)){
              $product_id=$cart_rows['id'];
              $product_query="SELECT * FROM product where id='$product_id'";
              $product_sql=mysqli_query($conn,$product_query);
              while($product_row=mysqli_fetch_array($product_sql)){
                $total_price=array($product_row['product_price']);
                $total_value=array_sum($total_price);
                $total+=$total_value;
              
            
            ?>
                <tr>
                    <td><?php echo $product_row['product_title']?></td>
                    <td> <img src="../adminsec/product_image/<?php echo $product_row['product_image1']?>" alt="" class="cartimage"></td>
                    <td><input type="number" class="w-50 m-auto" name="pro_qty"></td>
                    <?php 
                    
                    // $ip_address = get_ip_address();
                    // if(isset($_POST['update_qty'])){
                    //     $quantaties=$_POST['pro_qty'];
                    //     $update_product="UPDATE `cart_details` SET product_qty='$quantaties' where ip_address='$ip_address'";
                    //     $product_sql=mysqli_query($conn,$update_product);
                        

                    // }

                    $ip_address = get_ip_address();
                    if(isset($_POST['update_qty'])){
                        $quantaties=$_POST['pro_qty'];
                        $cart_update_query="UPDATE cart_details set product_qty='$quantaties' where 	ip_address='$ip_address'";
                        $update_sql=mysqli_query($conn,$cart_update_query);
                        $total=$total*$quantaties;
                    }
                    
                    ?>
                    <td><?php echo $product_row['product_price']?></td>
                    <td><input type="checkbox" name="delete_check[]" value="<?php echo $product_row['id']?>" ></td>
                    <td>
                        <!-- <a href="#"><button class="bg-info p-1">Update</button></a>
                        <a href="#"><button class="bg-info p-1">Delete</button></a> -->
                        <input type="submit" value="Update" class="bg-info p-1" name="update_qty">
                        <input type="submit" value="Delete" class="bg-info p-1" name="delete_data">
                    </td>
                </tr>

                <?php 
                }
                }
              }
              
              else{
                echo "<h2 class='text-center text-danger'>The cart is empty</h2>";
              }
              
              ?>

            </tbody>
        </table>
        <!-- subtotal -->
        <div class="d-flex my-3">

              <?php 
                $ip_address = get_ip_address();
                $cart_query="SELECT * FROM `cart_details` where ip_address='$ip_address'";
                $cart_sql=mysqli_query($conn,$cart_query);
                $cart_num_rows=mysqli_num_rows($cart_sql);
                if($cart_num_rows>0){
              ?>

            <h3> Subtotal : <span class="mx-3"><?php echo $total;?>/-</span></h3>
            <input class="bg-info border-0 p-2" type="submit" value="continue shopping" name='continue_shopping'>
            <button class="bg-secondary border-0 p-2 mx-2"> <a href="checkout.php" class="text-light text-decoration-none">Checkout</a></button>

            <?php }
            else{
              echo "<input class='bg-info border-0 p-2' type='submit' value='continue shopping' name='continue_shopping'>";
            }
            if(isset($_POST['continue_shopping'])){
              echo "<script>window.open('../index.php','_self')</script>";
            }
            ?>
        </div>
        </form>
    </div>
</div>

<!-- delete query function  -->

<?php 

function removecartitem(){
  // global $conn;
  // if(isset($_POST['delete_data'])){
  //   foreach($_POST['delete_check'] as $removeitemstore){
  //     echo $removeitemstore;
  //     $delete_cart_query="DELETE FROM cart_details where id=$removeitemstore";
  //     $delete_sql=mysqli_query($conn,$delete_cart_query);
  //     if($delete_sql){
  //       echo "<script>alert('<h2>Delete korte parchi </h2>')</script>";
  //     }
  //   }
  // }

global $conn;

    if(isset($_POST['delete_data'])){
      foreach($_POST['delete_check'] as $remove_id){
        $remove_query="DELETE FROM cart_details where id=$remove_id";
        $remove_sql=mysqli_query($conn,$remove_query);
        if($remove_sql){
          echo "<script>windo.open('checkout_cart.php','_self')</script>";
        }
      }
    }

  }

echo $show_id=removecartitem();
?>

<!-- footer area -->

<!-- Cart action center -->




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

