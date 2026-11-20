<?php  

//include('../middleware/adminMiddleware.php');
include('includes/header.php'); 

//include('functions/myfunctions.php');
include('../functions/myfunctions.php');

//include('authenticate.php'); 
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
 

</style>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary">
                    <h4 class="text-white"> Booking History
                        <a href="orders.php" class="btn btn-warning float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body" id="">
                    <table class="table table-bordered table-stripped">
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
                    
                                $orders = getOrderHistory();

                                if(mysqli_num_rows($orders) > 0)
                                {
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
