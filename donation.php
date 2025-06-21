<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Donate to Alumni Association to Support Our Mission">
    <title>Donation - Alumni Association</title>
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f8f8;
            margin: 0;
            padding: 0;
            color: #333;
        }

        .container {
            width: 60%;
            margin: 50px auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #0044cc;
            font-size: 2rem;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            font-size: 1rem;
            display: block;
            margin-bottom: 5px;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 10px;
            font-size: 1rem;
            border-radius: 5px;
            border: 1px solid #ddd;
        }

        .form-group input:focus {
            outline: none;
            border-color: #0044cc;
        }

        .submit-btn {
            background-color: #0044cc;
            color: white;
            padding: 15px 30px;
            font-size: 1.1rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }

        .submit-btn:hover {
            background-color: #0033aa;
        }

        /* QR Code Section */
        #upi-qr-code {
            text-align: center;
            display: none; /* Hidden by default */
        }

        #upi-qr-code img {
            width: 150px;
            height: 150px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Make a Donation</h2>
        <p style="text-align: center; font-size: 1.1rem;">Support our Alumni Association with your donation. Every contribution helps!</p>

        <form id="donation-form">
            <!-- Name Field -->
            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" id="name" name="name" required>
            </div>

            <!-- Email Field -->
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" required>
            </div>

            <!-- Donation Amount Field -->
            <div class="form-group">
                <label for="amount">Donation Amount (₹)</label>
                <input type="number" id="amount" name="amount" min="1" required>
            </div>

            <!-- Payment Method Selection -->
            <div class="form-group">
                <label for="payment-method">Choose Payment Method</label>
                <select id="payment-method" name="payment-method" required>
                    <option value="upi">UPI</option>
                    <option value="paytm">Paytm</option>
                    <option value="google-pay">Google Pay</option>
                    <option value="bank-transfer">Bank Transfer</option>
                </select>
            </div>

            <button type="submit" class="submit-btn">Donate Now</button>
        </form>

        <!-- Success Message -->
        <div id="success-message" style="display: none; text-align: center; color: green; margin-top: 20px;">
            <h3>Thank you for your donation!</h3>
            <p>Your donation has been received successfully.</p>
        </div>

        <!-- UPI QR Code Section -->
        <div id="upi-qr-code">
            <h3>Scan this QR Code to Pay via UPI</h3>
            <!-- Replace with your UPI ID's QR code link -->
            <img src="randomqr-256.png" alt="UPI QR Code">

                    </div>
    </div>

    <script>
        // Handle form submission
        document.getElementById('donation-form').addEventListener('submit', function (e) {
            e.preventDefault();
            const name = document.getElementById('name').value;
            const email = document.getElementById('email').value;
            const amount = document.getElementById('amount').value;
            const paymentMethod = document.getElementById('payment-method').value;

            // Show UPI QR Code if UPI is selected
            if (paymentMethod === "upi") {
                document.getElementById('upi-qr-code').style.display = 'block'; // Show the QR code section
                alert(`Please scan the UPI QR code to donate ₹${amount}.`);
            } else if (paymentMethod === "paytm") {
                alert(`Please pay ₹${amount} via Paytm to the following link: paytm.me/yourlink`);
            } else if (paymentMethod === "google-pay") {
                alert(`Please pay ₹${amount} via Google Pay to UPI ID: yourname@upi`);
            } else if (paymentMethod === "bank-transfer") {
                alert(`Please transfer ₹${amount} to our bank account and notify us once done.`);
            }

            // Show success message after payment
            document.getElementById('success-message').style.display = 'block';
        });
    </script>
</body>

</html>
