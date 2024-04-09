<?php 
if(isset($_GET['edit_account'])){
    $session_name=$_SESSION['username'];
    $edit_query="SELECT * FROM user where username='$session_name'";
    $edit_result=mysqli_query($conn,$edit_query);
    $edit_rows=mysqli_fetch_assoc($edit_result);
    $user_id=$edit_rows['id'];
    $edit_username=$edit_rows['username'];
    $edit_usermail=$edit_rows['usermail'];
    $edit_useraddress=$edit_rows['useraddress'];
    $edit_usercontact=$edit_rows['usercontact'];
}
// edit account update
if(isset($_POST['user_update'])){

    $update_username=$_POST['update_username'];
    $update_email=$_POST['update_email'];
    $update_address=$_POST['update_address'];
    $update_contact=$_POST['update_contact'];

    $update_image=$_FILES['update_image']['name'];
    $update_image_tmp=$_FILES['update_image']['tmp_name'];
    move_uploaded_file($update_image_tmp,"./uploaded/$update_image");


    $update_query="UPDATE user SET username='$update_username', usermail='$update_email' ,userimage='$update_image', useraddress='$update_address',usercontact='$update_contact' where id=$user_id";
    $update_sql=mysqli_query($conn,$update_query);
    if($update_sql){
        echo "<script>alert('Update done')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Account</title>
</head>
<body>
   <h3 class="text-success text-center my-5">Edit Account</h3>
   <form action="" method="post" enctype="multipart/form-data" class="text-center">
   <div class="form-outline w-50 m-auto">
        <input type="text" name="update_username"  class="form-control mb-4" value="<?php echo $edit_username?>" autocomplete="off">
    </div>
    <div class="form-outline mb-2 w-50 m-auto">
        <input type="email" name="update_email"  class="form-control mb-4" value="<?php echo $edit_usermail?>" autocomplete="off">
    </div>
    <div class="form-outline mb-2 w-50 m-auto d-flex">
        <input type="file" name="update_image"  class="form-control mb-4"  autocomplete="off">
        <img src="uploaded/<?php echo $update_image?>" alt="" class="update_img" >
    </div>
    <div class="form-outline mb-2 w-50 m-auto">
        <input type="text" name="update_address"  class="form-control mb-4" value="<?php echo $edit_useraddress?>" autocomplete="off">
    </div>
    <div class="form-outline mb-2 w-50 m-auto">
        <input type="text" name="update_contact"  class="form-control mb-4" value="<?php echo $edit_usercontact?>" autocomplete="off">
    </div>
    <input type="submit" value="Update profile" class='bg-info px-3 py-2 border-0 ' name="user_update">
   </form>
</body>
</html>