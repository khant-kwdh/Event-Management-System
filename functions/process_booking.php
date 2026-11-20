<?php
include_once(__DIR__ . '/../config/dbcon.php');

// Decode the incoming JSON data
$data = json_decode(file_get_contents("php://input"), true);

// Log the received data for debugging
error_log(print_r($data, true));  // Check the PHP error log to see what data is received

// Validate that the required fields are present
$product_id = isset($data['product_id']) ? $data['product_id'] : null;
$requested_qty = isset($data['qty']) ? $data['qty'] : 0;

// If product_id or requested_qty is missing or invalid, return an error
if (!$product_id || $requested_qty <= 0) {
    echo json_encode(["status" => "error", "message" => "Invalid input data."]);
    exit();
}

// Query to fetch available tickets
$product_query = "SELECT qty FROM products WHERE id='$product_id' LIMIT 1";
$result = mysqli_query($con, $product_query);

// Check if the query was successful
if (!$result) {
    echo json_encode(["status" => "error", "message" => "Database query failed."]);
    exit();
}

// Fetch the row containing the available quantity
$row = mysqli_fetch_assoc($result);

// Check if the product exists
if (!$row) {
    echo json_encode(["status" => "error", "message" => "Product not found."]);
    exit();
}

// Get the available quantity
$available_qty = $row['qty'];

// Check if the requested quantity exceeds the available quantity
if ($requested_qty > $available_qty) {
    echo json_encode(["status" => "error", "message" => "Not enough tickets left! Only $available_qty tickets available."]);
    exit();
}

// Proceed with booking logic...
echo json_encode(["status" => "success", "message" => "Booking successful!"]);
?>
