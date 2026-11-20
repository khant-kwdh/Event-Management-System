<?php
include('includes/header.php'); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<div class="d-flex justify-content-center mt-5">
    <div class="card shadow-lg" style="width: 18rem; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);">
        <div class="card-body">
            <h5 class="card-title fw-bold mb-3">Select Payment Method</h5>
            
            <form id="paymentForm" method="POST" action="payment.php">
                <label>
                    <input type="radio" name="payment_method" value="KBZPay" required> KBZPay
                </label><br>

                <label>
                    <input type="radio" name="payment_method" value="WavePay"> WavePay
                </label><br>

                <label>
                    <input type="radio" name="payment_method" value="AYAPay"> AYA Pay
                </label><br>

                <div style="text-align: center;">
                    <button type="submit" class="btn" style="background-color: blue; color: white;">Proceed To Payment</button>
                </div>
            </form>
            
        </div>
    </div>
</div>

<script>
    document.getElementById('paymentForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent default form submission

        let selectedPayment = document.querySelector('input[name="payment_method"]:checked');
        if (selectedPayment) {
            let paymentMethod = selectedPayment.value;
            let actionUrl = '';

            // Set form action based on selected payment method
            if (paymentMethod === 'KBZPay') {
                actionUrl = 'kbzpay.php';
            } else if (paymentMethod === 'WavePay') {
                actionUrl = 'wavepay.php';
            } else if (paymentMethod === 'AYAPay') {
                actionUrl = 'ayapay.php';
            }

            // Change form action and submit
            this.action = actionUrl;
            this.submit();
        }
    });
</script>


</body>
</html>