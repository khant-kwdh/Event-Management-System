$(document).ready(function () {
    // Increment button click
    $('.increment-btn').click(function (e) {
        e.preventDefault();

        var qtyInput = $(this).closest('.product_data').find('.input-qty');
        var value = parseInt(qtyInput.val(), 10);

        value = isNaN(value) ? 0 : value;
        if (value < 10) {
            value++;
            qtyInput.val(value);
        }
    });

    // Decrement button click
    $('.decrement-btn').click(function (e) {
        e.preventDefault();

        var qtyInput = $(this).closest('.product_data').find('.input-qty');
        var value = parseInt(qtyInput.val(), 10);

        value = isNaN(value) ? 0 : value;
        if (value > 1) {  // Prevents value from going below 1
            value--;
            qtyInput.val(value);
        }
    });

    // Add to Cart Button Click
    $('.addToCartBtn').click(function (e) {
        e.preventDefault();

        var qty = $(this).closest('.product_data').find('.input-qty').val(); // Get value
        var prod_id = $(this).val();

        $.ajax({
            method: "POST",
            url: "functions/handlecart.php",
            data: {
                "prod_id": prod_id,
                "prod_qty": qty, 
                "scope": "add"
            },
            success: function (response) {
                if (response == 201) {
                    alertify.success("Product added to cart");
                } else if (response == "existing") {
                    alertify.success("Product already in cart");
                } else if (response == 401) {
                    alertify.success("Login to continue");
                } else if (response == 500) {
                    alertify.success("Something went wrong");
                }
            }
        });
    });

    // Update Quantity
    $(document).on('click', '.updateQty', function () {
        var qty = $(this).closest('.product_data').find('.input-qty').val(); // Get value
        var prod_id = $(this).closest('.product_data').find('.prodID').val();

        $.ajax({
            method: "POST",
            url: "functions/handlecart.php",
            data: {
                "prod_id": prod_id,
                "prod_qty": qty, 
                "scope": "update"
            },
            success: function (response) {
                // Handle update success response
            }
        });
    });

    // Delete Item
    $(document).on('click', '.deleteItem', function () {
        var cart_id = $(this).val(); // Get the cart_id of the item to delete

        $.ajax({
            method: "POST",
            url: "functions/handlecart.php",
            data: {
                "cart_id": cart_id,  // Send cart_id to delete the item
                "scope": "delete"
            },
            success: function (response) {
                if (response == 200) {
                    alertify.success("Item deleted successfully");
                    // Optionally, you can remove the item from the DOM
                    $('#' + cart_id).remove();  // Remove the item from the cart if necessary
                } else {
                    alertify.error("Something went wrong. Please try again.");
                }
            }
        });
    });
});
