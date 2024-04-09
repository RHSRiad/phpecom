
    <?php 
    $session_user_name_account=$_SESSION['username'];
    if(isset($_POST['delete_account'])){
        
        $account_delete_query="DELETE FROM user where username='$session_user_name_account'";
        $account_delete_sql=mysqli_query($conn,$account_delete_query);
        if($account_delete_sql){
            session_destroy();
            echo "<script>alert('account delete successfull')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }
    }
    if(isset($_POST['dnt_delete_account'])){
        echo "<script>window.open('profile.php','_self')</script>";
        
    }
    ?>

    
    <h2 class="text-center text-danger mb-5">Delete Account</h2>
    <form action="" method="post" class="m-auto">
        <div class="form-outline mb-3">
            <input type="submit" value="Delete Account" name="delete_account" class="form-control w-50 m-auto">
        </div>
        <div class="form-outline">
            <input type="submit" value="Don't Delete Account" name="dnt_delete_account" class="form-control w-50 m-auto">
        </div>
    </form>

