<?php

class CustomerController
{
    public static function index($mysqli)
    {
        $query = "SELECT id, name, email FROM customers";
        $result = $mysqli->query($query);

        if (!$result) {
            http_response_code(500);
            echo "<h1>Kļūda datubāzē</h1>";
            return;
        }

        // HTML ģenerēšana
        echo "<!DOCTYPE html>";
        echo "<html>";
        echo "<head>";
        echo "<meta charset='UTF-8'>";
        echo "<title>Klienti</title>";
        echo "</head>";
        echo "<body>";

        echo "<h1>Klientu saraksts</h1>";
        echo "<table border='1' cellpadding='5'>";
        echo "<tr><th>ID</th><th>Vārds</th><th>Email</th></tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['id']) . "</td>";
            echo "<td>" . htmlspecialchars($row['name']) . "</td>";
            echo "<td>" . htmlspecialchars($row['email']) . "</td>";
            echo "</tr>";
        }

        echo "</table>";
        echo "</body>";
        echo "</html>";
    }
}