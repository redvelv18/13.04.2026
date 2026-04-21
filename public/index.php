<?php
ob_start();

echo("<h1> Veikals </h1>");
require(__DIR__ . '/../db/connect.php');
require_once __DIR__ . '/../src/controllers/CustomerController.php';
require_once __DIR__ . '/../src/controllers/OrderController.php';

$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$requestUri = rtrim($requestUri, '/');

if (preg_match('#^/clients/(\d+)/orders$#', $requestUri, $matches)) {
    $_GET['id'] = $matches[1];
    OrderController::index(); 
} elseif ($requestUri === '/clients') {
    CustomerController::index();
} else {
    http_response_code(404);
    echo "<h3>404 - Lapa nav atrasta</h3>";
}

