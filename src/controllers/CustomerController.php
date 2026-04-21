<?php

require_once(__DIR__ . '/../../db/DB.php');

class CustomerController
{
    public static function index()
    {

        $withOrders = $_GET['with-orders'] ?? '';

        if ($withOrders === 'full') {
            $sql = "SELECT c.client_id, c.name, c.email, o.order_id, o.order_date, o.status 
                    FROM clients c
                    LEFT JOIN client_orders co ON c.client_id = co.client_id
                    LEFT JOIN orders o ON co.order_id = o.order_id
                    ORDER BY c.client_id";

            $stmt = DB::query($sql);
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $customers = [];
            foreach ($rows as $row) {
                $id = $row['client_id'];
                if (!isset($customers[$id])) {
                    $customers[$id] = [
                        'client_id' => $id, // Added this back!
                        'name' => $row['name'],
                        'email' => $row['email'],
                        'orders' => []
                    ];
                }
                if (!empty($row['order_id'])) {
                    $customers[$id]['orders'][] = [
                        'id' => $row['order_id'],
                        'date' => $row['order_date'],
                        'status' => $row['status']
                    ];
                }
            }
            require __DIR__ . '/../views/customers_full.php';
        } else {
            // Standard view logic
            $stmt = DB::query("SELECT client_id, name, email FROM clients");
            $customers = $stmt->fetchAll(PDO::FETCH_ASSOC);
            require __DIR__ . '/../views/customers.php';
        }

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['client_id']) . "</td>";
            echo "<td>" . htmlspecialchars($row['name']) . "</td>";
            echo "<td>" . htmlspecialchars($row['email']) . "</td>";
            echo "<td><a href='?page=orders&client_id=" . $row['client_id'] . "'>View Orders</a></td>";
            echo "</tr>";
        }

        echo "</table>";
    }
}