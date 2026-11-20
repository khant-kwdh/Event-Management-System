<?php 
include('includes/header.php');
include('../functions/myfunctions.php');
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add Product</h4>
                </div>
                <div class="card-body">
                      <form action="code.php" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-12">
                                <label for="">Select Category</label>
                                <select name="category_id" class="form-select mb-2">
                                    <?php
                                    $categories = getAll("categories");

                                    if(mysqli_num_rows($categories) > 0)
                                    {
                                        foreach ($categories as $item){
                                            ?>
                                             <option value="<?= $item['id']; ?>"><?= $item['name']; ?></option>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "No category available";
                                    }
                                    
                                    ?>
                                    </select>
                               
                                </div>

                                <div class="col-md-6">
                                    <label class="mb-0">Name</label>
                                    <input type="text" required name="name" placeholder="Enter Event Name" class="form-control mb-2">
                                </div>

                                
                                <div class="col-md-6">
                                    <label class="mb-0">Slug</label>
                                    <input type="text" required name="slug" placeholder="Enter Slug" class="form-control mb-2">
                                </div>
                                <div class="col-md-12">
                                    <label class="mb-0">Small Description</label>
                                    <textarea rows="3" name="small_description" placeholder="Enter small description" class="form-control mb-2"></textarea>
                                </div>

                                <div class="col-md-12">
                                    <label class="mb-0">Description</label>
                                    <textarea rows="3" name="description" placeholder="Enter description" class="form-control mb-2"></textarea>
                                </div>
                                
                                <!--Event Date, Time, Location -->
                                <div class="col-md-12 mt-3">
                                    <label for="">Event Date</label>
                                    <input type="date" name="event_date" class="form-control">
                                </div>

                                <div class="col-md-6 mt-3">
                                    <label for="">Event Start Time</label>
                                    <input type="time" name="event_start_time" class="form-control">
                                </div>

                                <div class="col-md-6 mt-3">
                                    <label for="">Event End Time</label>
                                    <input type="time" name="event_end_time" class="form-control">
                                </div>

                                <div class="col-md-12  mt-3">
                                    <label for="">Event Location</label>
                                    <input type="text" name="event_location" placeholder="Enter Event Location" class="form-control">
                                </div>
                                <!--Event Date, Time, Location -->
                                
                                <div class="col-md-6">
                                    <label class="mb-0">Original price</label>
                                    <input type="text" required name="original_price" placeholder="Enter original price" class="form-control mb-2">
                                </div>

                                <div class="col-md-6">
                                    <label class="mb-0">Selling price</label>
                                    <input type="text" required name="selling_price" placeholder="Enter selling price" class="form-control mb-2">
                                    </div>

                                <div class="col-md-12">
                                    <label class="mb-0">Upload Image</label>
                                    <input type="file" required name="image"  class="form-control mb-2">
                                </div>

                            <div class="row">

                                <div class="col-md-6">
                                    <label class="mb-0">Limited People</label>
                                    <input type="number" required name="qty" placeholder="Enter quantity" class="form-control mb-2">
                                    </div>

                                <div class="col-md-3">
                                    <label class="mb-0">Status</label><br>
                                    <input type="checkbox" name="status">
                                    </div>

                                    <div class="col-md-3">
                                    <label class="mb-0">Trending</label><br>
                                    <input type="checkbox" name="trending">
                                    </div>
                                    </div>

                                    <div class="col-md-12">
                                    <label class="mb-0">Meta Title</label>
                                    <input type="text" required name="meta_title" placeholder="Enter meta title" class="form-control mb-2">
                                </div>

                                <div class="col-md-12">
                                    <label class="mb-0">Meta Description</label>
                                    <input type="text" required name="meta_description" placeholder="Enter meta description" class="form-control mb-2">
                                </div>

                                <div class="col-md-12">
                                    <label class="mb-0">Meta Keywords</label>
                                    <input type="text" required name="meta_keywords" placeholder="Enter meta keywords" class="form-control mb-2">
                                    </div>

                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary" name="add_product_btn">Save</button>
                                </div>
                            </div>
                    </form>
              </div>

            </div>
                    
      </div>
   </div>            
</div>

<?php include('includes/footer.php');?>