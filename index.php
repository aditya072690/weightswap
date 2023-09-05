<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weight Swap</title>
    <link rel="stylesheet" href="index.css">
    <!-- Fontawesome Link for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <script>
    // Redirect to login page after 5 seconds if user is not logged in
    setTimeout(function() {
      <?php if (!isset($_SESSION['user'])) { ?>
        window.location.href = "login.php";
      <?php } ?>
    }, 10000); // 5 seconds
  </script>
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
          <!-- <li><a href="logout.php">Logout</a></li> -->
          <?php if($_SESSION['user']) { ?>
        <li><a href="logout.php">Logout</a></li>
    <?php } else { ?>
        <li><a href="login.php">Login/Registration</a></li>
    <?php } ?>
        </ul>
      </nav>
    </header>

    <section class="homepage" id="home">
      <div class="content">
        <div class="text">
          <h1>Join us in redefining travel, many pounds at a time!</h1>
          <p>
          Welcome to WeightSwap, the revolutionary e-business platform that connects weight enthusiasts worldwide, 
          enabling you to trade excess baggage for an exciting journey. <br> Gear up and make lasting memories.</p>
          <p>
          The concept behind "WeightSwap" is to connect travelers who have unused luggage weight capacity with individuals 
          who want to send items but don't want to pay for excess baggage fees or want to send on urgent basis.
          </p>
        </div>
        <div class="circle-links">
        <a href="travel.php" class="circle" name="travel">I Am Traveling</a>
        <a href="send.php"  class="circle" name="send">I Want To Send</a>
        </div>
      </div>
    </section>
  </body>
</html>
