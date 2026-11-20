<?php
session_start();
include('config/dbcon.php'); 

function getAllActive($table)
{
    global $con;
    $query = "SELECT * FROM $table WHERE status='0'";
   return $query_run= mysqli_query($con, $query);
}

function getAllTrending()
{
    global $con;
    $query = "SELECT * FROM products WHERE trending='1'";
   return $query_run= mysqli_query($con, $query);
}

function getSlugActive($table,$slug)
{
    global $con;
    $query = "SELECT * FROM $table WHERE slug= '$slug' AND status='0' LIMIT 1";
    return $query_run= mysqli_query($con, $query);
}

function getProdByCategory($category_id)
{
    global $con;
    $query = "SELECT * FROM products WHERE category_id='$category_id' AND status='0'";
    return $query_run= mysqli_query($con, $query);
}


function getIDActive($table,$id)
{
    global $con;
    $query = "SELECT * FROM $table WHERE id= '$id' AND status='0'";
    return $query_run= mysqli_query($con, $query);
}
function getCartItems()
{
    global $con;
    $userID= $_SESSION['auth_user']['user_id'];
    $query = "SELECT c.id as cid, c.prod_id,c.prod_qty,p.id as pid,p.name,p.image,p.selling_price 
              FROM carts c, products p WHERE c.prod_id=p.id AND c.user_id='$userID' ORDER BY c.id DESC";
    return $query_run= mysqli_query($con, $query);
}

function getOrders()
{
    global $con;
    $userId= $_SESSION['auth_user']['user_id'];

    //writing query
    $query = "SELECT * FROM orders WHERE user_id = '$userId' ";
    
    return $query_run = mysqli_query($con, $query);
}

function redirect($url, $message)
{
    $_SESSION['message'] = $message;
    header('Location: '.$url);
    exit();
}


function checkTrackingNoValid($trackingNo){
    global $con;
    $userId = $_SESSION['auth_user']['user_id'];

    $query = "SELECT * FROM orders WHERE tracking_no = '$trackingNo' AND user_id = '$userId'";
    return mysqli_query($con, $query);
}

if(isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];

    // Fetch current ticket count
    $query = "SELECT qty FROM products WHERE id = '$product_id'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    
    if ($row['qty'] > 0) {
        // Reduce ticket count
        $new_qty = $row['qty'] - 1;
        $updateQuery = "UPDATE products SET qty = '$new_qty' WHERE id = '$product_id'";
        mysqli_query($conn, $updateQuery);

        echo $new_qty; // Send updated count back to AJAX
    } else {
        echo "Sold Out"; // If tickets are 0
    }
}
?>