<?php  
 
include('functions/userfunctions.php'); 
include('includes/header.php'); 
include('authenticate.php'); 
?> 

<style>
/* Ensure input fields and sections are well aligned */
.container {
    max-width: 900px;
}
.card-body {
    padding: 20px;
}

/* Order details section design */
.order-item img {
    width: 40px;
    height: 40px;
    object-fit: cover;
    margin-right: 10px;
}
.order-item {
    display: flex;
    align-items: center;
    justify-content: space-between;
    border-bottom: 1px solid #ddd;
    padding: 10px 0;
}
</style>

<div class="py-3 bg-primary"> 
    <div class="container"> 
        <h6 class="text-white"> 
        <a class="text-white" href="index.php" style="text-decoration:none"> 
           Home /  
        </a> 
        <a class="text-white" href="checkout.php" style="text-decoration:none"> 
             Checkout
        </a> 
        </h6> 
    </div> 
</div> 

<div class="py-5"> 
    <div class="container"> 
        <div class="row"> 
            <!-- Basic Details -->
            <div class="col-md-7">
                <div class="card">
                    <div class="card-body shadow">
                        <form action="functions/placeorder.php" method="POST">
                        <h5>Basic Details</h5>
                        <hr>
                        <div class="mb-3">
                            <label class="fw-bold"> Name </label>
                            <input type="text" name="name" required placeholder="Enter your full name" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="fw-bold"> Email </label>
                            <input type="email" name="email"required  placeholder="Enter your email" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="fw-bold"> Phone </label>
                            <input type="text" name="phone" required placeholder="Enter your phone number" class="form-control">
                        </div>

                        
                        <div class="mb-3">
                            <label class="fw-bold"> Pin Code</label>
                            <input type="text" name="pincode" required placeholder="Enter your pin code" class="form-control">
                        </div>
                        
                        <div class="mb-3">
                            <label class="fw-bold"> Address</label>
                            <textarea name="address" required class="form-control" rows="3"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Order Details -->
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body shadow">
                        <h5>Event Details</h5>
                        <hr>
                        <?php 
                        $items = getCartItems();  
                        $totalPrice = 0;
                        foreach ($items as $citem) { 
                        ?> 
                            <div class="order-item"> 
                                <div class="d-flex align-items-center">
                                    <img src="uploads/<?=$citem['image'] ?>" alt="Image"> 
                                    <span><?= $citem['name']?></span>
                                </div>
                                <div>
                                    <span><?= $citem['selling_price']?></span>
                                    <span> x <?= $citem['prod_qty']?></span>
                                </div>
                            </div> 
                        <?php 

                        $totalPrice += $citem['selling_price'] * $citem['prod_qty'];
                        } 
                        ?>
                        <hr>
                        <h5>Total Price : <span class="float-end fw-bold"><?= $totalPrice ?></span></h5>
                        <div class="">
                            <input type="hidden" name="payment_mode" value="COD">
                            <button type ="submit" name ="placeOrderBtn" class="btn btn-primary w-100">Confirm</button>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div> 
</div> 

<?php include('includes/footer.php'); ?>

<script src="https://www.paypal.com/sdk/js?client-id=YOUR_CLIENT_ID&currency=USD"></script>
