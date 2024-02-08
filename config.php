<?php

$conn = mysqli_connect("localhost", "root", "", "grocerease");

if (!$conn) {
    echo "Connection Failed";   
}