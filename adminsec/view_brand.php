
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="text-center text-success my-5">
                <h2>View Brand</h2>
            </div>
        </div>
    </div>

    <table class="table table-bordered">
        <thead class="bg-info text-light">
            
            <tr>
                <th scope="col">Serial num</th>
                <th scope="col">Brand Title</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
            
        </thead>
        <tbody>
        <?php 
                    $view_brand_query="SELECT * FROM brand";
                    $view_brand_sql=mysqli_query($conn,$view_brand_query);
                    $serial=1;
                    while($rows_view_brand=mysqli_fetch_assoc($view_brand_sql)){
                        $view_brand_id=$rows_view_brand['id'];
                        $view_brand_title=$rows_view_brand['brand_name'];


                    
        ?>
            <tr class="bg-secondary text-light">
                <td><?php echo $serial;?></td>
                <td><?php echo $view_brand_title;?></td>
                <td><a href="index.php?edit_brand=<?php echo $view_brand_id;?>" class="text-light"><i class="fa-solid fa-pen-to-square"></i></a></td>
                <td><a href="index.php?delete_brand=<?php echo $view_brand_id;?>" class="text-light" data-toggle="modal" data-target="#exampleModalLong"><i class="fa-solid fa-trash-can"></i></a></td>
            </tr>
            <?php
                $serial++;
            }?>
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
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href="index.php?view_brand" class="text-light" data-toggle="modal" data-target="#exampleModalLong">No</a></button>

                <button type="button" class="btn btn-primary"><a href="index.php?delete_brand=<?php echo $view_brand_id;?>" class="text-light">Yes</a></button>
            </div>
            </div>
        </div>
        </div>