<?php

session_start();
include('../config/dbcon.php');
include('../functions/myfunctions.php');

if(isset($_POST['add_category_btn']))
{
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $description = $_POST['description'];
    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $meta_keywords = $_POST['meta_keywords'];
    $status = isset($_POST['status']) ? '1' : '0';
    $popular = isset($_POST['popular']) ? '1' : '0';

    $image = $_FILES['image']['name'];

    $path = "../uploads";

    $image_ext = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time().'.'.$image_ext;

    $cate_query = "INSERT INTO 
    categories (name, slug, description, meta_title, meta_description, meta_keywords, status, popular, image)
    VALUES('$name', '$slug', '$description', '$meta_title', '$meta_description', '$meta_keywords', '$status', '$popular', '$filename')";

    $cate_query_run = mysqli_query($con, $cate_query);

    if($cate_query_run)
    {
        move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$filename);
        redirect("add-category.php", "Category Added More Successfully");
    }
    else
    {
        redirect("add-category.php", "Somethin Went Wrong");
    }
}
else if (isset($_POST['update_category_btn'])) {
    // Collect and sanitize form data for updating category
    $category_id = mysqli_real_escape_string($con, $_POST['category_id']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $slug = mysqli_real_escape_string($con, $_POST['slug']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $meta_title = mysqli_real_escape_string($con, $_POST['meta_title']);
    $meta_description = mysqli_real_escape_string($con, $_POST['meta_description']);
    $meta_keywords = mysqli_real_escape_string($con, $_POST['meta_keywords']);
    $status = isset($_POST['status']) ? '1' : '0';
    $popular = isset($_POST['popular']) ? '1' : '0';

    
 
    // Get new and old image values
    $new_image = $_FILES['image']['name'];
    $old_image = isset($_POST['old_image']) ? $_POST['old_image'] : '';  // Check if old_image is set

    // Set update filename
    //$update_filename = $new_image != "" ? $new_image : $old_image;
    if($new_image !="")
    {
        //$update_filename =$new_image;
        $image_ext = pathinfo($new_image,PATHINFO_EXTENSION);
        $update_filename = time().'.'.$image_ext;
    }
    else
    {
        $update_filename =$old_image;
    }

    $path = "../uploads";

    // Update query
    $update_query = "UPDATE categories SET name='$name', slug='$slug', description='$description',
                     meta_title='$meta_title', meta_description='$meta_description', meta_keywords='$meta_keywords', 
                     status='$status', popular='$popular', image='$update_filename' WHERE id='$category_id'";

    // Execute the update query
    $update_query_run = mysqli_query($con, $update_query);  // Assign result to $update_query_run

    if ($update_query_run) {
        // Handle file upload and deletion of old image if necessary
        if ($_FILES['image']['name'] != "") {
            move_uploaded_file($_FILES['image']['tmp_name'], $path . '/' . $update_filename);
            // Remove the old image if it exists
            if (file_exists($path . "/" . $old_image) && $old_image != "") {
                unlink($path . "/" . $old_image);
            }
        }
        redirect("edit-category.php?id=$category_id", "Category Updated Successfully");
    } else {
        redirect("edit-category.php?id=$category_id", "Something Went Wrong");
    }

    
}
else if(isset($_POST['delete_category_btn']))
{
        $category_id =mysqli_real_escape_string($con,$_POST['category_id']);
        $category_query ="SELECT * FROM categories WHERE id ='$category_id'";
        $category_query_run=mysqli_query($con,$category_query);
        $category_data=mysqli_fetch_array($category_query_run);
        $image =$category_data['image'];



        $delete_query ="DELETE FROM categories WHERE id='$category_id'";
        $delete_query_run =mysqli_query($con,$delete_query);

        if($delete_query_run)
        {
            if(file_exists("../uploads/".$image))
            {
              unlink("../uploads/".$image);
            }
            redirect("category.php?id=$category_id", "Category delete successfully");
        
        }
        else
        {
            redirect("category.php?id=$category_id", "Something Went Wrong");
        }
}

elseif (isset($_POST['add_product_btn'])) {
    // Add product logic
    $category_id = $_POST['category_id'];
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $small_description = $_POST['small_description'];
    $description = $_POST['description'];
    $original_price = $_POST['original_price'];
    $selling_price = $_POST['selling_price'];
    $qty = $_POST['qty'];
    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $meta_keywords = $_POST['meta_keywords'];
    $status = isset($_POST['status']) ? '1' : '0';
    $trending = isset($_POST['trending']) ? '1' : '0';

    //Date, Time, Location
    $event_date = $_POST['event_date'];
    $event_start_time = $_POST['event_start_time'];
    $event_end_time = $_POST['event_end_time'];
    $event_location = $_POST['event_location'];

    // Image handling
    $image = $_FILES['image']['name'];
    $path = "../uploads";
    $image_ext = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time().'.'.$image_ext;

    if ($name != "" && $slug != "" && $description != "") {
        $product_query = "INSERT INTO products (category_id, name, slug, small_description, description, event_date, event_start_time, event_end_time, event_location, original_price, selling_price, qty, meta_title, meta_description, meta_keywords, status, trending, image) 
                          VALUES ('$category_id', '$name', '$slug', '$small_description', '$description', '$event_date', '$event_start_time', '$event_end_time', '$event_location', '$original_price', '$selling_price', '$qty', '$meta_title', '$meta_description', '$meta_keywords', '$status', '$trending', '$filename')";

        $product_query_run = mysqli_query($con, $product_query);

        if ($product_query_run) {
            move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$filename);
            redirect("add-product.php", "Event Added Successfully");
        } else {
            redirect("add-product.php", "Something Went Wrong!");
        }
    }
} 
elseif (isset($_POST['update_product_btn'])) {
    // Update product logic
    $product_id = $_POST['product_id'];
    $category_id = $_POST['category_id'];
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $small_description = $_POST['small_description'];
    $description = $_POST['description'];
    $original_price = $_POST['original_price'];
    $selling_price = $_POST['selling_price'];
    $qty = $_POST['qty'];
    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $meta_keywords = $_POST['meta_keywords'];
    $status = isset($_POST['status']) ? '1' : '0';
    $trending = isset($_POST['trending']) ? '1' : '0';

    //Date,Time,Location
    $event_date = mysqli_real_escape_string($con, $_POST['event_date']);
    $event_start_time = mysqli_real_escape_string($con, $_POST['event_start_time']);
    $event_end_time = mysqli_real_escape_string($con, $_POST['event_end_time']);
    $event_location = mysqli_real_escape_string($con, $_POST['event_location']);

    // Get new and old image values
    $new_image = $_FILES['image']['name'];
    $old_image = isset($_POST['old_image']) ? $_POST['old_image'] : '';

    $image_ext = pathinfo($new_image, PATHINFO_EXTENSION);
    $filename = time().'.'.$image_ext;

    // If no new image uploaded, retain the old image
    if ($new_image != "") {
        $update_filename = $filename;
    } else {
        $update_filename = $old_image;
    }

    $path = "../uploads";
    $update_product_query = "UPDATE products SET name='$name', slug='$slug', small_description='$small_description', description='$description', 
    event_date = '$event_date', event_start_time = '$event_start_time', event_end_time = '$event_end_time', event_location = '$event_location',
    original_price='$original_price', selling_price='$selling_price', qty='$qty', meta_title='$meta_title', meta_description='$meta_description', meta_keywords='$meta_keywords', status='$status', trending='$trending', image='$update_filename' WHERE id='$product_id'";

    $update_product_query_run = mysqli_query($con, $update_product_query);

    if ($update_product_query_run) {
        // If a new image is uploaded, handle it
        if ($new_image != "") {
            move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$update_filename);

            // Remove old image if it exists
            if (file_exists($path.'/'.$old_image) && $old_image != "") {
                unlink($path.'/'.$old_image);
            }
        }
        redirect("edit-product.php?id=$product_id", "Event Updated Successfully");
    } else {
        redirect("edit-product.php?id=$product_id", "Something Went Wrong");
    }
} 
elseif (isset($_POST['delete_product_btn'])) {
    // Delete product logic
    $product_id = $_POST['product_id'];
    $product_query = "SELECT * FROM products WHERE id='$product_id'";
    $product_query_run = mysqli_query($con, $product_query);
    $product_data = mysqli_fetch_array($product_query_run);
    $image = $product_data['image'];

    $delete_product_query = "DELETE FROM products WHERE id='$product_id'";
    $delete_product_query_run = mysqli_query($con, $delete_product_query);

    if ($delete_product_query_run) {
        if (file_exists($path.'/'.$image)) {
            unlink($path.'/'.$image);
        }
        //redirect("products.php", "Event deleted successfully");
        echo 200;
    } else {
        //redirect("products.php", "Something Went Wrong");
        echo 500;
    }
} 
else if (isset($_POST['update_order_btn'])){
    $track_no = $_POST['tracking_no'];
    $order_status = $_POST['order_status'];

    //$updateOrder_query = "UPDATE orders SET status = 'order_status' WHERE tracking_no = '$track_no' ";
    $updateOrder_query = "UPDATE orders SET status = '$order_status' WHERE tracking_no= '$track_no' ";
    $updateOrder_query_run = mysqli_query($con, $updateOrder_query);

    redirect("view-order.php?t=$track_no", "Order Status Updated Sucessfully");
}
else 
{
    header('Location: ../index.php');
}

?>