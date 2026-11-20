<?php
include('config.php'); // Ensure your database connection is included

if(isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];

    // Fetch current ticket count
    $query = "SELECT qty FROM products WHERE id = '$product_id'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    if ($row['qty'] > 0) {
        // Reduce ticket count by 1
        $new_qty = $row['qty'] - 1;
        $updateQuery = "UPDATE products SET qty = '$new_qty' WHERE id = '$product_id'";
        mysqli_query($conn, $updateQuery);

        echo $new_qty; // Send updated count to AJAX
    } else {
        echo "Sold Out"; // If tickets are 0
    }
}
?>
