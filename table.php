<?php
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once "database.php"; // Include database connection and other setup

// Check if the search parameters are provided in the URL
if (isset($_GET["send-type"], $_GET["from-country"], $_GET["from-state"], $_GET["from-airport"], $_GET["send-date"], $_GET["to-country"], $_GET["to-state"], $_GET["to-airport"], $_GET["package-weight"])) {
    $sendType = $_GET["send-type"];
    $fromCountry = $_GET["from-country"];
    $fromState = $_GET["from-state"];
    $fromAirport = $_GET["from-airport"];
    $sendDate = $_GET["send-date"];
    $toCountry = $_GET["to-country"];
    $toState = $_GET["to-state"];
    $toAirport = $_GET["to-airport"];
    $packageWeight = $_GET["package-weight"];

    $stmt = $conn->prepare("SELECT * FROM travel WHERE type = ? AND fromcountry = ? AND fromState = ? AND fromairport = ? AND departuredate = ? AND tocountry = ? AND tostate = ? AND toairport = ? AND luggagecapacity = ?");
    $stmt->bind_param("ssssssssd", $sendType, $fromCountry, $fromState, $fromAirport, $sendDate, $toCountry, $toState, $toAirport, $packageWeight);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result === false) {
        die("Error executing query: " . $stmt->error);
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['selected_row'])) {
      $selectedTravelerID = $_POST['selected_row'];
      
      // Delete selected traveler's entry from the database
      $stmt = $conn->prepare("DELETE FROM travel WHERE id = ?");
      $stmt->bind_param("i", $selectedTravelerID);
      if ($stmt->execute()) {
          // Traveler's entry deleted successfully
          // Redirect to the checkout or payment page
          header("Location: payment.php");
          exit();
      } else {
          // Error occurred while deleting the entry
          echo "Error deleting traveler's entry.";
      }
  }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weight Swap</title>
    <link rel="stylesheet" href="index.css">
    <!-- Fontawesome Link for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <title>Travel Table</title>
    <style>
        /* Center the table on the page */
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            position: relative;
            background: url("Images/home-bg.jpg");
            background-position: center 65%;
            background-size: cover
        }

        table {
            border-collapse: collapse;
            width: 100%; /* Adjust the width as needed */
            background-color: white;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
            color: black; /* Set label color to black for contrast */
        }

        /* ... (your existing CSS rules) ... */

.circle-links {
  display: flex;
  justify-content: center;
  margin-top: 20px;
}

.circle {
  display: inline-block;
  text-transform: uppercase;
  font-size: 18px;
  padding: 10px 30px;
  border-radius: 5px;
  background: #fff;
  border: 2px solid #fff;
  transition: 0.4s ease;
  box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
  text-decoration: none;
  color: #000;
}

.circle:hover {
  color: #fff;
  background: rgba(255, 255, 255, 0.3);
}

.circle-selected {
            color: white; /* Green color */
            background: Green;
        }


    </style>
</head>
<body>
<header>
    <nav class="navbar">
      <h2 class="logo"><a href="#">Weight Swap</a></h2>
      <input type="checkbox" id="menu-toggler">
      <label for="menu-toggler" id="hamburger-btn">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white" width="24px" height="24px">
          <path d="M0 0h24v24H0z" fill="none" />
          <path d="M3 18h18v-2H3v2zm0-5h18V11H3v2zm0-7v2h18V6H3z" />
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
  
  <form action="" method="post">
        <?php
        if ($result->num_rows > 0) {
            echo '<table border="1">';
            echo '<thead>';
            echo '<tr>';
            echo '<th>ID</th>';
            echo '<th>Travel Type</th>';
            echo '<th>From Country</th>';
            echo '<th>From State</th>';
            echo '<th>From Airport(Name)</th>';
            echo '<th>Departure Date</th>';
            echo '<th>Country</th>';
            echo '<th>To State</th>';
            echo '<th>To Airport(Name)</th>';
            echo '<th>Luggage Capacity (in kgs)</th>';
            echo '<th>Select</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';

            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                // echo '<td><input type="radio" name="selected_row" value="' . $row['id'] . '"></td>';
                echo '<td>' . $row['id'] . '</td>';
                echo '<td>' . $row['type'] . '</td>';
                echo '<td>' . $row['fromcountry'] . '</td>';
                echo '<td>' . $row['fromState'] . '</td>';
                echo '<td>' . $row['fromairport'] . '</td>';
                echo '<td>' . $row['departuredate'] . '</td>';
                echo '<td>' . $row['tocountry'] . '</td>';
                echo '<td>' . $row['tostate'] . '</td>';
                echo '<td>' . $row['toairport'] . '</td>';
                echo '<td>' . $row['luggagecapacity'] . '</td>';
                echo '<td><input type="checkbox" name="selected_row[]" value="' . $row['id'] . '"></td>';
                echo '</tr>';
            }
            echo '</tbody>';
            echo '</table>';
        } else {
            echo "No data found.";
        }
        ?>
    <div class="circle-links">
        <button type="submit" class="circle" name="travel">Payment</button>
    </div>
    </form>
 <script>
    document.addEventListener("DOMContentLoaded", function () {
        const checkboxes = document.querySelectorAll('input[name="selected_row[]"]');
        const travelLink = document.querySelector('.circle');

        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function () {
                if (this.checked) {
                    travelLink.classList.add('circle-selected');
                } else {
                    travelLink.classList.remove('circle-selected');
                }
            });
        });
    });
</script>
</body>
</html>
