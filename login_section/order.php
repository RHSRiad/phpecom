<?php 
include('../include/dbconn.php');
include("../functions/common_function.php");



if(isset($_GET['user_id'])){
    $user_id=$_GET['user_id'];

}

// data query

// $user_ip=get_ip_address();
// $total_price=0;
// $cart_query="SELECT * FROM cart_details where ip_address='$user_ip'";
// $cart_sql=mysqli_query($conn,$cart_query);
// $cart_rows=mysqli_num_rows($cart_sql);
// $invoice_number=mt_rand();
// $status='pending';
// while($cart_fatch=mysqli_fetch_assoc($cart_sql)){
//     $product_id=$cart_fatch['id'];
//     $product_query="SELECT * FROM product where id=$product_id";
//     $product_sql=mysqli_query($conn,$product_query);
//     while($product_fatch=mysqli_fetch_assoc($product_sql)){
//         $product_price=array($product_fatch['product_price']);
//         $product_sum=array_sum($product_price);
//         $total_price+=$product_sum;
//     }
// }

// // purchase amount 
// $quantaty_query="SELECT * FROM cart_details";
// $quantaty_sql=mysqli_query($conn,$quantaty_query);
// $quantaty_fetch=mysqli_fetch_assoc($quantaty_sql);
// $quantaty_db=$quantaty_fetch['product_qty'];
// if($quantaty_db==0){
//     $product_qty=1;
//     $subtotal=$total_price;
// }else{
//     $quantaty_db=$quantaty_db;
//     $subtotal=$total_price*$quantaty_db;
// }


// // insert data in user_order

// $order_query="INSERT INTO user_order (user_id,amount_due,invoice_num,total_product,	order_date,order_status) 
// VALUES ($user_id,$subtotal,$invoice_number,$quantaty_db,NOW(),'$status')";
// $order_sql=mysqli_query($conn,$order_query);
// if($order_sql){
//     echo "<script>alert('Successfully data insert')</script>";
//     echo "<script>window.open('profile.php','_self')</script>";
// }



$user_ip=get_ip_address();
$totalprice=0;
$invoice_number=mt_rand();
$status='pending';
$cart_query="SELECT * FROM cart_details where ip_address='$user_ip'";
$cart_sql=mysqli_query($conn,$cart_query);
$cart_rows=mysqli_num_rows($cart_sql);
while($cart_fatch=mysqli_fetch_assoc($cart_sql)){
    $product_id=$cart_fatch['id'];
    $product_query="SELECT * FROM product where id=$product_id";
    $product_sql=mysqli_query($conn,$product_query);
    
    while($product_fatch=mysqli_fetch_assoc($product_sql)){
        $produc_peice=array($product_fatch['product_price']);
        $product_sum=array_sum($produc_peice);
        $totalprice+=$product_sum;
    }
}

//purcher amount

$purches_query="SELECT * FROM cart_details";
$purches_sql=mysqli_query($conn,$purches_query);
$purches_fatch=mysqli_fetch_assoc($purches_sql);
$quantaty=$purches_fatch['product_qty'];
if($quantaty==0){
    $quantaty=1;
    $subtotal=$totalprice;
}else{
    $quantaty=$quantaty;
    $subtotal=$totalprice*$quantaty;
}
//insert data 
$order_query="INSERT INTO user_order (user_id,amount_due,invoice_num,total_product,	order_date,order_status) 
VALUES ($user_id,$subtotal,$invoice_number,$cart_rows,NOW(),'$status')";
$order_sql=mysqli_query($conn,$order_query);
if($order_sql){
    echo "<script>alert('Successfully data insert')</script>";
    echo "<script>window.open('../profile.php','_self')</script>";
}

// order pending
$pending_query="INSERT INTO order_pending (user_id,invoice_num,product_id,quantity,order_status) 
VALUES ($user_id,$invoice_number,$product_id,$quantaty,'$status')";
$pending_sql=mysqli_query($conn,$pending_query);

// delete query
$delete_query="DELETE FROM cart_details where ip_address='$user_ip'";
$delete_sql=mysqli_query($conn,$delete_query);

?>