<?php 
include('../include/dbconn.php');
include("../functions/common_function.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration Page</title>
    <!-- bootstrap css link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <!-- fontawesome link -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class='bg-secondary'>



<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-center text-info my-5">Admin Registration</h2>
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
                    <input type="text" name='admin_username'class="form-control" id="admin_username" placeholder="Enter your Firstname"  required="required">
                </div>
                <div class="form-outline mb-3">
                    <label for="admin_email" class="form-label text-center">Email</label>
                    <input type="email" name='admin_email'class="form-control"  placeholder="Enter your Email"  required="required">
                </div>
                <div class="form-outline mb-3">
                    <label for="password" class="form-label text-center">password</label>
                    <input type="password" name='admin_reg_password'class="form-control"  placeholder="Enter your password"  required="required">
                </div>
                
                <div class="form-outline mb-3">
                    <label for="password" class="form-label text-center">Confirm password</label>
                    <input type="password" name='admin_reg_con_password'class="form-control" placeholder="Enter your confirm password"  required="required">
                </div>
                <!-- Address input section -->
                <div class="form-outline mb-2">
                        <label for="user_address" class="form-label">Address</label>
                        <input type="text" name="admin_address" id="user_address" placeholder="Enter Address" class="form-control" required="required" autocomplete="off">
                    </div>
                    <!-- Contact input section -->
                    <div class="form-outline mb-2">
                        <label for="user_contact" class="form-label">Contact</label>
                        <input type="text" name="admin_contact" id="user_contact" placeholder="Contact" class="form-control" required="required" autocomplete="off">
                    </div>
                <div class="mb-3">
                        <input type="submit" value="Admin Register" name="admin_reg" class="bg-info py-2 px-3 text-light border-0">
                    </div>
                    <small  class="form-text text-dark font-weight-bold my-3">You have an account? <a href="./admin_login.php" class="text-danger">Login</a></small>
            </form>
        </div>
    </div>
</div>


<!-- Admin registration in php -->
<?php 
if(isset($_POST['admin_reg'])){

    $admin_username=$_POST['admin_username'];
    $admin_email=$_POST['admin_email'];
    $admin_reg_password=$_POST['admin_reg_password'];
    $admin_reg_con_password=$_POST['admin_reg_con_password'];
    $admin_secure_pass=password_hash("$admin_reg_password",PASSWORD_DEFAULT);
    $admin_secure_confirm_pass=password_hash("$admin_reg_con_password",PASSWORD_DEFAULT);
    $admin_address=$_POST['admin_address'];
    $admin_contact=$_POST['admin_contact'];

    $admin_single_query="SELECT * from admin where admin_name='$admin_username' and admin_email='$admin_email'";
    $admin_single_sql=mysqli_query($conn,$admin_single_query);
    $admin_rows=mysqli_num_rows($admin_single_sql);
    if($admin_rows>0){
        echo "<script>alert('Data already exist')</script>";
    }else if($admin_reg_password != $admin_reg_con_password){
        echo "<script>alert('password do not match')</script>";
    }else{
        $admin_query="INSERT INTO admin (admin_name,admin_email,admin_password,admin_confirm_password,admin_address,admin_contact,reg_date) values('$admin_username','$admin_email','$admin_secure_pass','$admin_secure_confirm_pass','$admin_address','$admin_contact',NOW())";
        $admin_sql=mysqli_query($conn,$admin_query);
        if($admin_sql){
            echo "<script>alert('Registration successfull')</script>";
            echo "<script>window.open('admin_login.php','_self')</script>";
        }
    }

}
?>






    <!-- bootstrap js -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>