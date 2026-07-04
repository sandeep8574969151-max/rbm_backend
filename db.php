<?php
$host = "mysql-188e4600-sandeep8574969151-948f.a.aivencloud.com";
$user = "avnadmin";
// Yahan hum getenv() ka use kar rahe hain taaki GitHub error na de
$pass = getenv('DB_PASSWORD');
$dbname = "defaultdb";
$port = 18284;

$conn = new mysqli($host, $user, $pass, $dbname, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$conn->set_charset("utf8mb4");
