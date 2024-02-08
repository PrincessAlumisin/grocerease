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

    $prodID = $_GET['id'];

    if (isset($_POST['submit'])) {
      $prodName = mysqli_real_escape_string($conn, $_POST['prodName']);
      $prodCate = mysqli_real_escape_string($conn, $_POST['prodCate']);
      $prodQuan = mysqli_real_escape_string($conn, $_POST['prodQuan'] . $_POST['quantity-unit']);
      $prodPrice = mysqli_real_escape_string($conn, $_POST['prodPrice']);
      $manufact = mysqli_real_escape_string($conn, $_POST['manufact']);
      $manuDate = mysqli_real_escape_string($conn, $_POST['manuDate']);
      $expiDate = mysqli_real_escape_string($conn, $_POST['expiDate']);
      
      $sql = "UPDATE `manage_product` SET `prodName`='$prodName',`prodCate`='$prodCate',`prodPrice`='$prodPrice',`prodQuan`='$prodQuan',`manufact`='$manufact',`manuDate`='$manuDate',`expiDate`='$expiDate' WHERE prodID=$prodID";
      
      $result = mysqli_query($conn, $sql);

      if ($result) {
        echo "<script>
                alert('Data Edited successfully');
              </script>";

        header("location: product-list.php?msg=Record Edited Successfully");
      } else {
        echo "<script>
                alert('Data Edited unsuccessfully, Please try again!');
              </script>";
      }
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

    <!-- Manage CSS -->
    <link rel="stylesheet" href="assets/css/manage.css" />

    <!-- Boxicons CDN Link -->
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet"/>
    
    <!-- Responsive Web Design -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- favicon -->
    <link rel="icon" href="assets/images/favicon.png" type="image/x-icon" />
    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon"/>
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
          <a href="manage.php" class="active">
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

    <!-- Logout Confirmation Popup -->
    <div id="logout-popup" class="popup">
      <div class="popup-content">
        <h3>Logout Confirmation</h3>
        <p>Are you sure you want to logout?</p>
        <div class="popup-buttons">
          <a href="homepage.php">Yes</a>
          <button id="cancel-logout">No</button>
        </div>
      </div>
    </div>

    <!-- Home Section -->
    <section class="home-section">
      <nav>
        <div class="sidebar-button">
          <i class="bx bx-menu sidebarBtn"></i>
          <span class="dashboard">Manage Products</span>
        </div>

        <!-- Search bar -->
        <div class="search-box">
          <input type="text" placeholder="Search..." />
          <i class="bx bx-search searchBoxButton"></i>
          <i class='bx bx-x cancelBoxButton'></i>
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
        <form action="" method="POST">
          <!-- Product Information -->
          <div class="card">
            <div class="card-body">
              <h2 class="card-title">Edit Product Information</h2>
              <?php
                $sql = "SELECT * FROM manage_product WHERE prodID = $prodID LIMIT 1";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);

                function convertToNumber($inputString) {
                  $numbers = preg_replace('/[^0-9]/', '', $inputString);
                  echo $numbers;
                }
              ?>
              <!-- Input Product Name -->
              <div class="form-group">
                <label for="prodName">Product Name</label>
                <input type="text" id="prodName" name="prodName" class="form-control" value="<?php echo $row['prodName']?>" />
              </div>

              <!-- Select Product Category -->
              <div class="form-group">
                <label for="prodCate">Product Category</label>
                <select id="prodCate" name="prodCate" class="form-control">
                  <option value="<?php echo $row['prodCate']?>" selected><?php echo $row['prodCate']?></option>
                  <option value="Beverages">Beverages</option>
                  <option value="Canned Goods">Canned Goods</option>
                  <option value="Dairy">Dairy</option>
                  <option value="Frozen Foods">Frozen Foods</option>
                  <option value="Fruits">Fruits</option>
                  <option value="Grains">Grains</option>
                  <option value="Herbs and Spices">Herbs and Spices</option>
                  <option value="Instant Food">Instant food</option>
                  <option value="Meat Poultry">Meat and Poultry</option>
                  <option value="Snacks and Chips">Snacks and Chips</option>
                  <option value="Vegetables">Vegetables</option>
                </select>
              </div>

              <!-- Input Product Price -->
              <div class="form-group">
                <label for="prodPrice">Product Price</label>
                <div class="input-group">
                  <span class="input-group-addon currency-symbol">₱</span>
                  <input type="number" id="prodPrice" name="prodPrice" step="0.01" class="form-control" value="<?php echo $row['prodPrice']?>" />
                </div>
              </div>

              <!-- Input Product Quantity and its Unit -->
              <div class="form-group">
                <label for="prodQuan" class="input-group-addon quantity-label">Product Quantity</label>
                <div class="input-group">
                  <input type="number" id="prodQuan" name="prodQuan" step="0.01" class="form-control" value="<?php convertToNumber($row['prodQuan'])?>" />

                </div>
              </div>

              <!-- Input Product Manufacturer -->
              <div class="form-group">
                <label for="manufact">Manufacturer</label>
                <input type="text" id="manufact" name="manufact" class="form-control" value="<?php echo $row['manufact']?>"/>
              </div>
            </div>
          </div>
        
          <!-- Product Life Cycle -->
            <div class="card">
              <h2 class="card-title">Product Life Cycle</h2>
              <div class="card-body">

                <!-- Select Manufacturing Date -->
                <div class="form-group">
                  <label for="manuDate">Manufacturing Date</label>
                  <input type="date" id="manuDate" name="manuDate" class="form-control" value="<?php echo $row['manuDate']?>" />
                </div>

                <!-- Select Expiration Date -->
                <div class="form-group">
                  <label for="expiDate">Expiration Date</label>
                  <input type="date" id="expiDate" name="expiDate" class="form-control" value="<?php echo $row['expiDate']?>"/>
                </div>
              </div>
            </div>
          </div>
          <!-- Add Product Button -->
          <button name="submit" type="submit" class="add-product-btn">Save Product</button>
        </form>
      </div>
    </section>

    <!-- JAVASCRIPT -->
    <script src="https://kit.fontawesome.com/81d73e8e4d.js" crossorigin="anonymous"></script>
    <script src="assets/js/grocerease.js"></script>
    <script src="assets/js/settings.js"></script>
  </body>
</php>
