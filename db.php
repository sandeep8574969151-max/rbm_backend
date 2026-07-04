<?php
$host = "mysql-188e4600-sandeep8574969151-948f.a.aivencloud.com";
$user = "avnadmin";
$pass = "AVNS_gncnAe_qSh8v-AsAJgq"; // Password icon (eye) par click karke copy karein
$dbname = "defaultdb";
$port = 18284;

$conn = new mysqli($host, $user, $pass, $dbname, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Optional: $conn->set_charset("utf8mb4");
