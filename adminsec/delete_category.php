<?php 
if(isset($_GET['delete_category'])){
    $delete_cat_id=$_GET['delete_category'];

    $delete_cat_query="DELETE FROM category where id=$delete_cat_id";
    $delete_cat_sql=mysqli_query($conn,$delete_cat_query);
    if($delete_cat_sql){
        echo "<script>alert('Delete category')</script>";
        echo "<script>window.open('index.php?view_category','_self')</script>"; 
    }
}

?>