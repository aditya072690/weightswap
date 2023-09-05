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
          <h1>Mission and Vision</h1>
          <p>
          The mission of the "Weight Swap" idea is to provide a platform that facilitates a mutually beneficial exchange between travelers and individuals looking to send items. By connecting these two groups, the platform aims to reduce shipping costs for senders and allow travelers to earn money by utilizing their unused luggage capacity.<br>

The vision of "Weight Swap" is to create a global network where people can easily access affordable shipping options and travelers can make the most of their travel plans by monetizing their extra luggage space. This platform envisions a convenient and efficient way to transport items while promoting resource optimization and cost savings for both parties involved.</p>
        </div>
    
      </div>
    </section>
  </body>
</html>
