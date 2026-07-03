?php include 'db.php'; ?>
<form action="upload_banner.php" method="POST" enctype="multipart/form-data">
    <h3>Add New Banner</h3>
    Title: <input type="text" name="title" required><br><br>
    Select Image: <input type="file" name="banner_image" accept="image/*" required><br><br>
    Link URL: <input type="text" name="linkUrl" placeholder="/products"><br><br>
    <button type="submit" name="submit">Upload Banner</button>
</form>