<!DOCTYPE html>
<html>

<body>
    <h2>Add New Product</h2>
    <form action="add_product.php" method="POST">
        Name: <input type="text" name="name" required><br><br>
        Image URL: <input type="text" name="image" placeholder="Image ka link yahan dalein"><br><br>
        Description: <textarea name="description"></textarea><br><br>
        <button type="submit">Save Product</button>
    </form>
</body>

</html>