<?php  
 
include('functions/userfunctions.php'); 
include('includes/header.php'); 
include('authenticate.php'); 
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
        <a class="text-white" href="index.php" style="text-decoration:none"> 
           Home /  
        </a> 
        <a class="text-white" href="cart.php" style="text-decoration:none"> 
             Cart 
        </a> 
        </h6> 
    </div> 
</div> 

<div class="py-5"> 
    <div class=""> 
        <div class="container"> 
            <div class="row"> 
                <div class="col-md-12"> 
                   
                    <?php
                $items = getCartItems();  

                if(mysqli_num_rows($items) > 0) {
    
                    ?>
                    <div class="row align-items-center"> 
                        <div class="col-md-6"> 
                            <h6> Event</h6> 
                        </div> 
                        <div class="col-md-2"> 
                            <h6>Price</h6> 
                        </div> 
                        <div class="col-md-2"> 
                            <h6>No. of People</h6> 
                        </div> 
                        <div class="col-md-2"> 
                            <h6>Remove</h6> 
                        </div> 
                    </div>

                    <?php 
                   
                    foreach ($items as $citem) { 
                    ?> 
                        <div class="card product_data shadow-sm mb-3"> 
                            <div class="row d-flex align-items-stretch"> 
                                <div class="col-md-2"> 
                                    <img src="uploads/<?=$citem['image'] ?>" alt="Image" class="w-50"> 
                                </div> 
                                <div class="col-md-4"> 
                                    <h5> <?= $citem['name']?></h5> 
                                </div> 
                                <div class="col-md-2"> 
                                    <h5><?= $citem['selling_price']?> Ks</h5> 
                                </div> 

                                
                                <div class="col-md-2"> 
                                    <input type="hidden" class="prodID" value="<?= $citem['prod_id']?>"> 
                                    <div class="input-group mb-3" style="width:130px"> 
                                        <button class="input-group-text decrement-btn updateQty">-</button> 
                                        <input type="text" class="form-control text-center input-qty bg-white" value="<?=$citem['prod_qty'] ?>" > 
                                        <button class="input-group-text increment-btn updateQty">+</button> 
                                    </div> 
                                </div>
                                
                                <!--
                                <div class="col-md-2"> 
                                    <h5><?= $citem['prod_qty']?></h5> 
                                </div>
                    -->
                                <div class="col-md-2"> 
                                    <button class="btn btn-danger btn-sm deleteItem" value="<?= $citem['cid'] ?>"> 
                                        <i class="fa fa-trash me-2"></i>Remove
                                    </button> 
                                </div> 
                    
                            </div> 
                        </div> 
                    <?php 
                    } 
                    ?>

                    <div class="float-end">
                    <a href="checkout.php" class="btn btn-outline-primary">Proceed to checkout</a>

                </div>
                <?php
                }else{
                    ?>
                    <div class="card card-body shadow text-center">
                        <h4 class="py-3">Your cart is empty</h4>

                <?php
                }
                ?>
            
                </div> 
            </div> 
        </div> 
    </div> 
</div> 

<!-- Optional JavaScript --> 
<?php include('includes/footer.php'); ?>
