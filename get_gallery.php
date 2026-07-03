<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

$dir = "uploads/"; // Folder ka naam
$files = scandir($dir);
$images = [];

foreach ($files as $file) {
    // Sirf images ko filter karein
    if (in_array(pathinfo($file, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'gif'])) {
        $images[] = ["imageUrl" => "uploads/" . $file];
    }
}

echo json_encode($images);
