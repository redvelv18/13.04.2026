<?php
ob_start();

echo("<h1> Veikals </h1>");
require(__DIR__ . '/../db/connect.php');
require_once __DIR__ . '/../src/controllers/CustomerController.php';

$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$requestUri = rtrim($requestUri, '/');

if ($requestUri === '/customers') {
    CustomerController::index();
} else {
    http_response_code(404);
    echo "<h3>404 - Lapa nav atrasta</h3>";
}

