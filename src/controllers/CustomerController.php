<?php

require_once (__DIR__ . '/../../db/DB.php');

class CustomerController
{
    public static function index()
    {

        DB::connect(); 
    
        $result = DB::query("SELECT client_id, name, surname, email FROM clients");

        echo "<h1>Klienti</h1>";
        echo "<table border='1'>";
    
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['client_id']) . "</td>";
            echo "<td>" . htmlspecialchars($row['name']) . "</td>";
            echo "<td>" . htmlspecialchars($row['surname']) . "</td>";
            echo "<td>" . htmlspecialchars($row['email']) . "</td>";
            echo "</tr>";
        }
    
        echo "</table>";
    }
}