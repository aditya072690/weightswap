<?php
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Include database configuration
require_once "database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    
    // Retrieve form data
    $fullName = $_POST["full_name"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $city = $_POST["city"];
    $state = $_POST["state"];
    $zipCode = $_POST["zip_code"];
    $cardName = $_POST["card_name"];
    $cardNumber = $_POST["card_number"];
    $expMonth = $_POST["exp_month"];
    $expYear = $_POST["exp_year"];
    $cvv = $_POST["cvv"];

    // Prepare SQL statement
    $sql = "INSERT INTO payment (full_name, email, address, city, state, zip_code, card_name, card_number, exp_month, exp_year, cvv)
            VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssssss",  $fullName, $email, $address, $city, $state, $zipCode, $cardName, $cardNumber, $expMonth, $expYear, $cvv);

    if ($stmt->execute()) {
        echo "Payment successfully!";
        header("Location: index.php"); // Redirect to index.php after successful submission
        exit(); // Make sure to exit to prevent further execution
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- custom css file link  -->
    <link rel="stylesheet" href="payment.css">
    
    <style>
        /* Add a CSS class for the green style */
        .proceed-green {
            background-color: green;
            color: white;
        }
    </style>


</head>
<body>
    <div class="container">
        <form action="" method="post"  onsubmit="if(document.getElementById('agree').checked) { return true; } else { alert('Please indicate that you have read and agree to the Terms and Conditions and Privacy Policy'); return false; }">
            <div class="row">
                <div class="col">
                    <h3 class="title">billing address</h3>
                    <div class="inputBox">
                        <span>full name :</span>
                        <input type="text" name="full_name" placeholder="john deo">
                    </div>
                    <div class="inputBox">
                        <span>email :</span>
                        <input type="email" name="email" placeholder="example@example.com">
                    </div>
                    <div class="inputBox">
                        <span>address :</span>
                        <input type="text" name="address" placeholder="room - street - locality">
                    </div>
                    <div class="inputBox">
                        <span>city :</span>
                        <input type="text" name="city" placeholder="mumbai">
                    </div>
                    <div class="flex">
                        <div class="inputBox">
                            <span>state :</span>
                            <input type="text" name="state" placeholder="india">
                        </div>
                        <div class="inputBox">
                            <span>zip code :</span>
                            <input type="text" name="zip_code" placeholder="123 456">
                        </div>
                    </div>
                </div>
             
                <div class="col">
                    <h3 class="title">payment</h3>
                    <div class="inputBox">
                        <span>cards accepted :</span>
                        <img src="Images/card_img.png" alt="">
                    </div>
                    <div class="inputBox">
                        <span>name on card :</span>
                        <input type="text" name="card_name" placeholder="mr. john deo">
                    </div>
                    <div class="inputBox">
                        <span>credit card number :</span>
                        <input type="number" name="card_number" placeholder="1111-2222-3333-4444">
                    </div>
                    <div class="inputBox">
                        <span>exp month :</span>
                        <input type="text" name="exp_month" placeholder="january">
                    </div>

                    <div class="flex">
                        <div class="inputBox">
                            <span>exp year :</span>
                            <input type="number" name="exp_year" placeholder="2022">
                        </div>
                        <div class="inputBox">
                            <span>CVV :</span>
                            <input type="text" name="cvv" placeholder="1234">
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="inputBox">
                        <span>amount :</span>
                        <input type="text" value="1500" readonly>
                    </div>
                    <div class="inputBox">
                        <a href="weightswap.pdf" download="weightswap_t&c.pdf">Terms and conditions</a>
                        <span>50% to be paid for advance booking. </span>
                        <span> Then you shall receive the auto payment mandate for rest 50% and 
                        the amount shall be deducted on the day of transport of weight.</span>
                    </div>
                </div>
            </div>
            <input type="checkbox" required name="checkbox" value="check" id="agree"  /> I have read and agree to the Terms and Conditions and Privacy Policy
            <input type="submit" value="proceed to checkout" class="submit-btn" id="proceedBtn">
        </form>
    </div>
    <script>
        // JavaScript code to update the button style based on the checkbox
        const checkbox = document.getElementById('agree');
        const proceedButton = document.getElementById('proceedBtn');

        checkbox.addEventListener('change', function() {
            if (checkbox.checked) {
                proceedButton.style.backgroundColor = 'green';
                proceedButton.style.color = 'white';
            } else {
                proceedButton.style.backgroundColor = ''; // Reset to default
                proceedButton.style.color = ''; // Reset to default
            }
        });
    </script>
</body>
</html>
