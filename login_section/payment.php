<?php 
include('../include/dbconn.php');
include("../functions/common_function.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>payment</title>
    <!-- bootstrap css link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        .payimg{
            width: 100%;
        }
    </style>
</head>
<body>

    <!-- user traking -->
    <?php 
    global $conn;
    $user_ip=get_ip_address();
    $order_query="SELECT * FROM user where ip_address='$user_ip'";
    $order_sql=mysqli_query($conn,$order_query);
    $oder_fetch=mysqli_fetch_array($order_sql);

    

    ?>

    <div class="container">
        <h2 class='text-center text-info'>Payment</h2>
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-md-6">
               <a href="#"><img class="payimg" src="../assets/img/nagad.jpg" alt=""></a>
            </div>
            <div class="col-md-6">
                <a href="order.php?user_id=<?php echo $oder_fetch['id'] ?>"> <p class="text-center">Offline Payment</p> </a>
            </div>
        </div>
    </div>

</body>
</html>