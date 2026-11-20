<?php 
include('functions/userfunctions.php');
include('includes/header.php');

if(isset($_GET['product']))
{
    $product_slug = $_GET['product'];
    $product_data = getSlugActive("products", $product_slug);
    $product = mysqli_fetch_array($product_data);

    if (!$product) {
        echo "<div class='alert alert-danger text-center'>Product Not Found</div>";
        exit();
    }

    // Fetch product details using product ID
    $product_query = "SELECT * FROM products WHERE id='" . $product['id'] . "' LIMIT 1";
    $product_query_run = mysqli_query($con, $product_query);
    $productData = mysqli_fetch_array($product_query_run);
    
    // Ensure $productData is valid
    $current_qty = $productData['qty'] ?? 0;
?>
    <div class="py-3 bg-primary">
        <div class="container">
            <h6 class="text-white">
                <a class="text-white" href="categories.php" style="text-decoration:none">Home / </a>
                <a class="text-white" href="categories.php" style="text-decoration:none">Collections / </a>
                <?= $product['name']; ?>
            </h6>
        </div>
    </div>

    <div class="bg-light py-4">
        <div class="container product_data mt-4">
            <div class="row">
                <div class="col-md-4">
                    <div class="shadow">
                        <img src="uploads/<?= $product['image']; ?>" alt="Product Image" class="w-100">
                    </div>
                </div>

                <div class="col-md-8">
                    <h3 class="fw-bold" style="color: #3B308A;">
                        <?= $product['name']; ?>
                        <span class="float-end text-danger"><?php if($product['trending']) { echo "Trending"; } ?></span>
                    </h3>
                    <hr>
                    <p><?= $product['small_description']; ?></p>

                    <div class="row mb-3">
                        <div class="col-md-3"><span class="fw-bold">Fees: </span></div>
                        <div class="col-md-9">
                            <h5><span class="text-success fw-bold"><?= $product['selling_price']; ?> Ks</span></h5>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-3"><span class="fw-bold">Time: </span></div>
                        <div class="col-md-9">
                            <p><?= date("h:i A", strtotime($product['event_start_time'])); ?> to <?= date("h:i A", strtotime($product['event_end_time'])); ?></p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-3"><span class="fw-bold">Date: </span></div>
                        <div class="col-md-9"><p><?= $product['event_date']; ?></p></div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-3"><span class="fw-bold">Location: </span></div>
                        <div class="col-md-9"><p><?= $product['event_location']; ?></p></div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-3"><span class="fw-bold">Ticket Left: </span></div>
                        <div class="col-md-9">
                            <p><?= $current_qty; ?></p>
                        </div>
                    </div>

                    <?php if ($current_qty > 0) { ?>
                        <div class="row mb-3">
                            <div class="col-md-3"><span class="fw-bold">Number of Tickets</span></div>
                            <div class="col-md-9">
                                <div class="input-group" style="width: 130px;">
                                    <button class="input-group-text decrement-btn">-</button>
                                    <input type="text" class="form-control text-center input-qty bg-white" value="1">
                                    <button class="input-group-text increment-btn">+</button>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-6">
                                <button class="btn btn-primary px-4 addToCartBtn" value="<?= $product['id']; ?>">
                                    <i class="fa fa-calendar-check me-2"></i>Book Now
                                </button>
                            </div>
                        </div>
                    <?php } else { ?>
                        <div class="alert alert-danger text-center fw-bold">Sorry, this event is fully booked!</div>
                    <?php } ?>

                    <hr>

                    <h6 class="fw-bold">Event Description:</h6>
                    <p><?= $product['description']; ?></p>

                </div>
            </div>
        </div>
    </div>
<?php
}
else {
    echo "<div class='alert alert-danger text-center'>Something went wrong</div>";
}

include('includes/footer.php');
?>

<script>
   document.addEventListener("DOMContentLoaded", function () {
    const decrementBtn = document.querySelector(".decrement-btn");
    const incrementBtn = document.querySelector(".increment-btn");
    const qtyInput = document.querySelector(".input-qty");
    const addToCartBtn = document.querySelector(".addToCartBtn");
    const maxTickets = <?= $current_qty; ?>; // Available tickets

    const errorMsg = document.createElement("div");
    errorMsg.classList.add("alert", "alert-danger", "text-center", "fw-bold");
    errorMsg.innerText = "You cannot book more tickets than available.";
    errorMsg.style.display = "none"; // Hide initially

    const container = document.querySelector(".container");
    container.appendChild(errorMsg);

    // Function to validate quantity and disable button if exceeded
    function validateQuantity() {
        let currentQty = parseInt(qtyInput.value);
        if (currentQty > maxTickets) {
            errorMsg.style.display = "block"; // Show error message
            addToCartBtn.disabled = true; // Disable the button
        } else {
            errorMsg.style.display = "none"; // Hide error message
            addToCartBtn.disabled = false; // Enable the button
        }
    }

    // Increment button functionality
    incrementBtn.addEventListener("click", function () {
        let currentQty = parseInt(qtyInput.value);
        if (currentQty < maxTickets) {
            qtyInput.value = currentQty + 1;
        }
        validateQuantity();
    });

    // Decrement button functionality
    decrementBtn.addEventListener("click", function () {
        let currentQty = parseInt(qtyInput.value);
        if (currentQty > 1) {
            qtyInput.value = currentQty - 1;
        }
        validateQuantity();
    });

    // Prevent booking if quantity is exceeded
    addToCartBtn.addEventListener("click", function (e) {
        let selectedQty = parseInt(qtyInput.value);

        if (selectedQty > maxTickets) {
            errorMsg.style.display = "block"; // Show error message
            e.preventDefault(); // Prevent booking
            return;
        }
        
        alert("Proceeding to book " + selectedQty + " tickets.");
        // Add your AJAX or form submission logic here
    });

    // Validate quantity on manual input
    qtyInput.addEventListener("input", function () {
        validateQuantity();
    });

    // Initialize validation in case of a wrong default input
    validateQuantity();
});

</script>