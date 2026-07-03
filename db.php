<?php
// Railway database connection settings
$host = "mysql.railway.internal";
$user = "root";
$pass = "yyTKKFtdBLKlClCfJJPXbBnvQyUjISdU";
$dbname = "railway";
$port = 3306;

// Connection create karein
$conn = new mysqli($host, $user, $pass, $dbname, $port);

// Connection check karein
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Optional: Connection successful hone ka check
// echo "Connected successfully"; 
