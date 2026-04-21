<?php

require_once __DIR__ . '/../../db/DB.php';

class OrderController
{
    public static function index()
    {
        $clientId = isset($_GET['client_id']) ? (int) $_GET['client_id'] : 0;

        if ($clientId === 0) {
            http_response_code(400);
            echo "<h3>Bad Request — missing client ID</h3>";
            return;
        }

        $clientResult = DB::query("SELECT name, surname FROM clients WHERE client_id = $clientId");
        $client = $clientResult->fetch(PDO::FETCH_ASSOC);

        if (!$client) {
            http_response_code(404);
            echo "<h3>Klients nav atrasts</h3>";
            return;
        }

        echo "<h1>" . htmlspecialchars($client['name'] . ' ' . $client['surname']) . " — Pasūtījumi</h1>";

        $ordersResult = DB::query("
            SELECT o.order_id, o.order_date, o.comment, o.status 
            FROM orders o
            JOIN client_orders co ON o.order_id = co.order_id
            WHERE co.client_id = $clientId
            ORDER BY o.order_date DESC
        ");

        echo "<table border='1'>";
        echo "<tr><th>Order ID</th><th>Date</th><th>Total</th><th>Status</th></tr>";

        while ($order = $ordersResult->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($order['order_id']) . "</td>";
            echo "<td>" . htmlspecialchars($order['order_date']) . "</td>";
            $comment = $order['comment'] ?? 'no comment';
            echo "<td>" . htmlspecialchars($comment) . "</td>";
            echo "<td>" . htmlspecialchars($order['status']) . "</td>";
            echo "</tr>";
        }

        echo "</table>";
        echo "<br><a href='?page=clients'>← Atpakaļ uz klientiem</a>";
    }
}