<?php 
include('include/dbconn.php');
include("functions/common_function.php");
session_start();

$user_session_name=$_SESSION['username'];
if(isset($_GET['order_id'])){
    $user_order_id=$_GET['order_id'];
    
    $user_payment_query="SELECT * FROM user_order where order_id=$user_order_id";
    $user_payment_sql=mysqli_query($conn,$user_payment_query);
    $user_fetch_accos=mysqli_fetch_assoc($user_payment_sql);
    $user_invoice=$user_fetch_accos['invoice_num'];
    $user_product_ammount=$user_fetch_accos['amount_due'];

    // confirm payment section

    if(isset($_POST['payment_submit'])){
        $confirm_invoice_num=$_POST['invoice_num'];
        $confirm_pay_amount=$_POST['amount_product'];
        $confirm_payment_option=$_POST['select_payment_option'];
        $payment_insert_query="INSERT INTO order_payment (order_id,	invoice_number,amount,payment_mode) VALUES($user_order_id,$user_invoice,$user_product_ammount,'$confirm_payment_option')";
        $payment_result_sql=mysqli_query($conn,$payment_insert_query);
        if($payment_result_sql){
            echo "<script>alert('Payment successfully done')</script>";
            echo "<script>window.open('profile.php?my_order','_self')</script>";
        }

        // status update

        $payment_status_update="UPDATE user_order SET order_status='complete' where order_id=$user_order_id";
        $payment_result_update_sql=mysqli_query($conn,$payment_status_update);
    }
    

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>confirm payment</title>
        <!-- bootstrap css link -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- fontawesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- css link -->
    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-dark">

    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2 class="text-center text-light">payment</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form action="" method="post" class=" text-center">
                    <div class="form-group w-50 m-auto text-center">
                        <input type="text" name="invoice_num" class="form-control w-50 m-auto" id="exampleFormControlInput1" value="<?php echo $user_invoice?>">
                    </div>
                    <div class="form-group w-50 m-auto">
                        <label for="amount" class="text-center text-light w-50">amount</label>
                        <input type="text" name="amount_product" class="form-control w-50 m-auto" id="exampleFormControlInput1" value="<?php echo $user_product_ammount?>">
                    </div>
                    <div class="form-group w-50 m-auto">
                        <label for="exampleFormControlSelect1" class="text-center text-light">select payment</label>
                        <select class="form-control w-50 m-auto" id="exampleFormControlSelect1" name="select_payment_option">
                            <option>Select Your payment Option</option>
                            <option>Bkash</option>
                            <option>Nogod</option>
                            <option>Rocket</option>
                            <option>Cash on Delivery</option>
                        </select>
                    </div>
                    <div class="my-3">
                    <input type="submit" value="payment" class="bg-info text-light py-2 px-3 border-0 text-center" name="payment_submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>