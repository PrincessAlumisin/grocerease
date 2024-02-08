<?php
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['promoSelect']) && isset($_POST['prodID'])) {
    $promoSelect = $_POST['promoSelect'];
    $prodID = $_POST['prodID'];

    // Assuming you have a valid database connection stored in $conn variable.
    // Replace 'soon_to_expire' with the actual name of your table and 'selectedPromo' with the correct column name where you want to save the selected promo.

    // Prepare and execute an SQL UPDATE query to update the 'selectedPromo' column for the selected product.
    $updateQuery = "UPDATE soon_to_expire SET selectedPromo = ? WHERE prodID = ?";
    $stmt = mysqli_prepare($conn, $updateQuery);
    mysqli_stmt_bind_param($stmt, 'si', $promoSelect, $prodID);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    }
?>
