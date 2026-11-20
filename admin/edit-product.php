<?php
include('includes/header.php');
include('../functions/myfunctions.php');
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $product = getByID("products", $id);

                if (mysqli_num_rows($product) > 0) {
                    $data = mysqli_fetch_array($product);
                    ?>
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Product
                            <a href="products.php" class="btn btn-primary float-end">Back</a>
                            </h4>
                        </div>
                        <div class="card-body">
                            <form action="code.php" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="mb-0">Select Category</label>
                                        <select name="category_id" class="form-select mb-2">
                                            <option selected>Select Category</option>
                                            <?php
                                            $categories = getAll("categories");

                                            if (mysqli_num_rows($categories) > 0) {
                                                foreach ($categories as $item) {
                                                    ?>
                                                    <option value="<?= $item['id']; ?>" <?= $data['category_id'] == $item['id'] ? 'selected' : '' ?>><?= $item['name']; ?></option>
                                                    <?php
                                                }
                                            } else {
                                                echo "No category available";
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <input type="hidden" name="product_id" value="<?= $data['id']; ?>">
                                    <div class="col-md-6">
                                        <label class="mb-0">Name</label>
                                        <input type="text" required name="name" value="<?= $data['name']; ?>" placeholder="Enter Product Name" class="form-control mb-2">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="mb-0">Slug</label>
                                        <input type="text" required name="slug" value="<?= $data['slug']; ?>" placeholder="Enter Slug" class="form-control mb-2">
                                    </div>

                                    <div class="col-md-12">
                                        <label class="mb-0">Small Description</label>
                                        <textarea rows="3" name="small_description" placeholder="Enter small description" class="form-control mb-2"><?= $data['small_description']; ?></textarea>
                                    </div>

                                    <div class="col-md-12">
                                        <label class="mb-0">Description</label>
                                        <textarea rows="3" name="description" placeholder="Enter description" class="form-control mb-2"><?= $data['description']; ?></textarea>
                                    </div>
                                    
                                    <!--Date, Time, Location -->
                                    <div class="col-md-12">
                                        <label class="mb-0">Event Date</label>
                                        <input type="date" required name="event_date" value="<?= $data['event_date']; ?>" placeholder="Enter original price" class="form-control mb-2">
                                    </div>
                                                       
                                    <div class="col-md-6">
                                        <label class="mb-0">Start Time</label>
                                        <input type="time" required name="event_start_time" value="<?= $data['event_start_time']; ?>" placeholder="Enter original price" class="form-control mb-2">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="mb-0">End Time</label>
                                        <input type="time" required name="event_end_time" value="<?= $data['event_end_time']; ?>" placeholder="Enter original price" class="form-control mb-2">
                                    </div>

                                    <div class="col-md-12">
                                        <label class="mb-0">Location</label>
                                        <input type="text" required name="event_location" value="<?= $data['event_location']; ?>" placeholder="Enter original price" class="form-control mb-2">
                                    </div>
                                    <!--Date, Time, Location -->

                                    <div class="col-md-6">
                                        <label class="mb-0">Original Price</label>
                                        <input type="text" required name="selling_price" value="<?= $data['selling_price']; ?>" placeholder="Enter selling price" class="form-control mb-2">
                                    </div>
                                    
                                    
                                    <div class="col-md-6">
                                        <label class="mb-0">Selling Price</label>
                                        <input type="text" required name="selling_price" value="<?= $data['selling_price']; ?>" placeholder="Enter selling price" class="form-control mb-2">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="mb-0">Limited People</label>
                                        <input type="number" required name="qty" value="<?= $data['qty']; ?>" placeholder="Enter quantity" class="form-control mb-2">
                                    </div>

                                    <div class="col-md-3">
                                        <label class="mb-0">Status</label><br>
                                        <input type="checkbox" name="status" <?= $data['status'] == '1' ? 'checked' : '' ?>>
                                    </div>

                                    <div class="col-md-3">
                                        <label class="mb-0">Trending</label><br>
                                        <input type="checkbox" name="trending" <?= $data['trending'] == '1' ? 'checked' : '' ?>>
                                    </div>

                                    
                                    <div class="col-md-12">
                                        <label class="mb-0">Meta Title</label>
                                        <input type="text" name="meta_title" value="<?= $data['meta_title']; ?>" placeholder="Enter meta title" class="form-control mb-2">
                                    </div>

                                    <div class="col-md-12">
                                        <label class="mb-0">Meta Description</label>
                                        <input type="text" name="meta_description" value="<?= $data['meta_description']; ?>" placeholder="Enter meta description" class="form-control mb-2">
                                    </div>

                                    <div class="col-md-12">
                                        <label class="mb-0">Meta Keywords</label>
                                        <input type="text" name="meta_keywords" value="<?= $data['meta_keywords']; ?>" placeholder="Enter meta keywords" class="form-control mb-2">
                                    </div>

                                    <div class="col-md-12">
                                        <label class="mb-0">Image</label><br>
                                        <input type="file" name="image" class="form-control mb-2">
                                        <input type="hidden" name="old_image" value="<?= $data['image']; ?>">
                                    </div>

                                    <div class="col-md-12 mt-3">
                                        <button type="submit" name="update_product_btn" class="btn btn-primary">Update Product</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>
