<?php

function getAllProducts() {
    $file = 'data/products.json';
    if (!file_exists($file)) {
        return [];
    }
    $data = file_get_contents($file);
    return json_decode($data, true) ?? [];
}

function saveProduct($name, $price, $description) {
    $file = 'data/products.json';
    $products = getAllProducts();
    $products[] = [
        'id' => uniqid(),
        'name' => $name,
        'price' => $price,
        'description' => $description
    ];
    file_put_contents($file, json_encode($products));
}

function removeProduct($id) {
    $file = 'data/products.json';
    $products = getAllProducts();
    $products = array_filter($products, function ($product) use ($id) {
        return $product['id'] !== $id;
    });
    file_put_contents($file, json_encode($products));
}
