
<?php 
if(isset($_GET['edit_table'])){
    $edited_product_id=$_GET['edit_table'];
    $select_product_query="SELECT * FROM product where id=$edited_product_id";
    $select_product_sql=mysqli_query($conn,$select_product_query);
    $row_product=mysqli_fetch_assoc($select_product_sql);
    $product_title=$row_product['product_title'];
    $product_description=$row_product['product_description'];
    $product_keywords=$row_product['product_keywords'];
    $seclect_category=$row_product['seclect_category'];
    $seclect_brands=$row_product['seclect_brands'];
    $product_image1=$row_product['product_image1'];
    $product_image2=$row_product['product_image2'];
    $product_image3=$row_product['product_image3'];
    $product_price=$row_product['product_price'];

// category select option

$admin_category_query="SELECT * FROM category where id='$seclect_category'";
$admin_category_sql=mysqli_query($conn,$admin_category_query);
$admin_cat_rows=mysqli_fetch_assoc($admin_category_sql);
$category_title_select=$admin_cat_rows['category_title'];
// brand select option

$admin_brand_query="SELECT * FROM brand where id='$seclect_brands'";
$admin_brand_sql=mysqli_query($conn,$admin_brand_query);
$admin_brand_rows=mysqli_fetch_assoc($admin_brand_sql);
$brand_title_select=$admin_brand_rows['brand_name'];


}
?>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center text-success my-4">Edit Products</h1>
            </div>
        </div>
        <form action="" method="post" enctype="multipart/form-data">
                <div class="form-outline my-4 m-auto w-50">
                    <label for="product_title" class="form-label">Edit Title</label>
                    <input type="text" name="edit_product_title" id="product_title" class="form-control mb-4" placeholder="Edit your product title" autocomplete="off" value="<?php echo $product_title;?>">
                </div>
                <!-- Product Description -->
            <div class="form-outline mb-4 m-auto w-50">
                <label for="product_description" class="form-label">Edit Description</label>
                <input type="text" name="edit_product_description" id="product_description" class="form-control mb-4" placeholder="Edit your product description" autocomplete="off" value="<?php echo $product_description;?>" >
            </div>
            <!-- Product Keywords -->
            <div class="form-outline mb-4 m-auto w-50">
                <label for="product_keywords" class="form-label">Edit Keywords</label>
                <input type="text" name="edit_product_keywords" id="product_keywords" class="form-control mb-4" placeholder="Edit your product keywords" autocomplete="off" value="<?php echo $product_keywords;?>">
            </div>
            <!-- Select category -->
            <div class="form-outline mb-4 m-auto w-50">
                <select class="form-control mb-4"  name="edit_seclect_category">
                
                <option value="<?php echo $category_title_select;?>"><?php echo $category_title_select;?></option>
                <?php 
                $admin_category_all="SELECT * FROM category";
                $admin_category_sql_all=mysqli_query($conn,$admin_category_all);
                while($admin_rows=mysqli_fetch_assoc($admin_category_sql_all)){
                        $category_title=$admin_rows['category_title'];
                        $category_id=$admin_rows['id'];
                
                ?>
                
                    <option value="<?php echo $category_id;?>"><?php echo $category_title;?></option>

                    <?php }?>
                </select>
            </div>
            <!-- Select brand -->
            <div class="form-outline mb-4 m-auto w-50">
                <select class="form-control mb-4"  name="edit_seclect_brands" value="<?php echo $seclect_brands;?>">
                    <option value="<?php echo $brand_title_select;?>"><?php echo $brand_title_select;?></option>
                    <?php 
                $admin_brand_all="SELECT * FROM brand";
                $admin_brand_sql_all=mysqli_query($conn,$admin_brand_all);
                while($admin_rows_brand=mysqli_fetch_assoc($admin_brand_sql_all)){
                        $brand_title=$admin_rows_brand['brand_name'];
                        $brand_id=$admin_rows_brand['id'];
                
                ?>
                    <option value="<?php echo $brand_id;?>"><?php echo $brand_title;?></option>
                    <?php }?>
                    
                </select>
            </div>
            <!-- Product Image 1 -->
            <div class="form-outline  m-auto w-50 d-flex">
                <input type="file" name="edit_product_image1" id="product_image1" class="form-control mb-4" >
                
                <img src="product_image/<?php echo $product_image1;?>" alt="" class="edit_product_image2">
            </div>
            <!-- Product Image 2 -->
            
            <div class="form-outline my-3 m-auto w-50 d-flex">
                <input type="file" name="edit_product_image2" id="product_image2" class="form-control mb-4"  >
                <img src="product_image/<?php echo $product_image2;?>" alt="" class="edit_product_image2">
            </div>
            <!-- Product Image 3 -->
            <div class="form-outline mb-4 m-auto w-50 d-flex">
                <input type="file" name="edit_product_image3" id="product_image3" class="form-control mb-4"  >
                
                <img src="product_image/<?php echo $product_image3;?>" alt="" class="edit_product_image2">
            </div>
            
            <!-- Product Price -->
            <div class="form-outline  m-auto w-50">
                <label for="product_price" class="form-label">Edit price</label>
                <input type="text" name="edit_product_price" id="product_price" class="form-control mb-4" autocomplete="off" value="<?php echo $product_price;?>">
            </div>

            <div class="form-outline my-4 m-auto w-50">
                <input type="submit" value="Edit Product" name="admin_product_edit" class="btn text-light bg-info border-0 p-2">
            </div>
        </form>
    </div>

<!-- update product data -->
    <?php 
    if(isset($_POST['admin_product_edit'])){
        $edit_product_title=$_POST['edit_product_title'];
        $edit_product_description=$_POST['edit_product_description'];
        $edit_product_keywords=$_POST['edit_product_keywords'];
        $edit_seclect_category=$_POST['edit_seclect_category'];
        $edit_seclect_brands=$_POST['edit_seclect_brands'];
        $edit_product_price=$_POST['edit_product_price'];
        // edit image name
        $edit_product_image1=$_FILES['edit_product_image1']['name'];
        $edit_product_image2=$_FILES['edit_product_image2']['name'];
        $edit_product_image3=$_FILES['edit_product_image3']['name'];
        // edit image tmp name
        $edit_product_image_tmp=$_FILES['edit_product_image1']['tmp_name'];
        $edit_product_image2_tmp=$_FILES['edit_product_image2']['tmp_name'];
        $edit_product_image3_tmp=$_FILES['edit_product_image3']['tmp_name'];



        if($edit_product_title=='' or $edit_product_description=='' or $edit_product_keywords=='' or $edit_seclect_category=='' or $edit_seclect_brands == '' or $edit_product_image1=='' or $edit_product_image2=='' or $edit_product_image3=='' or $edit_product_price==''){
            echo "<script>alert('Fill the all table')</script>";
        }else{
            move_uploaded_file($edit_product_image_tmp,"./product_image/$edit_product_image1");
            move_uploaded_file($edit_product_image2_tmp,"./product_image/$edit_product_image2");
            move_uploaded_file($edit_product_image3_tmp,"./product_image/$edit_product_image3");
        // Update product data
        $edit_product_query_admin="UPDATE product SET product_title='$edit_product_title', product_description='$edit_product_description',product_keywords='$edit_product_keywords',seclect_category='$edit_seclect_category',seclect_brands='$edit_seclect_brands',product_image1='$edit_product_image1',product_image2='$edit_product_image2',product_image3='$edit_product_image3',product_price=$edit_product_price, upload_date=NOW() where id=$edited_product_id";
        $edit_update_sql_admin=mysqli_query($conn,$edit_product_query_admin);
        if($edit_update_sql_admin){
            echo "<script>alert('Data Updated successfully')</script>";
            echo "<script>window.open('index.php?view_product','_self')</script>";
        }
        }

    }
    
    ?>