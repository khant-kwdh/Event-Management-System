<?php  
 
include('functions/userfunctions.php'); 
include('includes/header.php'); 
include('authenticate.php'); 

if(isset($_GET['t']))
{
    $tracking_no = $_GET['t'];

    $orderData = checkTrackingNoValid($tracking_no);
    if(mysqli_num_rows($orderData) < 0)
    {
        ?>
            <h4>Something went wrong</h4>
        <?php
        die();
    }

}else{
    ?>
        <h4>Something went wrong</h4>
    <?php
    die();
}

$data = mysqli_fetch_array($orderData);

?> 

<style>
/* Ensuring all columns in a row stretch to the same height */
.row.d-flex {
    display: flex;
    align-items: stretch;
}

/* Center content vertically in columns */
.row .col-md-2, .row .col-md-4 {
    display: flex;
    align-items: center;
}

/* Ensure images have the same height and object fit properly */
.card img {

    height: 100px; /* Adjust as needed */
    object-fit: cover;
}

/* Remove margins and paddings to make layout cleaner */
.card .row {
    margin: 0;
    padding: 0;
}

/* Ensure buttons look consistent and properly aligned */
.card .btn-danger {
    width: 100%;
}
</style>

<div class="py-3 bg-primary"> 
    <div class="container"> 
        <h6 class="text-white"> 
        <a class="text-white" href="index.php"> 
           Home /  
        </a> 
        <a class="text-white" href="my-orders.php"> 
             My Orders  /
        </a>
        <a class="text-white" href="#"> 
             View Orders
        </a> 
        </h6> 
    </div> 
</div> 

<div class="py-5"> 
    <div class=""> 
        <div class="container"> 
            <div class="row"> 
                <div class="col-md-12"> 
                    <div class="card">
                        <div class="card-header bg-primary">
                            <span class="text-white fs-3">View Order</span>
                           
                            <a href="" class="btn btn-warning float-end"><i class="fa fa-reply"></i>Back</a>                 
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="fw-bold" style="color: #3B308A">Booking Details</h4>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12 mb-2">
                                            <label class="fw-bold">Name</label>
                                            <div class="border p-1">
                                                <?= $data['name'];?>
                                            </div>
                                        </div>

                                        <div class="col-md-12 mb-2">
                                            <label class="fw-bold">Email</label>
                                            <div class="border p-1">
                                                <?= $data['email'];?>
                                            </div>
                                        </div>

                                        <div class="col-md-12 mb-2">
                                            <label class="fw-bold">Phone</label>
                                            <div class="border p-1">
                                                <?= $data['phone'];?>
                                            </div>
                                        </div>

                                        <div class="col-md-12 mb-2">
                                            <label class="fw-bold">Booking No.</label>
                                            <div class="border p-1">
                                                <?= $data['tracking_no'];?>
                                            </div>
                                        </div>

                                        <div class="col-md-12 mb-2">
                                            <label class="fw-bold">Address</label>
                                            <div class="border p-1">
                                                <?= $data['address'];?>
                                            </div>
                                        </div>
                                        
                                        <!--
                                        <div class="col-md-12 mb-2">
                                            <label class="fw-bold">Pin Code</label>
                                            <div class="border p-1">
                                                <?= $data['pincode'];?>
                                            </div>
                                        </div>-->

                                    </div>
                                
                                </div>

                                <div class="col-md-6">
                                    <h4 class="fw-bold" style="color: #3B308A">Event Details</h4>
                                    <hr>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Product</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            
                                            <?php
                                                $userId = $_SESSION['auth_user']['user_id'];

                                                $order_query = "SELECT o.id as oid, o.tracking_no, o.user_id, oi.*, oi.qty as orderqty, p. * FROM orders o, order_items oi, 
                                                    products p WHERE o.user_id = '$userId' AND oi.order_id=o.id AND p.id=oi.prod_id 
                                                    AND o.tracking_no = '$tracking_no' ";
                                                $order_query_run = mysqli_query($con, $order_query);

                                
                                                if(mysqli_num_rows($order_query_run) > 0)
                                                {
                                                    foreach($order_query_run as $item){
                                                        ?>
                                                            <tr>
                                                                <td class="align-middle">
                                                                    <img src="uploads/<?= $item['image']; ?>" width = "50px" height = "50px" alt="<?= $item['name']; ?>">
                                                                    <?= $item['name']; ?>
                                                                </td>

                                                                <td class="align-middle">
                                                                    <?= $item['price']; ?>
                                                                </td>

                                                                <td class="align-middle">
                                                                    <?= $item['orderqty']; ?>
                                                                </td>
                                                            </tr>
                                                        <?php
                                                    }
                                                }
            
                                            ?>
                                        </tbody>
                                    </table>

                                    <hr>
                                    <h5>Total Price : <span class = "float-end fw-bold"><?= $data['total_price'] ;?></span></h5>

                                    <hr>
                                
                                    <!--
                                    <label class="fw-bold">Payment Mode</label>
                                    <div class="border p-1 mb-3">
                                        <?//= $data['payment_mode'] ?>
                                    </div>
                                    -->
                                    <div class="text-end" style="text-align: center;">
                                        <a href="payment.php">
                                            <button type="button" class="btn" style="background-color: blue; color: white;">Proceed To Payment</button>
                                        </a>
                                    </div>


                                    <label class="fw-bold">Status</label>
                                    <div class="border p-1 mb-3">
                                        <?php 
                                            if($data['status'] == 0)
                                            {
                                                echo "Under Process";
                                            }else if($data['status'] == 1)
                                            {
                                                echo "Confirmed";
                                            }else if($data['status'] == 2)
                                            {
                                                echo "Cancelled";
                                            }
                                        
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                </div> 
            </div> 
        </div> 
    </div> 
</div> 

<!-- Optional JavaScript --> 
<?php include('includes/footer.php'); ?>
