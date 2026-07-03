<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json"); // text/plain ki jagah application/json behtar hai

include 'db.php';

$category = isset($_GET['category']) ? $_GET['category'] : '';
$sub_cat = isset($_GET['sub_category']) ? $_GET['sub_category'] : '';

$products = [];

// Query mein features, applications, aur benefits add karein
$query = "SELECT id, name, description, image, category, sub_category, features, applications, benefits FROM sub_products ";

if (!empty($sub_cat)) {
    $query .= "WHERE sub_category = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $sub_cat);
} elseif (!empty($category)) {
    $query .= "WHERE category = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $category);
} else {
    echo json_encode([]);
    exit;
}

$stmt->execute();
$result = $stmt->get_result();

while ($row = $result->fetch_assoc()) {
    // Optional: Image URL yahan bhi generate kar sakte hain
    $row['image_url'] = "export const API_BASE_URL = "https://your-unique-render-url.onrender.com/";uploads/" . $row['image'];
    $products[] = $row;
}

echo json_encode($products);
$stmt->close();
$conn->close();
