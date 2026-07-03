<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: text/plain");

include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $category = $_POST['category'];
    $sub_category = !empty($_POST['sub_category']) ? $_POST['sub_category'] : NULL;

    // Naye fields collect karein
    $features = !empty($_POST['features']) ? $_POST['features'] : NULL;
    $applications = !empty($_POST['applications']) ? $_POST['applications'] : NULL;
    $benefits = !empty($_POST['benefits']) ? $_POST['benefits'] : NULL;

    $uploadDir = 'uploads/';
    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $filename = time() . '_' . basename($_FILES['image']['name']);
    $targetFilePath = $uploadDir . $filename;

    if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFilePath)) {
        // Query mein naye columns add kiye
        $stmt = $conn->prepare("INSERT INTO sub_products (name, description, category, sub_category, image, features, applications, benefits) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

        // 8 total parameters bind kar rahe hain (ssssssss)
        $stmt->bind_param("ssssssss", $name, $description, $category, $sub_category, $filename, $features, $applications, $benefits);

        if ($stmt->execute()) {
            echo "Product Uploaded Successfully!";
        } else {
            echo "DB Error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "File Upload Failed!";
    }
} else {
    echo "Invalid Request!";
}

$conn->close();
