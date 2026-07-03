<?php
// CORS headers zaroori hain taaki React request allow ho
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') exit;

include 'db.php'; // Connection file

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 1. Data collect karein
    $name = $_POST['name'];
    $description = $_POST['description'];
    $type = $_POST['product_type']; // Yeh 'general' aayega aapke form se

    // 2. Image upload logic
    $target_dir = "uploads/";
    if (!file_exists($target_dir)) mkdir($target_dir, 0777, true);

    $filename = time() . '_' . basename($_FILES['image']['name']);
    $target_file = $target_dir . $filename;

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
        // 3. Database insert
        $stmt = $conn->prepare("INSERT INTO products (name, description, image, type) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $description, $filename, $type);

        if ($stmt->execute()) {
            echo "Product Uploaded Successfully!";
        } else {
            echo "Database Error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "File upload failed!";
    }
}
$conn->close();
