
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="text-center text-success my-5">
                <h2>User list</h2>
            </div>
        </div>
    </div>

    <table class="table table-bordered">
        <thead class="bg-info text-light">
            
        <?php 
        
            $user_query="SELECT * FROM user";
            $user_sql=mysqli_query($conn,$user_query);
            $user_num_row=mysqli_num_rows($user_sql);
           echo "<tr>
           <th>Serial num</th>
           <th>username</th>
           <th>useremail</th>
           <th>userimage</th>
           <th>user address</th>
           <th>user mobile</th>
           <th>Delete</th>

       </tr>
       
   </thead>
   <tbody>";
        if($user_num_row==0){
            echo "<h2 class='text-center text-danger'>No Payment now</h2>";
        }else{
            $slno=1;
            while($user_fetch=mysqli_fetch_assoc($user_sql)){
                $userid=$user_fetch['id'];
                $username=$user_fetch['username'];
                $usermail=$user_fetch['usermail'];
                $userimage=$user_fetch['userimage'];
                $useraddress=$user_fetch['useraddress'];
                $usercontact=$user_fetch['usercontact'];
                $slno++;
            ?>

            <tr class='bg-secondary text-light'>
                <td><?php echo $slno?></td>
                <td><?php echo $username?></td>
                <td><?php echo $usermail?></td>
                <td><img src="../uploaded/<?php echo $userimage?>" class='admin_user_image' alt=""></td>
                <td><?php echo $useraddress?></td>
                <td><?php echo $usercontact?></td>
                <td><a href='index.php?user_delete=<?php echo $userid?>' class='text-light' data-toggle='modal' data-target='#exampleModalLong'><i class='fa-solid fa-trash-can'></i></a></td>
            </tr>
           <?php
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

                <button type="button" class="btn btn-primary"><a href='index.php?user_delete=<?php echo $userid?>' class="text-light">Yes</a></button>
            </div>
            </div>
        </div>
        </div>