<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, OPTIONS");
header("Access-Control-Allow-Headers: *");

if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') exit;

// Aapko Render ya live server ke credentials yahan dene honge
// Agar Render ka DB use kar rahe hain toh wahan se credentials lein
$conn = new mysqli("localhost", "root", "", "rbm_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_FILES['image']) && isset($_POST['name'])) {
    $name = $_POST['name'];
    $filename = time() . '_' . basename($_FILES['image']['name']);

    // Path ko absolute banayein
    $targetDir = __DIR__ . "/uploads/";
    $targetFilePath = $targetDir . $filename;

    if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFilePath)) {
        $stmt = $conn->prepare("INSERT INTO clients (name, logoUrl) VALUES (?, ?)");
        $stmt->bind_param("ss", $name, $filename);

        if ($stmt->execute()) {
            echo "Client Uploaded Successfully!";
        } else {
            echo "DB Error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error: Failed to move file to uploads folder. Check permissions.";
    }
} else {
    echo "Error: Missing data (Image or Name).";
}
$conn->close();
