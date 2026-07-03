<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

// Hostname mein URL (http://...) nahi, sirf 'localhost' ya '127.0.0.1' likhein
$conn = new mysqli("localhost", "root", "", "rbm_db");

// Connection check karna zaroori hai
if ($conn->connect_error) {
    die(json_encode(["error" => "Connection failed: " . $conn->connect_error]));
}

$sql = "SELECT * FROM clients";
$result = $conn->query($sql);

if (!$result) {
    die(json_encode(["error" => "Query failed: " . $conn->error]));
}

$clients = [];
while ($row = $result->fetch_assoc()) {
    $clients[] = $row;
}

echo json_encode($clients);

$conn->close();
