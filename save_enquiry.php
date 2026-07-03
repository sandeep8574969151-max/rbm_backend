<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

// Agar pre-flight request (OPTIONS) aati hai toh exit karein
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    exit;
}

include 'db.php';

// FormData se aane wala data $_POST mein milta hai
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

$sql = "INSERT INTO enquiries (name, phone, email, subject, message) VALUES ('$name', '$phone', '$email', '$subject', '$message')";

if ($conn->query($sql) === TRUE) {
    echo json_encode(["status" => "success"]);
} else {
    echo json_encode(["status" => "error", "error" => $conn->error]);
}
$conn->close();
