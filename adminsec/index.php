<?php 
include('../include/dbconn.php');
include("../functions/common_function.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin Section</title>
        <!-- bootstrap css link -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <!-- fontawesome link -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- css link -->
        <link rel="stylesheet" href="../style.css">
        <style>
            .admin_product_image{
                width: 100px;
                object-fit: contain;
            }
            .edit_product_image2{
                width: 50px;    
                margin-right: 0px;
            }
            body{
                overflow-x:hidden;
            }
            .admin_user_image{
                width: 100px;
                height: 100px;
                object-fit: contain;
            }
        </style>
</head>
<body>
    <!-- Header bar section -->
<div class="container-fluid p-0"> 

    <nav class="navbar navbar-expand-lg navbar-light bg-info">
        <div class="container-fluid">
            <img src="../assets/img/logo.png" alt="">
            <nav class="navbar navbar-expand-lg">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="#" class="nav-link">Guest Admin</a>
                    </li>
                </ul>
            </nav>
        </div>
    </nav>

</div>
<!-- Admin heading section -->

<div class="bg-light">
    <h3 class="text-center p-2">Admin Panel</h3>
</div>


<!-- admin menu section -->

<div class="row">
    <div class="col-md-12 d-flex bg-secondary align-items-center p-1">
        <div class="p-2">
            <a href="#"><img class="imageresize" src="../assets/img/user.jpg" alt=""></a>
            <p class="text-dark text-center">Admin Name</p>
        </div>
        <!-- admin button link -->
        <div class="button text-center">
            <button class="p-0"><a href="insert_product.php" class="nav-link bg-info text-light">Insert products</a></button>
            <button class="p-0"><a href="index.php?view_product" class="nav-link bg-info text-light">view products</a></button>
            <button class="p-0"><a href="index.php?cat_insert" class="nav-link bg-info text-light">Insert category</a></button>
            <button class="p-0"><a href="index.php?view_category" class="nav-link bg-info text-light">view category</a></button>
            <button class="p-0"><a href="index.php?brand_insert" class="nav-link bg-info text-light">Insert brand</a></button>
            <button class="p-0"><a href="index.php?view_brand" class="nav-link bg-info text-light">view brand</a></button>
            <button class="p-0"><a href="index.php?order_list" class="nav-link bg-info text-light">All order</a></button>
            <button class="p-0"><a href="index.php?payment_order" class="nav-link bg-info text-light">All Payment</a></button>
            <button class="p-0"><a href="index.php?user_list" class="nav-link bg-info text-light">List user</a></button>
            <button class="p-0"><a href="admin_logout.php" class="nav-link bg-info text-light">Logout</a></button>

        </div>
    </div>
</div>


<?php 
    
    if(isset($_GET['cat_insert'])){
        include('cat_insert.php');
    }

    if(isset($_GET['brand_insert'])){
        include('brand_insert.php');
    }
    if(isset($_GET['view_product'])){
        include('view_product.php');
    }
    if(isset($_GET['edit_table'])){
        include('edit_data.php');
    }
    if(isset($_GET['delete_table'])){
        include('delete_table.php');
    }
   
    
    if(isset($_GET['view_category'])){
        include('view_category.php');
    }
    if(isset($_GET['category_table'])){
        include('edit_category.php');
    }
    if(isset($_GET['delete_category'])){
        include('delete_category.php');
    }
    if(isset($_GET['view_brand'])){
        include('view_brand.php');
    }
    if(isset($_GET['edit_brand'])){
        include('edit_brand.php');
    }
    
    if(isset($_GET['delete_brand'])){
        include('delete_brand.php');
    }
    if(isset($_GET['order_list'])){
        include('order_list.php');
    }
    if(isset($_GET['delete_order'])){
        include('delete_order.php');
    }
    if(isset($_GET['payment_order'])){
        include('payment_order.php');
    }
    
    if(isset($_GET['delete_payment'])){
        include('delete_payment.php');
    }
    if(isset($_GET['user_list'])){
        include('user_list.php');
    }
    
    if(isset($_GET['user_delete'])){
        include('user_delete.php');
    }
    
    
    ?>


<!-- bootstrap js -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>