<!DOCTYPE html>
<html>
<head>
    <title>Products</title>
</head>
<body>
    <h1>List for products</h1>
    <a href="index.php?page=add">Add new product</a>
    <ul>
        <?php foreach ($products as $product): ?>
            <li>
                <strong><?= htmlspecialchars($product['name']) ?></strong> - 
                <?= htmlspecialchars($product['price']) ?>DH 
                <br><?= htmlspecialchars($product['description']) ?>
                <a href="index.php?page=delete&id=<?= $product['id'] ?>">Delete</a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
