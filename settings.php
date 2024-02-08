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

if (isset($_POST['submit'])) {
    $currentPassword = mysqli_real_escape_string($conn, md5($_POST['current-password']));

    if ($currentPassword !== $row['password']) {
        echo "Incorrect current password.";
        exit();
    }

    $name = mysqli_real_escape_string($conn, $_POST['change-username']);
    $newEmail = mysqli_real_escape_string($conn, $_POST['change-email']);
    $password = mysqli_real_escape_string($conn, md5($_POST['new-password']));

    // Determine which fields to update
    $updateQuery = "";

    if (!empty($name)) {
        $updateQuery .= "name = '$name', ";
    }

    if (!empty($newEmail)) {
        // Check if the new email is different from the current one
        $queryCheckEmail = mysqli_query($conn, "SELECT * FROM users WHERE email='$newEmail'");
        if (mysqli_num_rows($queryCheckEmail) > 0) {
            echo "Email already exists.";
            exit();
        }

        $updateQuery .= "email = '$newEmail', ";
    } else {
        // If newEmail is empty, use the recent session email
        $newEmail = $_SESSION['SESSION_EMAIL'];
    }

    if (!empty($_POST['new-password'])) {
        $updateQuery .= "password = '$password', ";
    }

    // Trim the trailing comma and space
    $updateQuery = rtrim($updateQuery, ', ');

    if (!empty($updateQuery)) {
        // Construct the SQL query to update user information
        $sql = "UPDATE users SET $updateQuery WHERE email = '{$_SESSION['SESSION_EMAIL']}'";

        // Execute the SQL query
        $result = mysqli_query($conn, $sql);

        // Update the session email
        $_SESSION['SESSION_EMAIL'] = $newEmail;

        if ($result) {
            echo "<script>
                  alert('User information updated successfully.');
                </script>";
        } else {
            echo "<script>
                  alert('Error updating user information.');
                </script>";
        }
    } else {
        echo "No changes made.";
    }
}

// Fetch top 3 latest notifications from the database
$topNotificationsQuery = "SELECT * FROM notifications ORDER BY date DESC LIMIT 3";
$topNotificationsResult = mysqli_query($conn, $topNotificationsQuery);

mysqli_close($conn);
?>



<!DOCTYPE php>
<!-- Group 3 | Project -->
<php lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <title>GrocerEase</title>

    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/grocerease.css" />

    <!-- Setting CSS -->
    <link rel="stylesheet" href="assets/css/settings.css" />

    <!-- Boxicons CDN Link -->
    <link
      href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css"
      rel="stylesheet"
    />
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
          <a href="settings.php" class="active">
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
          <span class="dashboard">Settings</span>
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
          <!-- Card 1: Personal Information -->
          <div class="card">
            <div class="card-body">
              <h2 class="card-title">Personal Information</h2>

              <!-- Change Username -->
              <div class="form-group">
                <label for="change-username">Change Username:</label>
                <input type="text" id="change-username" name="change-username" class="form-control" placeholder="Enter new username" />
              </div>

              <!-- Change Email -->
              <div class="form-group">
                <label for="change-email">Change Email:</label>
                <input type="email" id="change-email" name="change-email" class="form-control" placeholder="Enter new email address" />
              </div>

              <!-- Change Icon -->
              <div class="form-group">
                <label for="change-icon">Change Icon:</label>
                <button type="button" id="change-icon" class="icon-select-btn">
                  Select Icon
                </button>
              </div>

              <div class="icon-popup" id="icon-popup">
                <div class="icon-grid">
                  <img src="assets/images/icon1.png" alt="Icon 1" data-icon="icon1.png">
                  <img src="assets/images/icon2.png" alt="Icon 2" data-icon="icon2.png">
                  <img src="assets/images/icon3.png" alt="Icon 3" data-icon="icon3.png">
                  <img src="assets/images/icon4.png" alt="Icon 4" data-icon="icon4.png">
                  <img src="assets/images/icon5.png" alt="Icon 5" data-icon="icon5.png">
                  <img src="assets/images/icon6.png" alt="Icon 6" data-icon="icon6.png">
                  <img src="assets/images/icon7.png" alt="Icon 7" data-icon="icon7.png">
                  <img src="assets/images/icon8.png" alt="Icon 8" data-icon="icon8.png">
                  <img src="assets/images/icon9.png" alt="Icon 9" data-icon="icon9.png">
                  <img src="assets/images/icon10.png" alt="Icon 10" data-icon="icon10.png">
                  <img src="assets/images/icon11.png" alt="Icon 11" data-icon="icon11.png">
                  <img src="assets/images/icon12.png" alt="Icon 12" data-icon="icon12.png">
                  <img src="assets/images/icon13.png" alt="Icon 13" data-icon="icon13.png">
                  <img src="assets/images/icon14.png" alt="Icon 14" data-icon="icon14.png">
                  <img src="assets/images/icon15.png" alt="Icon 15" data-icon="icon15.png">
                </div>
              </div>
            </div>
          </div>

          <!-- Card 2: Change Password -->
          <div class="card">
            <div class="card-body">
              <h2 class="card-title">Change Password</h2>

              <!-- New Password -->
              <div class="form-group">
                <label for="new-password">New Password:</label>
                <input type="password" id="new-password" name="new-password" class="form-control" placeholder="Enter new password" />
              </div>

              <!-- Retype New Password -->
              <div class="form-group">
                <label for="confirm-password">Retype New Password:</label>
                <input type="password" id="confirm-password" name="confirm-password" class="form-control" placeholder="Retype new password" />
              </div>
            </div>
          </div>

          <!-- Card 1: Personal Information -->
          <div class="card">
            <div class="card-body">
              <h2 class="card-title">Verify</h2>

              <!-- Current Password -->
              <div class="form-group">
                <label for="current-password">Current Password:</label>
                <input type="password" id="current-password" name="current-password" class="form-control" placeholder="Enter current password" />
              </div>
            </div>
          </div>

          <!-- Apply Changes Button -->
          <button name="submit" type="submit" class="apply-changes-btn">Apply Changes</button>
        </form>
      </div>
    </section>
    

    <!-- JAVASCRIPT -->
    <script src="https://kit.fontawesome.com/81d73e8e4d.js" crossorigin="anonymous"></script>
    <script src="assets/js/grocerease.js"></script>
    <script src="assets/js/settings.js"></script>
  </body>
</php>