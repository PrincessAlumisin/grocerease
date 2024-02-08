<?php
session_start();
include 'config.php';

function apply50PercentSale($originalPrice)
{
    // Calculate the new price with the 50% discount
    $discount = $originalPrice * 0.5; // 50% discount
    $newPrice = $originalPrice - $discount;
    return $newPrice;
}

function apply20PercentSale($originalPrice)
{
    // Calculate the new price with the 20% discount
    $discount = $originalPrice * 0.2; // 20% discount
    $newPrice = $originalPrice - $discount;
    return $newPrice;
}

function apply5PercentSale($originalPrice)
{
    // Calculate the new price with the 5% discount
    $discount = $originalPrice * 0.05; // 5% discount
    $newPrice = $originalPrice - $discount;
    return $newPrice;
}

if (isset($_POST['prodPromo']) && isset($_POST['prodID'])) {
    $selectedPromo = $_POST['prodPromo'];
    $prodID = $_POST['prodID'];

    // Fetch the original product price from the database
    $query = "SELECT prodPrice FROM manage_product WHERE prodID = '$prodID'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $originalPrice = $row['prodPrice'];

    // Calculate the new product price based on the selected promo
    $newPrice = $originalPrice;
    if ($selectedPromo == 'Buy 1 Take 1') {
        return $originalPrice;
    } 
    elseif ($selectedPromo == '50%') {
        $newPrice = apply50PercentSale($originalPrice);
    } 
    elseif ($selectedPromo == '20%') {
        $newPrice = apply20PercentSale($originalPrice);
    } 
    elseif ($selectedPromo == '5%') {
        $newPrice = apply5PercentSale($originalPrice);
    }

    // Update the product price in the database
    $updateQuery = "UPDATE manage_product SET prodPrice = '$newPrice' WHERE prodID = '$prodID'";
    if (mysqli_query($conn, $updateQuery)) {
        echo "success";
    } else {
        echo "error";
    }
}
?>
