<?php 
require("../include/dbconn.php");

if(isset($_POST['input_submit'])){
  $cat_title=$_POST['cat_input'];

  $cat_already_added="SELECT * FROM category where category_title='$cat_title'";
  $cat_query=mysqli_query($conn,$cat_already_added);
  $rows=mysqli_num_rows($cat_query);

  if($rows>0){
    echo "<script>alert('Category already added')</script>";
  }else{
    $cat_title_name="insert into category (category_title) value ('$cat_title')";
    $query=mysqli_query($conn,$cat_title_name);
    
    if($query){
      echo "<script>alert('Category successfully added')</script>";
    }else{
      echo "<script>alert('somethig error')</script>";
    }
  }


}



?>

<form action="" method="post" class="container py-3">

<div class="input-group flex-nowrap">
  <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-receipt"></i></span>
  <input type="text" name="cat_input" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping">
</div>
<input type="submit" name="input_submit" class="bg-info text-light border-0 my-2 px-3" value="Insert category">

</form>