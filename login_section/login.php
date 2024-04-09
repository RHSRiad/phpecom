<?php 
include('../include/dbconn.php');
include("../functions/common_function.php");


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User -Login</title>
        <!-- bootstrap css link -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <!-- css link -->
        <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-center">User Login</h2>
        </div>
    </div>
    <div class="row d-flex justify-content-center align-items-center " >
        <div class="col-md-6">
            <form action="" method="post">
                
                    <div class="form-group ">
                        <label for="Username">Username</label>
                        <input type="text" name='user_username'class="form-control" id="user_username" aria-describedby="emailHelp" placeholder="Enter your username" autocomplete="off" required="required">
                        
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" name='user_password' class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <input type="submit" class="btn btn-primary" name="login_sec" value="Login">
                    
                    <small id="emailHelp" class="form-text text-muted font-weight-bold my-3">Already have an account? <a href="./user_registration.php" class="text-danger">Register Now</a></small>
                
            </form>
        </div>
    </div>
</div>

</body>
</html>

<?php 
if(isset($_POST['login_sec'])){
global $conn;
$user_username=$_POST['user_username'];
$user_password=$_POST['user_password'];

$login_query="SELECT * FROM user where username='$user_username'";
$login_sql=mysqli_query($conn,$login_query);
$login_num_rows=mysqli_num_rows($login_sql);
$fatch_data=mysqli_fetch_assoc($login_sql);
$user_ip=get_ip_address();

// cart item

$cart_item_query="SELECT * FROM cart_details where ip_address='$user_ip'";
$cart_sql=mysqli_query($conn,$cart_item_query);
$cart_rows=mysqli_num_rows($cart_sql);

if($login_num_rows>0){
    $_SESSION['username']=$user_username;
    if(password_verify($user_password,$fatch_data['userpassword'])){
        $_SESSION['username']=$user_username;
        if($login_num_rows==1 and $cart_rows==0){
            echo "<script>alert('Login Successfully')</script>";
            echo "<script>window.open('../profile.php','_self')</script>";
        }
        
        else{
            $_SESSION['username']=$user_username;
            echo "<script>alert('Login Successfully')</script>";
            echo "<script>window.open('payment.php','_self')</script>";
        }
    }else{
        echo "<script>alert('user name or password are wrong')</script>";
    }
}else{
    echo "<script>alert('user name or password are wrong')</script>";
}
}
?>