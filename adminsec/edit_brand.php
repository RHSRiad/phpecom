<?php 
if(isset($_GET['edit_brand'])){
    $brand_edit_id=$_GET['edit_brand'];
    $brand_edit_val_query="SELECT * FROM brand where id=$brand_edit_id";
    $brand_edit_sql=mysqli_query($conn,$brand_edit_val_query);
    $brand_fetch_rows=mysqli_fetch_assoc($brand_edit_sql);
    $brand_title=$brand_fetch_rows['brand_name'];
    
}
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center text-success my-4">Brand edit</h1>
        </div>
    </div>
</div>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-outline my-4 m-auto w-50">
        <label for="brand_title" class="form-label">Edit Title</label>
        <input type="text" name="edit_brand_title" id="cat_title" class="form-control mb-4" placeholder="Edit your brand name" autocomplete="off" value="<?php echo $brand_title;?>">
    </div>
    <div class="form-outline my-4 m-auto w-50">
        <input type="submit" value="Edit Product" name="admin_brand_edit" class="btn text-light bg-info border-0 p-2">
    </div>
</form>

<?php 
if(isset($_POST['admin_brand_edit'])){
    $brand_title_input=$_POST['edit_brand_title'];
    if($brand_title_input==''){
        echo "<script>alert('Fill the table')</script>";
    }else{
        $brand_update_query="UPDATE brand SET brand_name='$brand_title_input' where id=$brand_edit_id";
        $brand_update_sql=mysqli_query($conn,$brand_update_query);
        echo "<script>alert('Category name changes')</script>";
        echo "<script>window.open('index.php?view_brand','_self')</script>";
    }
    
}
?>