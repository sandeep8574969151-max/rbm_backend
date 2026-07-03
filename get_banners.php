<?php
// CORS Headers (Saare domains ko allow karne ke liye)
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json; charset=UTF-8");

include 'db.php';

// Database query
$query = "SELECT id, title, imageUrl FROM banners"; // '*' ki jagah columns ka naam dena behtar hai
$result = $conn->query($query);

if (!$result) {
    // Database error hone par JSON output
    echo json_encode(["error" => "Database Query Failed: " . $conn->error]);
    exit;
}

$banners = [];
while ($row = $result->fetch_assoc()) {
    $banners[] = $row;
}

// JSON Output
echo json_encode($banners);

$conn->close();
