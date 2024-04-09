

    <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="text-center text-success my-5">
                <h2>View Products</h2>
            </div>
        </div>
    </div>
    <table class="table table-bordered">
        <thead class="bg-info text-light">
            
            <tr>
                <th scope="col">Serial num</th>
                <th scope="col">Product Title</th>
                <th scope="col">Product Image</th>
                <th scope="col">Product Price</th>
                <th scope="col">Total Sold</th>
                <th scope="col">Status</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
            
        </thead>
        <tbody>
        <?php 
                    $view_product_query="SELECT * FROM product";
                    $view_product_sql=mysqli_query($conn,$view_product_query);
                    $serial=1;
                    while($rows_view_product=mysqli_fetch_assoc($view_product_sql)){
                        $view_product_id=$rows_view_product['id'];
                        $view_product_title=$rows_view_product['product_title'];
                        $view_product_img=$rows_view_product['product_image1'];
                        $view_product_price=$rows_view_product['product_price'];
                        $view_product_status=$rows_view_product['status'];

                    
                ?>
            <tr class="bg-secondary text-light">
                <td><?php echo $serial;?></td>
                <td><?php echo $view_product_title;?></td>
                <td><img class="admin_product_image" src="product_image/<?php echo $view_product_img;?>" alt=""></td>
                <td><?php echo $view_product_price;?></td>
                <td><?php 
                    $order_pending_qty="SELECT * FROM order_pending where product_id=$view_product_id";
                    $order_pending_sql=mysqli_query($conn,$order_pending_qty);
                    $order_rows=mysqli_num_rows($order_pending_sql);
                    echo $order_rows;
                ?></td>
                <td><?php echo $view_product_status;?></td>
                <td><a href="index.php?edit_table=<?php echo $view_product_id;?>" class="text-light"><i class="fa-solid fa-pen-to-square"></i></a></td>
                <td><a href="index.php?delete_table=<?php echo $view_product_id;?>" class="text-light"><i class="fa-solid fa-trash-can"></i></a></td>
            </tr>
            <?php
        $serial++;
         }?>
        </tbody>
    </table>

</div>
    