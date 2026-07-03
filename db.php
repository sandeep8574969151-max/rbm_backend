<?php
// Purana code hata dein aur ye daalein:
$host = "yahan-cloud-host-link-daalein";
$user = "yahan-cloud-username-daalein";
$pass = "yahan-cloud-password-daalein";
$dbname = "yahan-database-name-daalein";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
