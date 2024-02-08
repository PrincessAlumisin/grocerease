<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css"
      rel="stylesheet"
    />
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/homepage.css" />
    <link rel="icon" href="assets/images/favicon.png" type="image/x-icon" />
    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon" />
    <title>GrocerEase</title>
  </head>
  <body>
    <header>
      <img
        class="home-logo"
        src="assets/images/logo1.png"
        alt="GrocerEase-logo"
      />
      <nav class="nav-bar">
        <ul class="home-nav-links">
          <li><a href="#">Home</a></li>
          <li><a href="about-us.php">About</a></li>
          <li><a href="contact-us.php">Contact</a></li>
        </ul>
      </nav>
      <a href="index.php"><button class="button-login">Log in</button></a>
      <button class="button-menu"><i class="bx bx-menu"></i></button>
    </header>
    <section class="home-section">
      <div class="home-container">
        <img src="assets/images/main.jpg" alt="main-image" />
        <div class="home-content">
          <h1>Welcome to <span>GrocerEase!</span></h1>
          <p>
            GrocerEase is a digital platform that offers business owners
            convenience and accessibility. It helps market businesses to provide
            a product data management system for their perishable goods.
          </p>
        </div>
      </div>
    </section>
    <section class="home-features">
      <div class="selection-container">
        <div class="selection-box">
          <img src="assets/images/img1.png" alt="product-image" />
          <h4>A inventory of products</h4>
          <button style="background-color: #2f5597;">Product List</button>
        </div>
        <div class="selection-box">
          <img src="assets/images/img2.png" alt="notification-image" />
          <h4>A message/updates about the status.</h4>
          <button style="background-color: #c55a11;">Notifications</button>
        </div>
        <div class="selection-box">
          <img src="assets/images/img3.png" alt="manage-image" />
          <h4>Managing the product lifetime.</h4>
          <button style="background-color: #00b050;">Manage Products</button>
        </div>
        <div class="selection-box">
          <img src="assets/images/img4.png" alt="user-image" />
          <h4>Customization of a user account.</h4>
          <button style="background-color: #7030a0;">User Setting</button>
        </div>
        <div class="selection-box">
          <img src="assets/images/img5.png" alt="soon-image" />
          <h4>Approaching expiration date.</h4>
          <button style="background-color: #050505;">Soon to Expire</button>
        </div>
        <div class="selection-box">
          <img src="assets/images/img6.png" alt="expired-image" />
          <h4>Out of date of a products.</h4>
          <button style="background-color: #f10909;">Expired Products</button>
        </div>
      </div>
    </section>
    <section>
      <div class="social-icons">
        <ul>
            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
        </ul>
      </div>
    </section>
    <script src="/assets/js/homepage.js"></script>
  </body>
</html>
