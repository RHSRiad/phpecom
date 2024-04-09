<?php 


if(isset($_GET['delete_payment'])){
    $payment_delete_id=$_GET['delete_payment'];
    echo $payment_delete_id;
    exit();
    $payment_delete_query="DELETE FROM order_payment where payment_id=$payment_delete_id";
    $payment_sql=mysqli_query($conn,$payment_delete_query);
    if($payment_sql){
        echo "<script>alert('Order delete successfully')</script>";
        echo "<script>window.open('index.php?payment_order','_self')</script>";
    }
}

?>