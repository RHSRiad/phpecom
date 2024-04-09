
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="text-center text-success my-5">
                <h2>Order list</h2>
            </div>
        </div>
    </div>

    <table class="table table-bordered">
        <thead class="bg-info text-light"> 
            <?php 
            $order_list_query="SELECT * FROM user_order";
            $order_list_sql=mysqli_query($conn,$order_list_query);
            $order_num_rows=mysqli_num_rows($order_list_sql);
            echo " <tr>
            <th>Serial num</th>
            <th>Due amount</th>
            <th>Invoice number</th>
            <th>Total product</th>
            <th>Order date</th>
            <th>Status</th>
            <th>Delete</th>
        </tr>            
    </thead>
    <tbody>";

    if($order_num_rows==0){
        echo "<h2 class='text-center text-danger'>No order now</h2>";
    }else{
        $serialno=1;
        while($order_fetch=mysqli_fetch_assoc($order_list_sql)){
            $order_id=$order_fetch['order_id'];
            $order_amount=$order_fetch['amount_due'];
            $invoice_num=$order_fetch['invoice_num'];
            $total_product=$order_fetch['total_product'];
            $order_date=$order_fetch['order_date'];
            $order_status=$order_fetch['order_status'];

            echo "<tr class='bg-secondary text-light'>
            <td>$serialno</td>
            <td>$order_amount</td>
            <td>$invoice_num</td>
            <td>$total_product</td>
            <td>$order_date</td>
            <td>$order_status</td>
            <td><a href='index.php?delete_order=<?php echo $order_id?>' class='text-light' data-toggle='modal' data-target='#exampleModalLong'><i class='fa-solid fa-trash-can'></i></a></td>
        </tr>";
        $serialno++;
        }
    }
            ?>
           
        </tbody>
    </table>

    <!-- Button trigger modal -->
        <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
        Launch demo modal
        </button> -->

        <!-- Modal -->
        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h4>Delete</h4>
            </div>
            <div class="modal-body">
                <h5>Are you sure you want to delete this?</h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href="index.php?order_list" class="text-light" data-toggle="modal" data-target="#exampleModalLong">No</a></button>

                <button type="button" class="btn btn-primary"><a href="index.php?delete_order=<?php echo $order_id;?>" class="text-light">Yes</a></button>
            </div>
            </div>
        </div>
        </div>
  