
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="text-center text-success my-5">
                <h2>View Category</h2>
            </div>
        </div>
    </div>

    <table class="table table-bordered">
        <thead class="bg-info text-light">
            
            <tr>
                <th scope="col">Serial num</th>
                <th scope="col">category Title</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
            
        </thead>
        <tbody>
        <?php 
                    $view_product_query="SELECT * FROM category";
                    $view_product_sql=mysqli_query($conn,$view_product_query);
                    $serial=1;
                    while($rows_view_category=mysqli_fetch_assoc($view_product_sql)){
                        $view_category_id=$rows_view_category['id'];
                        $view_category_title=$rows_view_category['category_title'];


                    
        ?>
            <tr class="bg-secondary text-light">
                <td><?php echo $serial;?></td>
                <td><?php echo $view_category_title;?></td>
                <td><a href="index.php?category_table=<?php echo $view_category_id;?>" class="text-light"><i class="fa-solid fa-pen-to-square"></i></a></td>
                <td><a href="index.php?delete_category=<?php echo $view_category_id;?>" class="text-light"><i class="fa-solid fa-trash-can"></i></a></td>
            </tr>
            <?php
                $serial++;
            }?>
        </tbody>
    </table>