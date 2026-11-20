<?php
include('includes/header.php');
include('../middleware/adminMiddleware.php');
include('../config/dbcon.php'); // Database connection

// Ensure admin authentication
if (!isset($_SESSION['auth']) || $_SESSION['role_as'] != 1) {
    $_SESSION['message'] = "You are not authorized to access this page";
    header('Location: ../index.php');
    exit;
}

// Fetch data counts
$categories_count = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) AS count FROM categories"))['count'];
$events_count = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) AS count FROM products"))['count'];
$orders_count = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(*) AS count FROM orders"))['count'];

?>

<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-md-12">
            <h2 style = "color: #3B308A">Admin Dashboard</h2>
            <p>Manage your system data and view statistics.</p>

            <div class="row">
                <!-- Orders Count -->
                <div class="col-lg-3 col-6">
                    <div class="small-box" 
                        style="padding: 20px; 
                        border-top-right-radius: 10px; 
                        border-top-left-radius: 10px;
                        background-color: #3986be;">
                        <div class="inner">
                            <h2 style="color: white;"><?php echo $orders_count; ?></h2>
                            
                            <p style="color: white">Bookings
                                <i class="fas fa-shopping-cart" style="color: #ececec; font-size: 35px; float: right;"></i>
                            </p>
                        </div>
                    </div>

                    <div style="
                        text-align: center; 
                        background-color: #f5f5f5; 
                        border-bottom-left-radius: 10px; 
                        border-bottom-right-radius: 10px;
                        border: 2px solid #ccc; /* Add border */
                        box-shadow: 4px 4px 10px rgba(0, 0, 0, 0.2); /* Add shadow */
                        padding: 10px; /* Add padding for better spacing */
                        ">
                        <a href="orders.php" class="small-box-footer" style="color: black;">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <!-- Category Count --> 
                <div class="col-lg-3 col-6">
                    <div class="small-box" 
                        style="padding: 20px; 
                        border-top-right-radius: 10px; 
                        border-top-left-radius: 10px;
                        background-color: #65bf65;">
                        <div class="inner">
                            <h2 style="color: white;"><?php echo $categories_count; ?></h2>
                            
                            <p style="color: white">Listed Categories
                                <i class="fas fa-th-list" style="color: #ececec; font-size: 35px; float: right;"></i>
                            </p>
                        </div>
                    </div>

                    <div style="
                        text-align: center; 
                        background-color: #f5f5f5; 
                        border-bottom-left-radius: 10px; 
                        border-bottom-right-radius: 10px;
                        border: 2px solid #ccc; /* Add border */
                        box-shadow: 4px 4px 10px rgba(0, 0, 0, 0.2); /* Add shadow */
                        padding: 10px; /* Add padding for better spacing */
                        ">
                        <a href="category.php" class="small-box-footer" style="color: black;">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>


                <!-- Products Count -->
                <div class="col-lg-3 col-6">
                        <div class="small-box" 
                            style="padding: 20px; 
                            border-top-right-radius: 10px; 
                            border-top-left-radius: 10px;
                            background-color: #f0b454;">
                            <div class="inner">
                                <h2 style="color: white;"><?php echo $events_count; ?></h2>
                                
                                <p style="color: white">Total Events
                                    <i class="fas fa-box" style="color: #ececec; font-size: 35px; float: right;"></i>
                                </p>
                            </div>
                        </div>

                        <div style="
                            text-align: center; 
                            background-color: #f5f5f5; 
                            border-bottom-left-radius: 10px; 
                            border-bottom-right-radius: 10px;
                            border: 2px solid #ccc; /* Add border */
                            box-shadow: 4px 4px 10px rgba(0, 0, 0, 0.2); /* Add shadow */
                            padding: 10px; /* Add padding for better spacing */
                            ">
                            <a href="products.php" class="small-box-footer" style="color: black;">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>   
                    </div>
                </div>
                
                <!-- Unique Visitors Example (Static) -->

            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>
