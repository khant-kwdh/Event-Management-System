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
        <a class="text-white" href="my-orders.php" style="text-decoration:none"> 
             My Orders 
        </a> 
        </h6> 
    </div> 
</div> 

<div class="py-5"> 
    <div class=""> 
        <div class="container"> 
            <div class="row"> 
                <div class="col-md-12"> 
                    <table class="table table-bordered table-stripped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Booking No</th>
                                <th>Price</th>
                                <th>Date</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                    
                                $orders = getOrders();

                                if(mysqli_num_rows($orders) > 0)
                                {
                                    foreach($orders as $item){
                                        ?>
                                            <tr>
                                                <td> <?= $item['id']; ?></td>
                                                <td> <?= $item['tracking_no']; ?></td>
                                                <td> <?= $item['total_price']; ?></td>
                                                <td> <?= $item['created_at']; ?></td>
                                                <td>
                                                    <a href="view-order.php?t=<?= $item['tracking_no']; ?>" class="btn btn-primary">View details</a>
                                                </td>

                                            </tr>
                                        <?php
                                    }

                                }else {
                                    ?>
                                        <tr>
                                            <td colspan = "5">No orders yet</td>
                                                
                                            </td>
                                        </tr>
                                    <?php
                                }
                            ?>
                            
                        </tbody>

                    </table>
                   
                </div> 
            </div> 
        </div> 
    </div> 
</div> 

<!-- Optional JavaScript --> 
<?php include('includes/footer.php'); ?>
