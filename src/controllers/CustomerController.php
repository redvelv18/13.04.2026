<?php

require_once (__DIR__ . '/../../db/DB.php');

class CustomerController
{
    public static function index()
    {
        require_once __DIR__ . '/../../db/DB.php';
    
        DB::connect(); 
    
        $stmt = DB::query("SELECT id, name, email FROM customers");
    
        echo "<h1>Klienti</h1>";
        echo "<table border='1'>";
    
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['id']) . "</td>";
            echo "<td>" . htmlspecialchars($row['name']) . "</td>";
            echo "<td>" . htmlspecialchars($row['email']) . "</td>";
            echo "</tr>";
        }
    
        echo "</table>";
        echo "<td><a href='/index.php/" . (int)$row['client_id'] . "/orders'>View Orders</a></td>";
    }
}