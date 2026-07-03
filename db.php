<?php
$servername = "localhost"; // Yahan sirf "localhost" likhein
$username = "root";
$password = "";
$dbname = "rbm_db";

// Connection banayein
$conn = new mysqli($servername, $username, $password, $dbname);

// Check karein ki connection sahi hai ya nahi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
