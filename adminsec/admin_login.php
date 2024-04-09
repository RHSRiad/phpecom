<?php 
include('../include/dbconn.php');
include("../functions/common_function.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login Page</title>
    <!-- bootstrap css link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <!-- fontawesome link -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class='bg-secondary'>



<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-center text-info my-5">Admin Login</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <img src="product_image/admin-login.jpg" alt="">
        </div>
        <div class="col-md-4">
            <form action="" method="post" autocomplete="off">
                <div class="form-outline mb-3">
                    <label for="Username" class="form-label text-center">Username</label>
                    <input type="text" name='admin_log_username'class="form-control" id="admin_username" placeholder="Enter your username"  required="required">
                </div>
                <div class="form-outline mb-3">
                    <label for="password" class="form-label text-center">password</label>
                    <input type="password" name='admin_log_password'class="form-control" id="admin_userpass"  placeholder="Enter your password"  required="required">
                </div>
                <div class="mb-3">
                        <input type="submit" value="Admin login" name="admin_login" class="bg-info py-2 px-3 text-light border-0">
                    </div>
                    <small id="user_reg_sec" class="form-text text-dark font-weight-bold my-3">Don't have an account? <a href="./admin_register.php" class="text-danger">Register</a></small>
            </form>
        </div>
    </div>
</div>


<?php 
if(isset($_POST['admin_login'])){
    $admin_log_username=$_POST['admin_log_username'];
    $admin_log_password=$_POST['admin_log_password'];
    $admin_log_query="SELECT * FROM admin where admin_name='$admin_log_username'";
    $admin_log_sql=mysqli_query($conn,$admin_log_query);
    $admin_num_rows=mysqli_num_rows($admin_log_sql);
    $admin_log_fetch=mysqli_fetch_assoc($admin_log_sql);
   
    
    if($admin_num_rows>0){
        $_SESSION['username']=$admin_log_username;
    
        if(password_verify($admin_log_password,$admin_log_fetch['admin_password'])){
          echo  "<script>alert('login successfull')</script>";
          echo "<script>window.open('index.php','_self')</script>";
        }else{
            
            echo "<script>alert('user name or password are wrong')</script>";
            echo "<script>window.open('admin_login.php','_self')</script>";
        }
       
    }else{
        echo "<script>alert('user name or password are wrong')</script>";
        echo "<script>window.open('admin_login.php','_self')</script>";

    }


}
?>





    <!-- bootstrap js -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>