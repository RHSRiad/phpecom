<?php 
if(isset($_GET['delete_order'])){
    $order_delete_id=$_GET['delete_order'];
    $delete_order_query="DELETE from user_order where order_id=$order_delete_id";
    $order_delete_sql=mysqli_query($conn,$delete_order_query);
    if($order_delete_sql){
        echo "<script>alert('Order delete successfully')</script>";
        echo "<script>window.open('index.php?order_list','_self')</script>";
    }
}

?>