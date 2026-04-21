<?php

require_once __DIR__ . '/../../db/DB.php';

class Order
{
    public static function getAll()
    {
        // Fetching all orders with a join to show which client they belong to
        $sql = "SELECT o.order_id, o.order_date, o.comment, o.status, c.name as client_name
                FROM orders o
                LEFT JOIN client_orders co ON o.order_id = co.order_id
                LEFT JOIN clients c ON co.client_id = c.client_id
                ORDER BY o.order_date DESC";
        
        $stmt = DB::query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}