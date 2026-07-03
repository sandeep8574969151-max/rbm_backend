<?php
// 1. CORS Headers: React-PHP communication ke liye zaroori
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");

// Pre-flight request handle karein
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    exit;
}

include 'db.php';

// 'submit' check hataya kyunki React se FormData aata hai
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Input ko safe karein (Security ke liye)
    $title = $conn->real_escape_string($_POST['title']);

    // File upload logic
    if (isset($_FILES['banner_image'])) {
        $file_name = time() . "_" . basename($_FILES['banner_image']['name']);
        $target_dir = "uploads/";

        // Folder check karein
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true);
        }

        $target_file = $target_dir . $file_name;

        if (move_uploaded_file($_FILES['banner_image']['tmp_name'], $target_file)) {
            // Database insert
            $sql = "INSERT INTO banners (title, imageUrl) VALUES ('$title', '$target_file')";

            if ($conn->query($sql) === TRUE) {
                echo json_encode(["status" => "success", "message" => "Banner Uploaded!"]);
            } else {
                echo json_encode(["status" => "error", "message" => $conn->error]);
            }
        } else {
            echo json_encode(["status" => "error", "message" => "File move failed"]);
        }
    } else {
        echo json_encode(["status" => "error", "message" => "No file uploaded"]);
    }
}
