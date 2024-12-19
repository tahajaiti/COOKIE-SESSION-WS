<?php
require_once 'controllers/product_controller.php';

$page = $_GET['page'] ?? 'list';

if ($page === 'list') {
    showProductList();
} elseif ($page === 'add') {
    addProduct();
} elseif ($page === 'delete' && isset($_GET['id'])) {
    deleteProduct($_GET['id']);
} else {
    echo "Page not found.";
}
