<?php

require_once __DIR__ . '/../../db/DB.php';

class Customer
{
    /**
     * Fetches all customers (simple list)
     */
    public static function getAll()
    {
        $stmt = DB::query("SELECT client_id, name, email FROM clients");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Fetches customers joined with their orders (full list)
     */
    public static function getAllWithOrders()
    {
        $sql = "SELECT 
                    c.client_id, c.name, c.email, 
                    o.order_id, o.order_date, o.status
                FROM clients c
                LEFT JOIN client_orders co ON c.client_id = co.client_id
                LEFT JOIN orders o ON co.order_id = o.order_id
                ORDER BY c.client_id";
        
        $stmt = DB::query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

        public static function getCount()
    {
        $stmt = DB::query("SELECT COUNT(*) as total FROM clients");
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['total'] ?? 0;
    }
}