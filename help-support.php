<?php
    session_start();
    if (!isset($_SESSION['SESSION_EMAIL'])) {
        header("Location: index.php");
        die();
    }

    include 'config.php';

    $query = mysqli_query($conn, "SELECT * FROM users WHERE email='{$_SESSION['SESSION_EMAIL']}'");

    if (mysqli_num_rows($query) > 0) {
        $row = mysqli_fetch_assoc($query);

        
    }
?>

<!DOCTYPE php>
<!-- Group 3 | Project -->
<php lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <title>GrocerEase</title>

    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/grocerease.css" />

    <!-- User-setting CSS -->
    <link rel="stylesheet" href="assets/css/user-setting.css" />

    <!-- Help-support CSS -->
    <link rel="stylesheet" href="assets/css/help-support.css" />

    <!-- Boxicons CDN Link -->
    <link
      href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css"
      rel="stylesheet"
    />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- favicon -->
    <link rel="icon" href="assets/images/favicon.png" type="image/x-icon" />
    <link
      rel="shortcut icon"
      href="assets/images/favicon.png"
      type="image/x-icon"
    />
  </head>

  <body>
    <!-- Sidebar -->
    <div class="sidebar">
      <div class="logo-details">
        <img src="assets/images/favicon.png" alt="Logo" />
        <span class="logo_name">GrocerEase</span>
      </div>

      <ul class="nav-links">
        <!-- Dashboard -->
        <li>
          <a href="grocerease.php">
            <i class="bx bx-grid-alt"></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>

        <!-- Users -->
        <li>
          <a href="user-setting.php">
            <i class="bx bx-user"></i>
            <span class="links_name">Users</span>
          </a>
        </li>

        <!-- Product List -->
        <li>
          <a href="product-list.php">
            <i class="bx bx-list-ul"></i>
            <span class="links_name">Product List</span>
          </a>
        </li>

        <!-- Manage Product -->
        <li>
          <a href="manage.php">
            <i class="bx bx-receipt"></i>
            <span class="links_name">Manage Product</span>
          </a>
        </li>

        <!-- Soon to Expire -->
        <li>
          <a href="soon-to-expire.php">
            <i class="bx bx-purchase-tag"></i>
            <span class="links_name">Soon to Expire</span>
          </a>
        </li>

        <!-- Expired Product -->
        <li>
          <a href="expired-product.php">
            <i class="bx bxs-purchase-tag"></i>
            <span class="links_name">Expired Product</span>
          </a>
        </li>

        <!-- Help and Support -->
        <li>
          <a href="help-support.php" class="active">
            <i class="bx bx-phone"></i>
            <span class="links_name">Help and Support</span>
          </a>
        </li>

        <!-- Setting -->
        <li>
          <a href="settings.php">
            <i class="bx bx-cog"></i>
            <span class="links_name">Settings</span>
          </a>
        </li>

        <!-- Log out -->
        <li class="log_out">
          <a href="#">
            <i class="bx bx-log-out"></i>
            <span class="links_name">Log out</span>
          </a>
        </li>
      </ul>
    </div>

    <!-- Logout Confirmation Popup -->
    <div id="logout-popup" class="popup">
      <div class="popup-content">
        <h3>Logout Confirmation</h3>
        <p>Are you sure you want to logout?</p>
        <div class="popup-buttons">
          <a href='logout.php'>Yes</a>
          <button id="cancel-logout">No</button>
        </div>
      </div>
    </div>

    <!-- Home Section -->
    <section class="home-section">
      <nav>
        <div class="sidebar-button">
          <i class="bx bx-menu sidebarBtn"></i>
          <span class="dashboard">Help & Support</span>
        </div>



        <!-- Notifications -->
        <div class="three-box">
            <div class="notifications">
                <div class="notification-icon">
                    <i class="bx bx-bell"></i>
                    <span class="notification-count">3</span>
                    <div class="notification-dropdown">
                      <ul class="notification-list">
                      <?php
                      // Fetch top 3 latest notifications from the database
                      $topNotificationsQuery = "SELECT * FROM notifications ORDER BY date DESC LIMIT 3";
                      $topNotificationsResult = mysqli_query($conn, $topNotificationsQuery);

                      while ($notificationRow = mysqli_fetch_assoc($topNotificationsResult)) {
                          echo "<li>";
                          echo "<span class='notification-title'>{$notificationRow['type']}</span>";
                          echo "<span class='notification-time'>" . date("d/m/Y", strtotime($notificationRow['date'])) . "</span>";
                          echo "</li>";
                      }
                      ?>
                      </ul>
                      <a href="notification.php">
                          <button class="check-notifications">Check all Notifications</button>
                      </a>
                    </div>
                </div>
            </div>

          <!-- Dark/Light Mode Toggle -->
          <div id="dark-mode-icon" title="Toggle Dark/Light Mode">
            <i class="fa-solid fa-moon"></i>
          </div>

          <!-- User-Profile -->
          <div class="profile-details">
            <img id="user-profile-icon" src="assets/images/default-icon.png" alt="User Profile Icon">
            <div class="names">
              <span id="user-name" class="user_name"><?php echo $row['name']; ?></span>
              <span class="admin_name">Admin</span>
            </div>
          </div>
        </div>
      </nav>

      <!-- Home Content -->
      <div class="adjuster-container">
        <div class="container-1">
          <div class="form">
            <div class="help-support">
              <h3 class="title">Need Help and Support?</h3>
              <img src="assets/images/h-s-logo.png" class="image" />

              <div class="support-links">
                <p>For further information</p>
                <div class="support-icons">
                  <a href="#">
                    <i class="fas fa-question-circle"></i>
                  </a>
                  <a href="#">
                    <i class="fab fa-linkedin-in"></i>
                  </a>
                  <a href="#">
                    <i class="fas fa-copy"></i>
                  </a>
                </div>
              </div>
            </div>

            <div class="contact-form-1">
              <span class="circle one"></span>
              <span class="circle two"></span>
              <form action="index.php" autocomplete="off">
                <h3 class="title">Contact us</h3>
                <div class="input-container-1">
                  <input
                    type="text"
                    name="name"
                    class="input"
                    placeholder="Name"
                  />
                  <span>Name</span>
                </div>
                <div class="input-container-1">
                  <input
                    type="email"
                    name="email"
                    class="input"
                    placeholder="Email"
                  />
                  <span>Email</span>
                </div>
                <div class="input-container-1">
                  <input
                    type="tel"
                    name="phone"
                    class="input"
                    placeholder="Phone Number"
                  />
                  <span>Phone</span>
                </div>
                <div class="input-container-1 textarea">
                  <textarea
                    name="message"
                    class="input"
                    placeholder="Message"
                  ></textarea>
                  <span>Message</span>
                </div>
                <input type="submit" value="Submit" class="btn" />
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>


    <!-- JAVASCRIPT -->
    <script src="https://kit.fontawesome.com/81d73e8e4d.js" crossorigin="anonymous"></script>
    <script src="assets/js/grocerease.js"></script>
    <script src="https://kit.fontawesome.com/f12c21ab53.js" crossorigin="anonymous"></script>
    <script src="assets/js/settings.js"></script>
  </body>
</php>