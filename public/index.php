<?php
ob_start();

echo ("<h1> Store data </h1>");
require(__DIR__ . '/../db/connect.php');
require_once __DIR__ . '/../src/controllers/CustomerController.php';
require_once __DIR__ . '/../src/controllers/OrderController.php';
require_once __DIR__ . '/../src/controllers/HomeController.php';

require_once __DIR__ . '/../src/views/header.php';

// Default view is clients
$page = $_GET['page'] ?? 'home';
$clientId = isset($_GET['client_id']) ? (int) $_GET['client_id'] : 0;

if ($page === 'home') {
    HomeController::index();
} elseif ($page === 'orders' && $clientId > 0) {
    OrderController::index();
} elseif ($page === 'all_orders') {
    OrderController::listAll();
} elseif ($page === 'clients') {
    CustomerController::index();
} elseif ($page === 'order_create') {
    OrderController::createForm();
} elseif ($page === 'order_store') {
    OrderController::store();
} else {
    http_response_code(404);
    echo "<h3>404 - Lapa nav atrasta</h3>";
}

