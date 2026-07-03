<?php include 'db.php'; ?>

<!-- Style add kiya taki form dikhne mein acha lage -->
<style>
    textarea {
        width: 100%;
        height: 150px;
        padding: 10px;
    }

    input[type="text"] {
        width: 100%;
        padding: 8px;
    }

    .form-container {
        max-width: 500px;
        margin: auto;
    }
</style>

<div class="form-container">
    <form action="upload_product.php" method="POST" enctype="multipart/form-data">
        <h3>Add New Product</h3>

        <label>Name:</label><br>
        <input type="text" name="name" required><br><br>

        <label>Description (Details mein likhein):</label><br>
        <!-- Rows aur cols badha diye taaki zyada text likh sakein -->
        <textarea name="description" rows="6" placeholder="Yahan product ka poora description likhein..." required></textarea><br><br>

        <label>Select Image:</label><br>
        <input type="file" name="product_image" accept="image/*" required><br><br>

        <button type="submit" name="submit" style="padding: 10px 20px; cursor: pointer;">Add Product</button>
    </form>

    <br>
    <a href="admin_dashboard.php">Back to Dashboard</a>
</div>