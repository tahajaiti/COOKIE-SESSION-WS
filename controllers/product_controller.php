<?php
require_once 'models/product_model.php';

function showProductList() {
    $products = getAllProducts();
    require 'views/product_list.php';
}

function addProduct() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['name'] ?? '';
        $price = $_POST['price'] ?? 0;
        $description = $_POST['description'] ?? '';
        saveProduct($name, $price, $description);
        header('Location: index.php');
        exit;
    }
    require 'views/product_add.php';
}

function deleteProduct($id) {
    removeProduct($id);
    header('Location: index.php');
    exit;
}
