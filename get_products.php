<?php
// CORS Headers (Sabse zaroori React ke liye)
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");

// Error reporting (Sirf development ke liye)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Connection include karein
include 'db.php';

// Check karein connection variable $conn exist karta hai ya nahi
if (!isset($conn)) {
    echo json_encode(["error" => "Database connection failed"]);
    exit;
}

// Query run karein
$result = $conn->query("SELECT * FROM products");

// Query error check
if (!$result) {
    echo json_encode(["error" => "Query failed: " . $conn->error]);
    exit;
}

// Data fetch karein
$products = array();
while ($row = $result->fetch_assoc()) {
    $products[] = $row;
}

// JSON output return karein
echo json_encode($products);

// Connection close
$conn->close();
