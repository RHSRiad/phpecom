
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="text-center text-success my-5">
                <h2>User payment</h2>
            </div>
        </div>
    </div>

    <table class="table table-bordered">
        <thead class="bg-info text-light">
            
        <?php 
        
            $payment_query="SELECT * FROM order_payment";
            $payment_sql=mysqli_query($conn,$payment_query);
            $payment_num_row=mysqli_num_rows($payment_sql);
           echo "<tr>
           <th>Serial num</th>
           <th>Invoice number</th>
           <th>amount</th>
           <th>Payment mood</th>
           <th>Date</th>
           <th>Delete</th>
       </tr>
       
   </thead>
   <tbody>";
        if($payment_num_row==0){
            echo "<h2 class='text-center text-danger'>No Payment now</h2>";
        }else{
            $slno=1;
            while($payment_fetch=mysqli_fetch_assoc($payment_sql)){
                
                $payment_id=$payment_fetch['payment_id'];
                $invoice_number=$payment_fetch['invoice_number'];
                $payment_amount=$payment_fetch['amount'];
                $payment_mode=$payment_fetch['payment_mode'];
                $payment_date=$payment_fetch['payment_date'];
                
            ?>

            <tr class='bg-secondary text-light'>
                <td><?php echo $slno?></td>
                <td><?php echo $invoice_number?></td>
                <td><?php echo $payment_amount?></td>
                <td><?php echo $payment_mode?></td>
                <td><?php echo $payment_date?></td>
               
                <td><a href='index.php?delete_payment=<?php echo $payment_id?>' class='text-light' data-toggle='modal' data-target='#exampleModalLong'><i class='fa-solid fa-trash-can'></i></a></td>
            </tr>
           <?php $slno++;
            }
        }
        
        ?>

            
            
        </tbody>
    </table>

    <!-- bootstrap model -->

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
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href="index.php?payment_order" class="text-light" data-toggle="modal" data-target="#exampleModalLong">No</a></button>

                <button type="button" class="btn btn-primary"><a href='index.php?delete_payment=<?php echo $payment_id?>' class="text-light">Yes</a></button>
            </div>
            </div>
        </div>
        </div>