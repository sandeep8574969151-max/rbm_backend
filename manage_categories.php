<?php include 'db.php'; ?>
<form action="" method="POST">
    <h3>Add New Category</h3>
    Name: <input type="text" name="cat_name" required>
    Order: <input type="number" name="display_order" value="0">
    <button type="submit" name="submit">Save</button>
</form>

<?php
if (isset($_POST['submit'])) {
    $name = $_POST['cat_name'];
    $order = $_POST['display_order'];
    $conn->query("INSERT INTO categories (name, display_order) VALUES ('$name', '$order')");
    echo "Category Saved!";
}
?>
<br><a href="admin_dashboard.php">Back to Dashboard</a>