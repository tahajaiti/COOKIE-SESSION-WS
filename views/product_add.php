<!DOCTYPE html>
<html>
<head>
    <title>Add a product</title>
</head>
<body>
    <h1>Add product</h1>
    <form method="POST" action="index.php?page=add">
        <label for="name">Name</label><br>
        <input type="text" id="name" name="name" required><br><br>

        <label for="price">Price</label><br>
        <input type="number" id="price" name="price" step="0.01" required><br><br>

        <label for="description">Description</label><br>
        <textarea id="description" name="description" required></textarea><br><br>

        <button type="submit">Add</button>
    </form>
    <a href="index.php">Back home</a>
</body>
</html>
