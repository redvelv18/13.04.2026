<?php
ob_start();

echo("<h1> Veikals </h1>");
require(__DIR__ . '/../db/connect.php');
require_once __DIR__ . '/../src/controllers/CustomerController.php';
require_once __DIR__ . '/../src/controllers/OrderController.php';

// Default view is clients
$page = $_GET['page'] ?? 'clients';
$clientId = isset($_GET['client_id']) ? (int)$_GET['client_id'] : 0;

if ($page === 'orders' && $clientId > 0) {
    OrderController::index();
} elseif ($page === 'all_orders') {
    OrderController::listAll();
} elseif ($page === 'clients') {
    CustomerController::index();
} else {
    http_response_code(404);
    echo "<h3>404 - Lapa nav atrasta</h3>";
}

