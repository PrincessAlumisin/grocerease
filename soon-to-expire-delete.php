<?php
include 'config.php';  // Make sure to include your configuration file

// Check if the product ID is set in the URL
if (isset($_GET['id'])) {
    $prodID = $_GET['id'];

    // Retrieve product details before deletion
    $selectQuery = "SELECT * FROM manage_product WHERE prodID = $prodID";
    $result = mysqli_query($conn, $selectQuery);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        // Insert the product into drop_items
        $insertQuery = "INSERT INTO drop_items (prodID, prodName, prodCate, prodQuan, prodPrice, manufact, manuDate, expiDate)
                        VALUES ('{$row['prodID']}', '{$row['prodName']}', '{$row['prodCate']}', '{$row['prodQuan']}', '{$row['prodPrice']}', '{$row['manufact']}', '{$row['manuDate']}', '{$row['expiDate']}')";
        mysqli_query($conn, $insertQuery);

        // Delete the product from manage_product
        $deleteQuery = "DELETE FROM manage_product WHERE prodID = $prodID";
        mysqli_query($conn, $deleteQuery);

        // Redirect back to the expired product page with a success flag
        header("Location: soon-to-expire.php?deleted=true");
        exit();
    }
}

// Redirect back to the expired product page with an error flag
header("Location: soon-to-expire.php?error=true");
exit();
?>