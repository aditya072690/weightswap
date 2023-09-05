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
          <li><a href="contact.php">Contact Us</a></li>
          <li><a href="logout.php">Logout</a></li>
        </ul>
      </nav>
    </header>

    <section class="contact" id="contact">
      <h2>Contact Us</h2>
      <p>Reach out to us for any inquiries or feedback.</p>
      <div class="row">
        <div class="col information">
          <div class="contact-details">
            <p><i class="fas fa-map-marker-alt"></i> 304-307, Golden Icon, Old Padra Road, Vadodara, Gujarat- 390007</p>
            <p><i class="fas fa-envelope"></i> help@weightswap.com</p>
            <p><i class="fas fa-phone"></i> 9925294726</p>
            <p><i class="fas fa-clock"></i> Monday to Saturday  9AM-6PM</p>
          </div>          
        </div>
        <div class="col form">
          <form>
            <input type="text" placeholder="Name*" required>
            <input type="email" placeholder="Email*" required>
            <textarea placeholder="Message*" required></textarea>
            <button id="submit" type="submit">Send Message</button>
          </form>
        </div>
      </div>
    </section>

    <footer>
      <div>
        <span class="link">
            <a href="index.php">Home</a>
            <a href="contact.php">Contact</a>
        </span>
      </div>
    </footer>

  </body>
</html>


