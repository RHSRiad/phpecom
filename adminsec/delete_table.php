
<?php 
if(isset($_GET['delete_table'])){
    $delete_product_id=$_GET['delete_table'];
    $delete_product_query_db="DELETE FROM product where id=$delete_product_id";
    $delete_product_sql_db=mysqli_query($conn,$delete_product_query_db);
    if($delete_product_sql_db){
        echo "<script>alert('Product delete successfully')</script>";
        echo "<script>window.open('index.php?view_product','_self')</script>";

    }
}

?>