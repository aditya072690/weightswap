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
  <section class="send" id="send">
    
    <form id="sender-form-data" method="get" action="table.php">
    <h2>I want to Send</h2>
      <label for="send-type">Send Type:</label>
      <select class="type" name="send-type" id="send-type" required>
        <option value="domestic">Domestic</option>
        <option value="international">International</option>
      </select>

      <label for="from-country">From Country:</label>
      <select class="fromcountry" name="from-country" id="from-country" required>
        <option value="India">India</option>
        <option value="UAE">UAE</option>
      </select>

      <label for="from-state">From State:</label>
      <input class="fromstate" name="from-state" type="text" id="from-state" required>

      <label for="from-airport">From Airport(Name):</label>
      <input class="fromairport" name="from-airport" type="text" id="from-airport" required>

      <label for="send-date">Send Date:</label>
      <input class="senddate" name="send-date" type="date" id="send-date" required>

      <label for="to-country">To Country:</label>
      <select class="tocountry" name="to-country" id="to-country" required>
        <option value="India">India</option>
        <option value="UAE">UAE</option>
      </select>

      <label for="to-state">To State:</label>
      <input class="tostate" name="to-state" type="text" id="to-state" required>

      <label for="to-airport">To Airport(Name):</label>
      <input class="toairport" name="to-airport" type="text" id="to-airport" required>

      <!-- <label for="receive-date">Receive Date:</label>
      <input class="receivedate" name="receive-date" type="date" id="receive-date" required> -->
      <label for="package-weight">Package Weight (in kgs):</label>
      <input class="packageweight" name="package-weight" type="number" id="package-weight" min="1" max="25" required>

      
      <button class="search"  name="search"  type="submit">Search</button>
    </form>
  </section>
</body>
</html>

