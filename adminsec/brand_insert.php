<?php 
require("../include/dbconn.php");

if(isset($_POST['input_submit'])){
    $brand_name=$_POST['brand_input'];

    $brand_query="SELECT * FROM brand where brand_name='$brand_name'";
    $brand_sql=mysqli_query($conn,$brand_query);
    $rows=mysqli_num_rows($brand_sql);
    if($rows>0){
        echo "<script>alert('Already added brand')</script>";
    }else{
        $query="INSERT INTO brand (brand_name) value ('$brand_name')";
        $sql=mysqli_query($conn,$query);
        if($sql){
            echo "<script>alert('Successfully added brand')</script>";
        }else{
            echo "<script>alert('Successfully added brand')</script>";
        }
    }


}


?>


<form action="" method="post" class="container py-3">

<div class="input-group flex-nowrap">
  <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-receipt"></i></span>
  <input type="text" name="brand_input" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping">
</div>
<input type="submit" name="input_submit" class="bg-info text-light border-0 my-2 px-3" value="Insert brands">
</form>