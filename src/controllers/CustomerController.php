<?php

require_once(__DIR__ . '/../../db/DB.php');

class CustomerController
{
    public static function index()
    {
        require_once __DIR__ . '/../../db/DB.php';

        DB::connect();

        $stmt = DB::query("SELECT client_id, name, email FROM clients");

        echo "<h1>Klienti</h1>";
        echo "<table border='1'>";

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['client_id']) . "</td>";
            echo "<td>" . htmlspecialchars($row['name']) . "</td>";
            echo "<td>" . htmlspecialchars($row['email']) . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    echo "<td><a href='?page=orders&id=1" . (int)$row['client_id'] . "'>View Orders</a></td>";
    }
}