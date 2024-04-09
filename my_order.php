<?php 

$session_user_name=$_SESSION['username'];
$dashboard_user_query="SELECT * FROM user where username='$session_user_name'";
$dashboard_sql=mysqli_query($conn,$dashboard_user_query);
$dashboard_fetch=mysqli_fetch_assoc($dashboard_sql);
$dashboard_user_id=$dashboard_fetch['id'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="row">
        <div class="col-md-12 text-center">
            <h2 class="text-success">My Order</h2>
        </div>
        <table class="table table-striped table-bordered">
            <thead class="bg-info text-light">
                <tr>
                    <th scope="col">Sl Number</th>
                    <th scope="col">Amount due</th>
                    <th scope="col">Invoice num</th>
                    <th scope="col">Total Product</th>
                    <th scope="col">Order Date</th>
                    <th scope="col">Complete/incomplete</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                
                $dashboard_odrer_query="SELECT * FROM user_order where user_id=$dashboard_user_id";
                $dashboard_order_sql=mysqli_query($conn,$dashboard_odrer_query);
                $sl_num=0;
                while($dashboard_order_fetch=mysqli_fetch_assoc($dashboard_order_sql)){
                    $order_amount=$dashboard_order_fetch['amount_due'];
                    $order_id=$dashboard_order_fetch['order_id'];
                    $order_invoice=$dashboard_order_fetch['invoice_num'];
                    $order_total_product=$dashboard_order_fetch['total_product'];
                    $order_date=$dashboard_order_fetch['order_date'];



                    $order_status=$dashboard_order_fetch['order_status'];
                    if($order_status=='pending'){
                        $order_status='incomplete';
                    }else{
                        $order_status='complete';
                    }
                $sl_num++;
                

                ?>
                <tr class='text-center'>
                    <th scope="row"><?php echo $sl_num?></th>
                    <td><?php echo $order_amount?></td>
                    <td><?php echo $order_invoice?></td>
                    <td><?php echo $order_total_product?></td>
                    <td><?php echo $order_date?></td>
                    <td><?php echo $order_status?></td>

                    <?php 
                    if($order_status=='complete'){
                        echo "<td>Paid</td>";
                    }else{
                        ?>
                        <td><a href="confirm_payment.php?order_id=<?php echo $order_id?>">Confirm</a></td>
                </tr>
                        <?php 
                    }
                    ?>
                    

                    
                <?php }?>
            </tbody>
        </table>


    </div>
</body>
</html>