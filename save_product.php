<?php
include 'db.php';
header("Access-Control-Allow-Origin: *");

$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

$sql = "INSERT INTO enquiries (name, phone, email, subject, message) 
        VALUES ('$name', '$phone', '$email', '$subject', '$message')";

if ($conn->query($sql) === TRUE) {
    echo json_encode(["status" => "success"]);
} else {
    echo json_encode(["status" => "error", "error" => $conn->error]);
}
