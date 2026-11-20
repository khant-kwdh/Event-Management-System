<?php   
 
//include('../middleware/adminMiddleware.php'); 
include('includes/header.php');  
 
//include('functions/myfunctions.php'); 
include('../functions/myfunctions.php'); 
 
//include('authenticate.php');  
?>  
 
<style> 
    /* Table Styles */ 
    .table { 
        width: 100%; 
        border-collapse: collapse; 
    } 
 
    .table th, .table td { 
        border: 2px solid #ddd !important; 
        text-align: center; 
        padding: 12px; 
    } 
 
    .table th { 
        background-color: #f8f9fa; 
        color: gray; 
        font-weight: bold; 
    } 
 
    .table tr:hover { 
        background-color: #f1f1f1 !important; 
    } 
 
    /* Card Header */ 
    .card-header { 
        background-color: #e91e63 !important; 
        color: white !important; 
        padding: 15px; 
        font-size: 20px; 
    } 
 
    .btn-warning { 
        font-weight: bold; 
    } 
</style> 
 
<div class="container"> 
    <div class="row"> 
        <div class="col-md-12"> 
            <div class="card"> 
                <div class="card-header"> 
                    <h4 style="color: white;">Bookings 
                        <a href="order-history.php" class="btn btn-warning float-end" style="color: white;">Order History</a> 
                    </h4> 
                </div> 
                <div class="card-body"> 
                    <table class="table table-bordered table-striped"> 
                        <thead> 
                            <tr> 
                                <th>ID</th> 
                                <th>User</th> 
                                <th>Tracking No</th> 
                                <th>Price</th> 
                                <th>Date</th> 
                                <th>View</th> 
                            </tr> 
                        </thead> 
                        <tbody> 
                            <?php 
                                $orders = getAllOrders(); 
 
                                if(mysqli_num_rows($orders) > 0) { 
                                    foreach($orders as $item){ 
                                        ?> 
                                            <tr> 
                                                <td> <?= $item['id']; ?></td> 
                                                <td> <?= $item['name']; ?></td> 
                                                <td> <?= $item['tracking_no']; ?></td> 
                                                <td> <?= $item['total_price']; ?></td> 
                                                <td> <?= $item['created_at']; ?></td> 
                                                <td> 
                                                    <a href="view-order.php?t=<?= $item['tracking_no']; ?>" class="btn btn-primary">View details</a> 
                                                </td> 
                                            </tr> 
                                        <?php 
                                    } 
                                } else { 
                                    ?> 
                                        <tr> 
                                            <td colspan="6" class="text-center">No orders yet</td> 
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