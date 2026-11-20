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
                   <h4> Categories </h4>
                </div>
                <div class="card-body" id="category-table">
                    <table class="table-bordered">
                        <thead>
                            <tr>
                                <th>No</th> <!-- Changed from ID to No -->
                                <th>Name</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                            <?php 
                               $category = getAll("categories");

                               if(mysqli_num_rows($category) > 0)
                               {
                                 $counter = 1; // Initialize counter for "No"
                                 foreach($category as $item)
                                 {
                                    ?>
                                        <tr>
                                                <td><?= $counter++; ?></td> <!-- Show counter instead of ID -->
                                                <td><?= $item['name']; ?></td>
                                                <td>
                                                  <img src="../uploads/<?= $item['image'] ;?>" width="50px" height="50px" alt="<?= $item['name']; ?>">
                                                </td>
                                                <td>
                                                    <?= $item['status'] == '0'? "Visible":"Hidden" ?>
                                                </td>

                                                <td>
                                                    <a href="edit-category.php?id=<?= $item['id']; ?>" class="btn btn-primary">Edit</a>
                                                    <form action="code.php" method="POST">
                                                        <input type="hidden" name="category_id" value="<?= $item['id'];?>">
                                                       <button type="submit" class="btn btn-danger" name="delete_category_btn">Delete</button>
                                                    </form>
                                                </td>
                                        </tr>
                                    <?php
                                 }
                               }
                               else
                               {
                                echo "No records found";
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
