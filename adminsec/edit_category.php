<?php 
if(isset($_GET['category_table'])){
    $category_edit_id=$_GET['category_table'];
    $category_edit_val_query="SELECT * FROM category where id=$category_edit_id";
    $category_edit_sql=mysqli_query($conn,$category_edit_val_query);
    $category_fetch_rows=mysqli_fetch_assoc($category_edit_sql);
    $cat_title=$category_fetch_rows['category_title'];
    
}
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center text-success my-4">Edit category</h1>
        </div>
    </div>
</div>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-outline my-4 m-auto w-50">
        <label for="category_title" class="form-label">Edit Title</label>
        <input type="text" name="edit_category_title" id="cat_title" class="form-control mb-4" placeholder="Edit your category title" autocomplete="off" value="<?php echo $cat_title;?>">
    </div>
    <div class="form-outline my-4 m-auto w-50">
        <input type="submit" value="Edit Product" name="admin_category_edit" class="btn text-light bg-info border-0 p-2">
    </div>
</form>

<?php 
if(isset($_POST['admin_category_edit'])){
    $cat_title_input=$_POST['edit_category_title'];
    if($cat_title_input==''){
        echo "<script>alert('Fill the table')</script>";
    }else{
        $cat_update_query="UPDATE category SET category_title='$cat_title_input' where id=$category_edit_id";
        $cat_update_sql=mysqli_query($conn,$cat_update_query);
        echo "<script>alert('Category name changes')</script>";
        echo "<script>window.open('index.php?view_category','_self')</script>";
    }
    
}
?>