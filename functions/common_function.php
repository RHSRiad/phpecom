<?php 

// including db connection

// include("./include/dbconn.php");

//common function product 

function getProduct(){
    global $conn;

    if(!isset($_GET['category'])){
        if(!isset($_GET['brand'])){
    $product_query="SELECT * FROM product order by rand() LIMIT 0,9";
    $product_sql=mysqli_query($conn,$product_query);

    while($rows=mysqli_fetch_assoc($product_sql)){ ?>

        <div class="col-md-4">
          <div class="card mb-3 ">
                <img class="card-img-top pimage" src="./adminsec/product_image/<?php echo $rows['product_image1']?>" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title"><?php echo $rows['product_title']?></h5>
                  <p class="card-text"><?php echo $rows['product_description']?></p>
                  <p>price: <span><?php echo $rows['product_price']?>tk</span></p>
                  <a href="index.php?add_to_cart=<?php echo $rows['id']?>" class="btn btn-primary">Add to Cart</a>
                  <a href="product_details.php?product_id=<?php echo $rows['id']?>" class="btn btn-secondary">View More</a>
                </div>
          </div>
        </div>

<?php }
}
}
}

//common function product unique

function getuniqeProduct(){
    global $conn;

    if(isset($_GET['category'])){
        $category_id=$_GET['category'];
        
    $product_query="SELECT * FROM product where seclect_category=$category_id";
    $product_sql=mysqli_query($conn,$product_query);
    $num_of_rows=mysqli_num_rows($product_sql);
    
    if($num_of_rows==0){
        echo "<h2 class='text-center text-danger'>No Product avaliable</h2>";
    }

    while($rows=mysqli_fetch_assoc($product_sql)){ 
      
      ?>

        <div class="col-md-4">
          <div class="card mb-3 ">
                <img class="card-img-top pimage" src="./adminsec/product_image/<?php echo $rows['product_image1']?>" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title"><?php echo $rows['product_title']?></h5>
                  <p class="card-text"><?php echo $rows['product_description'];?></p>
                  <p>price: <span><?php echo $rows['product_price']?>tk</span></p>
                  <a href="index.php?add_to_cart=<?php echo $rows['id']?>" class="btn btn-primary">Add to Cart</a>
                  <a href="product_details.php?product_id=<?php echo $rows['id']?>" class="btn btn-secondary">View More</a>
                </div>
          </div>
        </div>

<?php }
}
}

//common function brand unique

function getuniqebrand(){
    global $conn;

    if(isset($_GET['brand'])){
        $brand_id=$_GET['brand'];
        
    $product_query="SELECT * FROM product where seclect_brands=$brand_id";
    $product_sql=mysqli_query($conn,$product_query);
    $num_of_rows=mysqli_num_rows($product_sql);
    if($num_of_rows==0){
        echo "<h2 class='text-center text-danger'>This brand is not avaliable</h2>";
    }

    while($rows=mysqli_fetch_assoc($product_sql)){ ?>

        <div class="col-md-4">
          <div class="card mb-3 ">
                <img class="card-img-top pimage" src="./adminsec/product_image/<?php echo $rows['product_image1']?>" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title"><?php echo $rows['product_title']?></h5>
                  <p class="card-text"><?php echo $rows['product_description']?></p>
                  <p>price: <span><?php echo $rows['product_price']?>tk</span></p>
                  <a href="index.php?add_to_cart=<?php echo $rows['id']?>" class="btn btn-primary">Add to Cart</a>
                  <a href="product_details.php?product_id=<?php echo $rows['id']?>" class="btn btn-secondary">View More</a>
                </div>
          </div>
        </div>

<?php }
}
}


//common function Brands


function getBrand(){
    global $conn;

    $query="SELECT * FROM brand";
    $sql=mysqli_query($conn,$query);

    while($rows=mysqli_fetch_assoc($sql)){ 
?>
 <li class="nav-item">
        <a class="nav-link text-light" href="index.php?brand=<?php echo $rows['id']?>"><?php echo $rows['brand_name'];?></a>
      </li>
      <?php }

}


//common function categories


function getCategories(){

      global $conn;
    $query="SELECT * FROM category";
    $sql=mysqli_query($conn,$query);
    
    while($rows=mysqli_fetch_assoc($sql)){ ?>

<li class="nav-item">
        <a class="nav-link text-light" href="index.php?category=<?php echo $rows['id']?>"><?php echo $rows['category_title'];?></a>
      </li>
<?php }
}


//search data by user

function searchUserData(){
  global $conn;

  if(isset($_GET['search_action'])){
    $user_search=$_GET['search_input'];

  $search_query="SELECT * FROM product where product_keywords like '%$user_search%'";
  $product_sql=mysqli_query($conn,$search_query);
  $num_of_rows=mysqli_num_rows($product_sql);
  if($num_of_rows==0){
    echo "<h2 class='text-center text-danger'>This Product is not avaliable</h2>";
  }

  while($rows=mysqli_fetch_assoc($product_sql)){ ?>

      <div class="col-md-4">
        <div class="card mb-3 ">
              <img class="card-img-top pimage" src="./adminsec/product_image/<?php echo $rows['product_image1']?>" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title"><?php echo $rows['product_title']?></h5>
                <p class="card-text"><?php echo $rows['product_description']?></p>
                <p>price: <span><?php echo $rows['product_price']?>tk</span></p>
                <a href="index.php?add_to_cart=<?php echo $rows['id']?>" class="btn btn-primary">Add to Cart</a>
                <a href="product_details.php?product_id=<?php echo $rows['id']?>" class="btn btn-secondary">View More</a>
              </div>
        </div>
      </div>

<?php }
}
}

//product all show page


function allProductsshow(){

  global $conn;

  $allproduct_query="SELECT * FROM  product ORDER BY rand()";
  $all_product_query=mysqli_query($conn,$allproduct_query);
  while($rows=mysqli_fetch_assoc($all_product_query)){

  ?>
        <div class="col-md-4">
          <div class="card mb-3 ">
                <img class="card-img-top pimage" src="./adminsec/product_image/<?php echo $rows['product_image1']?>" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title"><?php echo $rows['product_title']?></h5>
                  <p class="card-text"><?php echo $rows['product_description']?></p>
                  <p>price: <span><?php echo $rows['product_price']?>tk</span></p>
                  <a href="index.php?add_to_cart=<?php echo $rows['id']?>" class="btn btn-primary">Add to Cart</a>
                  <a href="product_details.php?product_id=<?php echo $rows['id']?>" class="btn btn-secondary">View More</a>
                </div>
          </div>
        </div>

  <?php }
}

//product details section

function product_details(){
  global $conn;

  if(isset($_GET['product_id'])){
    $product_id=$_GET['product_id'];
    $single_query="SELECT * FROM product where id=$product_id";
    $single_sql=mysqli_query($conn,$single_query);
    //$single_rows=mysqli_fetch_assoc($single_sql);
    while($rows=mysqli_fetch_assoc($single_sql)){
      ?>

    <div class="col-md-4">
            <div class="card mb-3 ">
                    <img class="card-img-top pimage" src="./adminsec/product_image/<?php echo $rows['product_image1']?>" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $rows['product_title']?></h5>
                    <p class="card-text"><?php echo $rows['product_description']?></p>
                    <p>price: <span><?php echo $rows['product_price']?>tk</span></p>
                    <a href="index.php?add_to_cart=<?php echo $rows['id']?>" class="btn btn-primary">Add to Cart</a>
                    <a href="product_details.php?product_id=<?php echo $rows['id']?>" class="btn btn-secondary">View More</a>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="text-info text-center mb-3">Related Post</h3>
                </div>
                <div class="col-md-6">
                <img class="card-img-top pimage" src="./adminsec/product_image/<?php echo $rows['product_image2']?>" alt="Card image cap">
                </div>
                <div class="col-md-6">
                <img class="card-img-top pimage" src="./adminsec/product_image/<?php echo $rows['product_image3']?>" alt="Card image cap">
                </div>
            </div>
        </div>
<?php
    }
  }
}


//get ip address

// Get the Client IP Address PHP Function
function get_ip_address() {
  $ip_address = '';
  if (!empty($_SERVER['HTTP_CLIENT_IP'])){
      $ip_address = $_SERVER['HTTP_CLIENT_IP']; // Get the shared IP Address
  }else if(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
      //Check if the proxy is used for IP/IPs
      // Split if multiple IP addresses exist and get the last IP address
      if (strpos($_SERVER['HTTP_X_FORWARDED_FOR'], ',') !== false) {
          $multiple_ips = explode(",", $_SERVER['HTTP_X_FORWARDED_FOR']);
          $ip_address = trim(current($multiple_ips));
      }else{
          $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
      }
  }else if(!empty($_SERVER['HTTP_X_FORWARDED'])){
      $ip_address = $_SERVER['HTTP_X_FORWARDED'];
  }else if(!empty($_SERVER['HTTP_FORWARDED_FOR'])){
      $ip_address = $_SERVER['HTTP_FORWARDED_FOR'];
  }else if(!empty($_SERVER['HTTP_FORWARDED'])){
      $ip_address = $_SERVER['HTTP_FORWARDED'];
  }else{
      $ip_address = $_SERVER['REMOTE_ADDR'];
  }
  return $ip_address;
}

// Print client IP address
// $ip_address = get_ip_address();
// echo "Your IP Address is: ". $ip_address;

// add to cart details 

function cart(){

  if(isset($_GET['add_to_cart'])){
    global $conn;
    $ip_address = get_ip_address();
    $product_id=$_GET['add_to_cart'];
    $cart_query="SELECT * FROM cart_details where ip_address='$ip_address' and id='$product_id'";
    $cart_sql=mysqli_query($conn,$cart_query);
    $num_of_rows=mysqli_num_rows($cart_sql);
    if($num_of_rows>0){
      echo "<script>alert('Your product already added')</script>";
      
    }
    else{
      $insert_query="INSERT INTO cart_details(id,ip_address,product_qty) value('$product_id','$ip_address',0)";
      $insert_sql=mysqli_query($conn,$insert_query);
      echo "<script>alert('Item is add to cart)</script>";
    }
  }


}


//cart item 

function cartItem(){
  global $conn;

  if(isset($_GET['add_to_cart'])){
    $ip_address = get_ip_address();
    $cart_item_query="SELECT * FROM cart_details where ip_address='$ip_address'";
    $cart_item_sql=mysqli_query($conn,$cart_item_query);
    $cart_num_of_rows=mysqli_num_rows($cart_item_sql);
  }else{
    $ip_address = get_ip_address();
    $cart_item_query="SELECT * FROM cart_details where ip_address='$ip_address'";
    $cart_item_sql=mysqli_query($conn,$cart_item_query);
    $cart_num_of_rows=mysqli_num_rows($cart_item_sql);
  }
  echo $cart_num_of_rows;
}



// Total price cart add 

// function total_price_cart(){

//     global $conn;
//     $ip_address = get_ip_address();
//     $total=0;
//     $total_cart_query="SELECT * FROM cart_details where ip_address='$ip_address'";
//     $total_sql=mysqli_query($conn,$total_cart_query);
//     while($total_rows=mysqli_fetch_array($total_sql)){
//       $product_id =$total_rows['id'];
//       $total_price_query="SELECT * FROM product WHERE id='$product_id'";
//       $total_price_sql=mysqli_query($conn,$total_price_query);
//       while($product_rows=mysqli_fetch_array($total_price_sql)){
//         $product_price=array($product_rows['product_price']);
//         $product_value=array_sum($product_price);
//         $total+=$product_value;
//       }
//     }
//     echo $total;

// }


function cart_total(){
  global $conn;
  $ip_address = get_ip_address();
  $total=0;
  $cart_query="SELECT * FROM `cart_details` where ip_address='$ip_address'";
  $cart_sql=mysqli_query($conn,$cart_query);
  while($cart_rows=mysqli_fetch_array($cart_sql)){
    $product_id=$cart_rows['id'];
    $product_query="SELECT * FROM product where id='$product_id'";
    $product_sql=mysqli_query($conn,$product_query);
    while($product_row=mysqli_fetch_array($product_sql)){
      $total_price=array($product_row['product_price']);
      $total_value=array_sum($total_price);
      $total+=$total_value;
    }
  }
  echo $total;
}


// get pending order in dashboard

function getPendingOrder(){
  global $conn;
  $username_pending=$_SESSION['username'];


  $user_query="SELECT * FROM user where username='$username_pending'";
  $user_sql=mysqli_query($conn,$user_query);
  
  while($pending_rows=mysqli_fetch_assoc($user_sql)){
    $user_id=$pending_rows['id'];
    if(!isset($_GET['edit_account'])){
      if(!isset($_GET['my_order'])){
        if(!isset($_GET['delete_account'])){

          $pending_query="SELECT * FROM order_pending where user_id=$user_id and order_status='pending'";
          $pending_sql=mysqli_query($conn,$pending_query);
          $cart_pending_rows=mysqli_num_rows($pending_sql);
          if($cart_pending_rows>0){
            echo "<h2 class='text-center text-info'>You have <span class='text-danger'>$cart_pending_rows </span> pending order</h2> <p class='text-center'><a href='profile.php?my_order'>Pending Details</a></p> " ;
          }
          else{
            echo "<h2 class='text-center text-info'>You have no pending order</h2> <p class='text-center'><a href='./index.php'>Explore Product</a></p> " ;
          }
        }
      }
    }

  }
}

?>