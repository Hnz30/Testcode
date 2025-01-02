<?php
    $con = mysqli_connect("localhost", "root", "", "crud"); // Use = for assignment

    if ($con == false) {
        die("Connection Error: " . mysqli_connect_error());
    }
?>
