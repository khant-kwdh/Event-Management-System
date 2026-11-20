<?php
session_start();
include('../config/dbcon.php'); 

if (isset($_SESSION['auth'])) {
    if (isset($_POST['scope'])) {
        // Check if user_id exists in session
        if (isset($_SESSION['auth_user']['user_id'])) {
            $user_id = $_SESSION['auth_user']['user_id'];
        } else {
            echo "User ID is not set in session!";
            exit;
        }

        $scope = $_POST['scope'];
        switch ($scope) {
            case "add":
                $prod_id = $_POST['prod_id'];
                $prod_qty = $_POST['prod_qty'];

                // Check if the product already exists in the cart
                $chk_existing_cart = $con->prepare("SELECT * FROM carts WHERE prod_id = ? AND user_id = ?");
                $chk_existing_cart->bind_param('ii', $prod_id, $user_id);
                $chk_existing_cart->execute();
                $chk_existing_cart_run = $chk_existing_cart->get_result();

                if ($chk_existing_cart_run->num_rows > 0) {
                    echo "existing";
                } else {
                    // Insert product into the cart
                    $insert_query = $con->prepare("INSERT INTO carts (user_id, prod_id, prod_qty) VALUES (?, ?, ?)");
                    $insert_query->bind_param('iii', $user_id, $prod_id, $prod_qty);
                    if ($insert_query->execute()) {
                        echo 201;
                    } else {
                        echo 500;
                    }
                }
                break;

            case "update":
                $prod_id = $_POST['prod_id'];
                $prod_qty = $_POST['prod_qty'];

                // Update product quantity in cart
                $update_query = $con->prepare("UPDATE carts SET prod_qty = ? WHERE prod_id = ? AND user_id = ?");
                $update_query->bind_param('iii', $prod_qty, $prod_id, $user_id);
                if ($update_query->execute()) {
                    echo 200;
                } else {
                    echo 500;
                }
                break;

            case "delete":
                $cart_id = $_POST['cart_id']; // Cart ID is passed to identify which product to delete

                // Check if the cart ID exists for this user
                $chk_existing_cart = $con->prepare("SELECT * FROM carts WHERE id = ? AND user_id = ?");
                $chk_existing_cart->bind_param('ii', $cart_id, $user_id);
                $chk_existing_cart->execute();
                $chk_existing_cart_run = $chk_existing_cart->get_result();

                if ($chk_existing_cart_run->num_rows > 0) {
                    // Delete the cart item
                    $delete_query = $con->prepare("DELETE FROM carts WHERE id = ? AND user_id = ?");
                    $delete_query->bind_param('ii', $cart_id, $user_id);
                    if ($delete_query->execute()) {
                        echo 200; // Successfully deleted
                    } else {
                        echo 500; // Error in deletion
                    }
                } else {
                    echo "Cart item not found or user does not own this cart item";
                }
                break;

            default:
                echo 500; // Invalid scope or unrecognized case
        }
    }
} else {
    echo 401; // User is not logged in
}
?>
