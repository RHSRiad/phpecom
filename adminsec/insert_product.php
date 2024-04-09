<?php 
require("../include/dbconn.php");

if(isset($_POST['admin_insert_categories'])){

    $product_title=$_POST['product_title'];
    $product_description=$_POST['product_description'];
    $product_keywords=$_POST['product_keywords'];
    $seclect_category=$_POST['seclect_category'];
    $seclect_brands=$_POST['seclect_brands'];
    $product_price=$_POST['product_price'];
    $pro_status='true';

    // image upload

    $product_image1=$_FILES['product_image1']['name'];
    $product_image2=$_FILES['product_image2']['name'];
    $product_image3=$_FILES['product_image3']['name'];

    // image temp name
    $temp_image1=$_FILES['product_image1']['tmp_name'];
    $temp_image2=$_FILES['product_image2']['tmp_name'];
    $temp_image3=$_FILES['product_image3']['tmp_name'];


    // input field empty condition

    if($product_title=='' or $product_description=='' or $product_keywords=='' or $seclect_category=='' or $seclect_brands=='' or $product_image1=='' or $product_image2=='' or $product_image3=='' or $product_price==''){
        echo "<script>alert('File is required')</script>";

    }else{

        // image uploaded path
        move_uploaded_file($temp_image1,"./product_image/$product_image1");
        move_uploaded_file($temp_image2,"./product_image/$product_image2");
        move_uploaded_file($temp_image3,"./product_image/$product_image3");

        // product query section
        $product_query="INSERT INTO product (product_title,product_description,product_keywords,seclect_category,seclect_brands,product_image1,product_image2,product_image3,product_price,upload_date,status) values('$product_title','$product_description','$product_keywords','$seclect_category','$seclect_brands','$product_image1','$product_image2','$product_image3',$product_price,NOW(),'$pro_status')";

        $product_sql=mysqli_query($conn,$product_query);
        if($product_sql){
            echo "<script>alert('Successfully Product Uploaded')</script>";
        }
    }

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Product</title>

        <!-- bootstrap css link -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <!-- css link -->
        <link rel="stylesheet" href="../style.css">
</head>
<body>
    
<div class="container mt-3 mb-4">
    <h2 class="text-center">INSERT PRODUCT</h2>

    <form action="" method="post" enctype="multipart/form-data">
        <!-- Product title -->
        <div class="form-outline mb-4 m-auto w-50">
            <label for="product_title" class="form-label">Product Title</label>
            <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter your product title" autocomplete="off" require="required">
        </div>
        <!-- Product Description -->
        <div class="form-outline mb-4 m-auto w-50">
            <label for="product_description" class="form-label">Product Description</label>
            <input type="text" name="product_description" id="product_description" class="form-control" placeholder="Enter your product description" autocomplete="off" require="required">
        </div>
        <!-- Product Keywords -->
        <div class="form-outline mb-4 m-auto w-50">
            <label for="product_keywords" class="form-label">Product Keywords</label>
            <input type="text" name="product_keywords" id="product_keywords" class="form-control" placeholder="Enter your product keywords" autocomplete="off" require="required">
        </div>
        <!-- Select categories -->
        <div class="form-outline mb-4 m-auto w-50">
            <select class="form-control mt-3"  name="seclect_category" >
                <option value="">Select your categories</option>

                <?php 
                
                $query="SELECT * FROM category";
                $sql=mysqli_query($conn,$query);
                

                while($rows=mysqli_fetch_assoc($sql)){
                ?>

                <option value="<?php echo $rows['id']?>"><?php echo $rows['category_title']?></option>
                <?php }?>
            </select>
        </div>
        <!-- Select brand -->
        <div class="form-outline mb-4 m-auto w-50">
            <select class="form-control mt-3"  name="seclect_brands" >
                <option value="">Select your brand</option>
                <?php 
                
                $brand_query="SELECT * FROM brand";
                $brand_sql=mysqli_query($conn,$brand_query);
                while($rows=mysqli_fetch_assoc($brand_sql)){

                ?>
                <option value="<?php echo $rows['id']?>"><?php echo $rows['brand_name']?></option>
                <?php }?>
            </select>
        </div>
        <!-- Product Image 1 -->
        <div class="form-outline mb-4 m-auto w-50">
            <label for="product_image1" class="form-label">First Product Image </label>
            <input type="file" name="product_image1" id="product_image1" class="form-control"  require="required">
        </div>
        <!-- Product Image 2 -->
        <div class="form-outline mb-4 m-auto w-50">
            <label for="product_image2" class="form-label">Second Product Keywords</label>
            <input type="file" name="product_image2" id="product_image2" class="form-control"  require="required">
        </div>
        <!-- Product Image 3 -->
        <div class="form-outline mb-4 m-auto w-50">
            <label for="product_image3" class="form-label">Third Product Keywords</label>
            <input type="file" name="product_image3" id="product_image3" class="form-control"  require="required">
        </div>
        
        <!-- Product Price -->
        <div class="form-outline  m-auto w-50">
            <label for="product_price" class="form-label">Product price</label>
            <input type="text" name="product_price" id="product_price" class="form-control mb-4" autocomplete="off" require="required">
        </div>

        <div class="form-outline mb-4 m-auto w-50">
            <input type="submit" value="Insert Categories" name="admin_insert_categories" class="btn text-light bg-info border-0 p-2">
        </div>

    </form>
</div>


<!-- bootstrap js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>