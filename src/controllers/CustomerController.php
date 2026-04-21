<?php

require_once(__DIR__ . '/../../db/DB.php');

class CustomerController
{
    public static function index()
    {

        $stmt = DB::query("SELECT client_id, name, email FROM clients");
        $customers = $stmt->fetchAll(PDO::FETCH_ASSOC);
        require __DIR__ . '/../views/customers.php';

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