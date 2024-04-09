<?php 
if(isset($_GET['delete_brand'])){
    $delete_brand_id=$_GET['delete_brand'];

    $delete_brand_query="DELETE FROM brand where id=$delete_brand_id";
    $delete_brand_sql=mysqli_query($conn,$delete_brand_query);
    if($delete_brand_sql){
        echo "<script>alert('Delete Brand name')</script>";
        echo "<script>window.open('index.php?view_brand','_self')</script>"; 
    }
}

?>