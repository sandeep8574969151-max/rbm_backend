<?php
$host = "mysql-188e4600-sandeep8574969151-948f.a.aivencloud.com";
$user = "avnadmin";
$pass = getenv('DB_PASSWORD'); // Render environment variable se password uthayega
$dbname = "defaultdb";
$port = 18284;

// Purane "new mysqli" ko hatakar yeh SSL connection code lagayein
$conn = mysqli_init();

// Aiven SSL connection ke liye
mysqli_ssl_set($conn, NULL, NULL, NULL, NULL, NULL);
mysqli_real_connect($conn, $host, $user, $pass, $dbname, $port, NULL, MYSQLI_CLIENT_SSL);

// Connection check
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$conn->set_charset("utf8mb4");
