<?php
header("Access-Control-Allow-Origin: *");
include 'db.php'; // Aapka database connection

if (isset($_POST['cat_name'])) {
    $cat_name = $_POST['cat_name'];

    // Sirf category_name save hoga
    $sql = "INSERT INTO categories_list (category_name) VALUES ('$cat_name')";

    if ($conn->query($sql) === TRUE) {
        echo "Category Added!";
    } else {
        echo "Error: " . $conn->error;
    }
}
