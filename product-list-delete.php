<?php
  include 'config.php';

  $prodID = $_GET['id'];

  $sql = "DELETE FROM manage_product WHERE prodID=$prodID";
  $result = mysqli_query($conn, $sql);

  header("location: product-list.php?msg=Record Deleted Successfully");
?>