<?php
// CORS Headers - Browser se request allow karne ke liye
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");

// Database connection include karein
include 'db.php';

// SQL Query run karein
$query = "SELECT category_name FROM categories_list";
$result = $conn->query($query);

// Check karein ki query sahi chali ya nahi
if ($result) {
    $categories = [];
    while ($row = $result->fetch_assoc()) {
        $categories[] = $row['category_name'];
    }
    // Result JSON format mein output karein
    echo json_encode($categories);
} else {
    // Agar query mein error aaye
    echo json_encode(["error" => "Database query failed: " . $conn->error]);
}

// Connection close karein
$conn->close();
