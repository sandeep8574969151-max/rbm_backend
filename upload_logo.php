<?php
header("Access-Control-Allow-Origin: *");

if (isset($_FILES['logo'])) {
    $name = $_POST['name'];
    $filename = $_FILES['logo']['name'];
    $target = "uploads/" . $filename;

    if (move_uploaded_file($_FILES['logo']['tmp_name'], $target)) {
        // Database mein entry
        $conn = new mysqli("localhost", "root", "", "rbm_db");
        $conn->query("INSERT INTO clients (name, logoUrl) VALUES ('$name', '$filename')");
        echo "File Uploaded!";
    }
}
