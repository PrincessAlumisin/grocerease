<?php
include 'config.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $userId = $_GET['id'];

    // Perform the delete operation
    $query = "DELETE FROM users WHERE id = $userId";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Deletion successful
        header("Location: user-setting.php");
        exit;
    } else {
        // Deletion failed
        echo "Error: " . mysqli_error($conn);
    }
} else {
    // Invalid or missing user ID
    echo "Invalid user ID.";
}
?>
