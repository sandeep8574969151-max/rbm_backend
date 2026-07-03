<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
include 'db.php';

$result = $conn->query("SELECT category, sub_category FROM sub_products");

$menuData = [];
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $cat = $row['category'];
        $sub = $row['sub_category'];

        // Agar category set nahi hai to array banayein
        if (!isset($menuData[$cat])) {
            $menuData[$cat] = [];
        }

        // Sub-category ko list mein add karein agar wo pehle se wahan nahi hai
        if ($sub && !in_array($sub, $menuData[$cat])) {
            $menuData[$cat][] = $sub;
        }
    }
}
echo json_encode($menuData);
