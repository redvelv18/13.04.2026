<?php

require_once(__DIR__ . '/../../db/DB.php');

class CustomerController
{
    public static function index()
    {

        $stmt = DB::query("SELECT client_id, name, email FROM clients");

        echo "<h1>Klienti</h1>";
        echo "<table border='1'>";

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
    echo "<td>" . htmlspecialchars($row['client_id']) . "</td>";
    echo "<td>" . htmlspecialchars($row['name']) . "</td>";
    echo "<td>" . htmlspecialchars($row['email']) . "</td>";
    // Place the link inside a cell, inside the loop
    echo "<td><a href='?page=orders&client_id=" . $row['client_id'] . "'>View Orders</a></td>";
    echo "</tr>";
        }

        echo "</table>";
    }
}