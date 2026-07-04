<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, OPTIONS");
header("Access-Control-Allow-Headers: *");

if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') exit;

include 'db.php'; // Database connection file

if (isset($_FILES['image'])) {
    $imageName = time() . '_' . basename($_FILES['image']['name']);
    $targetDir = "uploads/";
    $targetFilePath = $targetDir . $imageName;

    if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFilePath)) {
        $sql = "INSERT INTO gallery (imageUrl) VALUES ('$imageName')";

        if ($conn->query($sql) === TRUE) {
            echo "Gallery image uploaded successfully!";
        } else {
            echo "Database Error: " . $conn->error;
        }
    } else {
        echo "Error moving uploaded file. Check 'uploads' folder permissions.";
    }
} else {
    echo "No image received.";
}
