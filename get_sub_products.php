<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
include 'db.php';

$cat_name = isset($_GET['category']) ? $_GET['category'] : '';

if (empty($cat_name)) {
    echo json_encode(["error" => "Category name missing"]);
    exit;
}

// Naye columns (features, applications, benefits) add kiye gaye hain
$stmt = $conn->prepare("SELECT id, name, description, image, category, sub_category, features, applications, benefits 
                        FROM sub_products 
                        WHERE category = ? OR sub_category = ?");

$stmt->bind_param("ss", $cat_name, $cat_name);
$stmt->execute();
$result = $stmt->get_result();

$products = [];
while ($row = $result->fetch_assoc()) {
    // Frontend ke liye pura image URL yahan bana dein
    $row['image_url'] = "export const API_BASE_URL = "https://your-unique-render-url.onrender.com/";uploads/" . $row['image'];
    $products[] = $row;
}

echo json_encode($products);

$stmt->close();
$conn->close();
