<?php
    include 'config.php'; // Include the config.php file which contains database connection details

    // Delete all notifications from the database
    $deleteQuery = "DELETE FROM notifications";
    mysqli_query($conn, $deleteQuery);

    // Redirect back to the notifications page
    header("Location: grocerease.php");
    exit();
?>
