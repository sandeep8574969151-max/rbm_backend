<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
include 'db.php';

// Agar ID nahi mil rahi, toh hum yahan se check karenge
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($id === 0) {
    echo json_encode(["error" => "ID nahi mili, URL check karo", "received_id" => $_GET]);
    exit;
}

$query = "SELECT id, name, description, image, type FROM products WHERE id = $id";
$result = $conn->query($query);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $row['image_url'] = "export const API_BASE_URL = "https://your-unique-render-url.onrender.com/";uploads/" . $row['image'];
    echo json_encode($row);
} else {
    echo json_encode(["error" => "Product nahi mila", "query_id" => $id]);
}
$conn->close();
