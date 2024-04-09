<?php 

    if(isset($_GET['user_delete'])){
        $admin_userid=$_GET['user_delete'];
        $delete_user_query="DELETE FROM user where id=$admin_userid";
        $delete_user_sql=mysqli_query($conn,$delete_user_query);
        if($delete_user_sql){
            echo "<script>alert('Delete user')</script>";
            echo "<script>window.open('index.php?user_list','_self')</script>"; 
        }
    }

?>