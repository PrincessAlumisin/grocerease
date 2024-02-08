<?php
    session_start(); // Start the session

    // Check if the SESSION_EMAIL variable is not set (user is not logged in)
    if (!isset($_SESSION['SESSION_EMAIL'])) {
        header("Location: index.php"); // Redirect the user to the index.php page
        die(); // Terminate further script execution
    }

    include 'config.php'; // Include the config.php file which contains database connection details

    // Query the database to fetch user data based on the SESSION_EMAIL value
    $query = mysqli_query($conn, "SELECT * FROM users WHERE email='{$_SESSION['SESSION_EMAIL']}'");

    // Check if any rows are returned from the query
    if (mysqli_num_rows($query) > 0) {
        $row = mysqli_fetch_assoc($query); // Fetch the first row from the result set
        
    }
?>

<!DOCTYPE php>
<!-- Group 3 | Project -->
<php lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <title>GrocerEase</title>

    <!-- Main CSS -->
    <link rel="stylesheet" href="assets/css/grocerease.css" />
    
    <!-- Boxicons CDN Link -->
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet"/>
    
    <!-- Responsive Web Design -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- favicon -->
    <link rel="icon" href="assets/images/favicon.png" type="image/x-icon" />
    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon" />
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
          <a href="grocerease.php" class="active">
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
          <a href="help-support.php">
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
          <span class="dashboard">Dashboard</span>
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
      <div class="home-content">
        <!-- Overview -->
        <div class="overview-boxes">
          <!-- Total Products -->
          <div class="box">
              <div class="right-side">
                  <div class="box-topic">Product No.</div>
                  <?php
                  // Count the number of rows in the product list
                  $countQuery = "SELECT COUNT(*) AS totalProducts FROM manage_product";
                  $countResult = mysqli_query($conn, $countQuery);

                  if ($countResult && mysqli_num_rows($countResult) > 0) {
                      $countRow = mysqli_fetch_assoc($countResult);
                      $totalProducts = $countRow['totalProducts'];
                  } else {
                      $totalProducts = 0; // Default value
                  }
                  ?>
                  <div class="number"><?php echo $totalProducts; ?></div>
              </div>
              <i class="bx bx-cart-alt cart"></i>
          </div>

          <!-- Total Sales -->
          <div class="box">
            <div class="right-side">
              <div class="box-topic">Total Sales</div>
              <?php
              include 'config.php';

              // Query to calculate total sales from sold_items table
              $totalSalesQuery = "SELECT SUM(soldPrice) AS totalSales FROM sold_items";
              $totalSalesResult = mysqli_query($conn, $totalSalesQuery);

              if ($totalSalesResult && mysqli_num_rows($totalSalesResult) > 0) {
                $totalSalesRow = mysqli_fetch_assoc($totalSalesResult);
                $totalSales = $totalSalesRow['totalSales'];
              } else {
                $totalSales = 0; // Default value
              }
              ?>
              <div class="number">₱<?php echo number_format($totalSales, 2); ?></div>
            </div>
            <i class="bx bxs-cart-add cart two"></i>
          </div>

          <!-- Total Loss -->
          <div class="box">
        <div class="right-side">
            <div class="box-topic">Total Loss</div>
            <?php
            // Query to calculate total loss from drop_items
            $totalLossQuery = "SELECT SUM(prodPrice * prodQuan) AS totalLoss FROM drop_items";
            $totalLossResult = mysqli_query($conn, $totalLossQuery);

            if ($totalLossResult && mysqli_num_rows($totalLossResult) > 0) {
                $totalLossRow = mysqli_fetch_assoc($totalLossResult);
                $totalLoss = $totalLossRow['totalLoss'];
            } else {
                $totalLoss = 0; // Default value
            }
            ?>
            <div class="number">₱<?php echo number_format($totalLoss, 2); ?></div>
        </div>
        <i class="bx bxs-cart-download cart four"></i>
    </div>
        </div>

    <!-- Expiring Soon Overview -->
    <div class="sales-boxes">
        <div class="recent-sales box">
            <div class="title">Ongoing Sales!</div>
            <div class="sales-details">
                <ul class="details">
                    <li class="topic">Product Name</li>
                    <?php
                    // Query to fetch top 9 products nearing expiration date
                    $expiringSoonQuery = "SELECT prodName FROM manage_product WHERE expiDate >= CURDATE() ORDER BY expiDate ASC LIMIT 9";
                    $expiringSoonResult = mysqli_query($conn, $expiringSoonQuery);

                    while ($row = mysqli_fetch_assoc($expiringSoonResult)) {
                        echo "<li><a href='#'>{$row['prodName']}</a></li>";
                    }
                    ?>
                </ul>
                <ul class="details">
                    <li class="topic">Product Category</li>
                    <?php
                    // Rewind the result set to start from the beginning
                    mysqli_data_seek($expiringSoonResult, 0);

                    // Loop through the result set and display prodCate
                    while ($row = mysqli_fetch_assoc($expiringSoonResult)) {
                        // Fetch additional details for each product
                        $productDetailsQuery = "SELECT prodCate, prodPromo FROM manage_product WHERE prodName = '{$row['prodName']}'";
                        $productDetailsResult = mysqli_query($conn, $productDetailsQuery);
                        $details = mysqli_fetch_assoc($productDetailsResult);

                        echo "<li><a href='#'>{$details['prodCate']}</a></li>";
                    }
                    ?>
                </ul>
                <ul class="details">
                    <li class="topic">Promo</li>
                    <?php
                    // Rewind the result set to start from the beginning
                    mysqli_data_seek($expiringSoonResult, 0);

                    // Loop through the result set and display prodPromo with "% off"
                    while ($row = mysqli_fetch_assoc($expiringSoonResult)) {
                        // Fetch additional details for each product
                        $productDetailsQuery = "SELECT prodPromo FROM manage_product WHERE prodName = '{$row['prodName']}'";
                        $productDetailsResult = mysqli_query($conn, $productDetailsQuery);
                        $details = mysqli_fetch_assoc($productDetailsResult);

                        // Display promotion information with "% off"
                        echo "<li><a href='#'>";
                        echo empty($details['prodPromo']) ? "No Promo" : $details['prodPromo'] . "% off";
                        echo "</a></li>";
                    }
                    ?>
                </ul>
            </div>
            <!-- See All Button for Expiring Soon -->
            <div class="button">
                <a href="soon-to-expire.php">See All</a>
            </div>
        </div>

          <!-- Top Selling Products -->
          <div class="top-sales box">
              <div class="title">Top Selling Products</div>
              <div class="top-sales-details">
                  <ul class="details">
                      <li class="topic">Product Name</li>
                      <?php
                      // Query to fetch top 9 products with the highest soldPrice
                      $topProductsQuery = "SELECT prodName, prodCate, soldPrice FROM sold_items ORDER BY soldPrice DESC LIMIT 9";
                      $topProductsResult = mysqli_query($conn, $topProductsQuery);

                      // Loop through the result set and display prodName
                      while ($row = mysqli_fetch_assoc($topProductsResult)) {
                          echo "<li><a href='#'>{$row['prodName']}</a></li>";
                      }
                      ?>
                  </ul>
                  <ul class="details">
                      <li class="topic">Product Category</li>
                      <?php
                      // Rewind the result set to start from the beginning
                      mysqli_data_seek($topProductsResult, 0);

                      // Loop through the result set and display prodCate
                      while ($row = mysqli_fetch_assoc($topProductsResult)) {
                          echo "<li><a href='#'>{$row['prodCate']}</a></li>";
                      }
                      ?>
                  </ul>
                  <ul class="details">
                      <li class="topic">Price</li>
                      <?php
                      // Rewind the result set to start from the beginning
                      mysqli_data_seek($topProductsResult, 0);

                      // Loop through the result set and display soldPrice
                      while ($row = mysqli_fetch_assoc($topProductsResult)) {
                          echo "<li><a href='#'>₱" . number_format($row['soldPrice'], 2) . "</a></li>";
                      }
                      ?>
                  </ul>
              </div>
          </div>
      </div>
    </section>

    <!-- JAVASCRIPT -->
    <script src="https://kit.fontawesome.com/81d73e8e4d.js" crossorigin="anonymous"></script>
    <script src="assets/js/grocerease.js"></script>
    <script src="assets/js/settings.js"></script>
  </body>
</php>