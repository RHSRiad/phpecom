<?php 
include('../include/dbconn.php');
include("../functions/common_function.php");
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User -registration</title>
            <!-- bootstrap css link -->
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid mb-3">
        <h2 class="text-center text-denger">New user Registration</h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-md-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <!-- username input section -->
                    <div class="form-outline mb-2">
                        <label for="user_username" class="form-label">Username</label>
                        <input type="text" name="user_username" id="user_username" placeholder="Enter Username" class="form-control" required="required" autocomplete="off">
                    </div>
                    <!-- email input section -->
                    <div class="form-outline mb-2">
                        <label for="user_email" class="form-label">Email</label>
                        <input type="email" name="user_email" id="user_email" placeholder="Enter Email" class="form-control" required="required" autocomplete="off">
                    </div>
                    <!-- image input section -->
                    <div class="form-outline mb-2">
                        <label for="user_image" class="form-label">User image</label>
                        <input type="file" name="user_image" id="user_image"  class="form-control" required="required" >
                    </div>
                    <!-- Password input section -->
                    <div class="form-outline mb-2">
                        <label for="user_password" class="form-label">Password</label>
                        <input type="password" name="user_password" id="user_password" placeholder="Enter Password" class="form-control" required="required" autocomplete="off">
                    </div>
                    <!-- confirm Password input section -->
                    <div class="form-outline mb-2">
                        <label for="user_confirm_password" class="form-label">Confirm Password</label>
                        <input type="password" name="user_confirm_password" id="user_confirm_password" placeholder="Enter Password" class="form-control" required="required" autocomplete="off">
                    </div>
                    <!-- Address input section -->
                    <div class="form-outline mb-2">
                        <label for="user_address" class="form-label">Address</label>
                        <input type="text" name="user_address" id="user_address" placeholder="Enter Address" class="form-control" required="required" autocomplete="off">
                    </div>
                    <!-- Contact input section -->
                    <div class="form-outline mb-2">
                        <label for="user_contact" class="form-label">Contact</label>
                        <input type="text" name="user_contact" id="user_contact" placeholder="Contact" class="form-control" required="required" autocomplete="off">
                    </div>
                    <div class="mb-2">
                        <input type="submit" value="Register" name="user_register" class="bg-info py-2 px-3 text-light border-0">
                    </div>
                    <small id="user_reg_sec" class="form-text text-muted font-weight-bold my-3">Don't have an account? <a href="./login.php" class="text-danger">Login</a></small>
                </form>
            </div>
        </div>
    </div>

</body>
</html>

<!-- data insert query -->
<?php 
if(isset($_POST['user_register'])){
    $user_username=$_POST['user_username'];
    $user_email=$_POST['user_email'];
    $user_password=$_POST['user_password'];
    $user_confirm_password=$_POST['user_confirm_password'];
    $secure_password=password_hash("$user_password", PASSWORD_DEFAULT);
    $user_address=$_POST['user_address'];
    $user_contact=$_POST['user_contact'];
    $ip_address=get_ip_address();

    $user_image=$_FILES['user_image']['name'];
    $user_image_tmp=$_FILES['user_image']['tmp_name'];
    move_uploaded_file($user_image_tmp,"./../uploaded/$user_image");
    
    // single data insert

        $data_query="SELECT * FROM user WHERE username='$user_username' or usermail='$user_email'";
        $data_sql=mysqli_query($conn,$data_query);
        $rows=mysqli_num_rows($data_sql);
        if($rows>0){
            echo "<script>alert('Username already exist')</script>";
        }else if($user_password!=$user_confirm_password){
            echo "<script>alert('Password do not match')</script>";
        }
        else{
        // insert query
        $insert_query="INSERT INTO user (username,usermail,userimage,userpassword,ip_address,useraddress,usercontact) VALUE('$user_username','$user_email','$user_image','$secure_password','$ip_address','$user_address','$user_contact')";
        $sql=mysqli_query($conn,$insert_query);
        if($sql){
            echo "<script>alert('data insert done')</script>";
            echo "<script>window.open('login.php','_self')</script>";
        }
        }

        //selecting cart items
        $select_cart_query="select * from cart_details where ip_address='$ip_address'";
        $select_cart_sql=mysqli_query($conn,$select_cart_query);
        $select_rows=mysqli_num_rows($select_cart_sql);
        if($select_rows>0){
            $_SESSION['username']=$user_username;
            echo "<script>alert('Already item add your cart')</script>";
            echo "<script>window.open('checkout.php','_self')</script>";
        }


}
?>
