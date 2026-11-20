<?php 
  include('includes/header.php');
  include('../functions/myfunctions.php');
?>

<style>
    table {
        width: 100%;
        border-collapse: collapse;
    }

    th {
        background-color: #f8f9fa;
        text-align: center;
        padding: 10px;
    }

    td {
        text-align: center;
        padding: 15px;
        border: 3px solid #ddd;
    }

    table, th, td {
        border: 3px solid #ddd;
    }

    tr:hover {
        background-color: #f1f1f1;
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                   <h4> Events </h4>
                </div>
                <div class="card-body" id="products_table">
                    <table class="table-bordered">
                        <thead>
                            <tr>
                                <th>No</th> <!-- Changed from ID to No -->
                                <th>Name</th>
                                <th>Image</th>
                                <th>Date</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                                <th>Location</th>
                                <th>Fees</th>
                                <th>Edit</th>
                                <th>Delete</th>
                           </tr>
                        </thead>
                        <tbody>
                            <?php 
                               $products = getAll("products");

                               if(mysqli_num_rows($products) > 0)
                               {
                                 $counter = 1; // Initialize counter for "No"
                                 foreach($products as $item)
                                 {
                                    ?>
                                        <tr>
                                                <td><?= $counter++; ?></td> <!-- Show counter instead of ID -->
                                                <td><?= $item['name']; ?></td>
                                                <td>
                                                  <img src="../uploads/<?= $item['image']; ?>" width="100px" height="100px" alt="<?= $item['name']; ?>">
                                                </td>
                                                <td><?= $item['event_date']; ?></td>
                                                <td><?= $item['event_start_time']; ?></td>
                                                <td><?= $item['event_end_time']; ?></td>
                                                <td><?= $item['event_location']; ?></td>
                                                <td><?= $item['selling_price']; ?></td>
                                                
                                                <td>
                                                    <a href="edit-product.php?id=<?= $item['id']; ?>" class="btn btn-sm btn-primary">Edit</a>
                                                </td>

                                                <td>              
                                                    <button type="button" class="btn btn-sm btn-danger delete_product_btn" value="<?= $item['id']; ?>">Delete</button>                                            
                                                </td>
                                        </tr>
                                    <?php
                                 }
                               }
                               else
                               {
                                    echo "<tr><td colspan='10' class='text-center'>No records found</td></tr>";
                               }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php');?>
