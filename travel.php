<?php
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once "database.php"; // Make sure this file contains the database connection code

// Handle user registration
if (isset($_POST["submit"])) {
    $Name = $_POST["name"];
    $email = $_POST["email"];
    $number = $_POST["number"];
    $traveltype = $_POST["traveltype"];
    $fromcountry = $_POST["fromcountry"];
    $fromstate = $_POST["fromstate"];
    $fromairport = $_POST["fromairport"];
    $departuredate = $_POST["departuredate"];
    $tocountry = $_POST["tocountry"];
    $tostate = $_POST["tostate"];
    $toairport = $_POST["toairport"];
    $returndate = $_POST["returndate"];
    $luggagecapacity = $_POST["luggagecapacity"];
   
    $sql = "INSERT INTO travel (name, email, number, type, fromcountry, fromstate, fromairport, departuredate, tocountry, tostate, toairport, returndate, luggagecapacity) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);

    if (mysqli_stmt_prepare($stmt, $sql)) {
        mysqli_stmt_bind_param($stmt, "sssssssssssss", $Name, $email, $number, $traveltype, $fromcountry, $fromstate, $fromairport, $departuredate, $tocountry, $tostate, $toairport, $returndate, $luggagecapacity);
        if (mysqli_stmt_execute($stmt)) {
            echo "<div class='alert alert-success'>You are registered successfully.</div>";
        } else {
            echo "<div class='alert alert-danger'>Error: Could not execute the query.</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>Error: Could not prepare the statement.</div>";
    }

    mysqli_stmt_close($stmt);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weight Swap</title>
    <link rel="stylesheet" href="index.css">
    <!-- Fontawesome Link for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
</head>
<body>
<header>
    <nav class="navbar">
        <h2 class="logo"><a href="#">Weight Swap</a></h2>
        <input type="checkbox" id="menu-toggler">
        <label for="menu-toggler" id="hamburger-btn">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white" width="24px" height="24px">
                <path d="M0 0h24v24H0z" fill="none"/>
                <path d="M3 18h18v-2H3v2zm0-5h18V11H3v2zm0-7v2h18V6H3z"/>
            </svg>
        </label>
        <ul class="all-links">
            <li><a href="index.php">Home</a></li>
            <li><a href="travel.php">Travel</a></li>
            <li><a href="send.php">Send</a></li>
            <li><a href="mission&vision.php">mission and vision</a></li>
            <li><a href="contact.php">Contact Us</a></li>
            <?php if($_SESSION['user']) { ?>
        <li><a href="logout.php">Logout</a></li>
    <?php } else { ?>
        <li><a href="login.php">Login/Registration</a></li>
    <?php } ?>
            <!-- <li><a href="logout.php">Logout</a></li> -->
        </ul>
    </nav>
</header>

<section class="traveler" id="traveler-form">

    <form action="" id="traveler-form-data" method="post">
        <h2>I am Traveling</h2>
        <label for="name">Name:</label>
        <input type="text" class="name" name="name" required>

        <label for="email">Email:</label>
        <input type="text" class="email" name="email" required>

        <label for="number">Phone-Number:</label>
        <input type="text" class="number" name="number" required>

        <label for="travel-type">Travel Type:</label>
        <select class="traveltype" id="travel-type" name="traveltype" required>
            <option value="domestic">Domestic</option>
            <option value="international">International</option>
        </select>

        <label for="from-country">From Country:</label>
        <select class="fromcountry" name="fromcountry" id="from-country" required>
        <option value="India">India</option>
        <option value="UAE">UAE</option>
      </select>
     

        <label for="from-state">From State:</label>
        <input class="fromstate" type="text" id="from-state" name="fromstate" required>

        <label for="from-airport">From Airport(Name):</label>
        <input class="fromairport" type="text" id="from-airport" name="fromairport" required>

        <label for="departure-date">Departure Date:</label>
        <input class="departuredate" type="date" id="departure-date" name="departuredate" required>

        <label for="to-country">To Country:</label>
        <select class="tocountry" name="tocountry" id="to-country" required>
        <option value="India">India</option>
        <option value="UAE">UAE</option>
      </select>

        <label for="to-state">To State:</label>
        <input class="tostate" type="text" id="to-state" name="tostate" required>

        <label for="to-airport">To Airport(Name):</label>
        <input class="toairport" type="text" id="to-airport" name="toairport" required>

        <label for="return-date">Return Date:</label>
        <input class="returndate" type="date" id="return-date" name="returndate" >

        <label for="luggage-capacity">Luggage Capacity (in kgs):</label>
        <input class="luggagecapacity" type="number" id="luggage-capacity" name="luggagecapacity" min="1" max="25" required>
        <p>
        Note:
        </p>

        <p>
          You will get ₹300 per weight you carry.
        </p>

        <button class="submit" type="submit" name="submit">Submit</button>
    </form>
</section>
</body>
</html>
