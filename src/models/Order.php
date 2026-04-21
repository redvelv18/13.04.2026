<?php

require_once __DIR__ . '/../../db/DB.php';

class Order
{
    public static function getAll($status = null)
    {
        $sql = "SELECT o.order_id, o.order_date, o.comment, o.status, c.name as client_name
            FROM orders o
            LEFT JOIN client_orders co ON o.order_id = co.order_id
            LEFT JOIN clients c ON co.client_id = c.client_id";

        $params = [];

        // If a status is provided, add a WHERE clause
        if ($status) {
            $sql .= " WHERE o.status = :status";
            $params['status'] = $status;
        }

        $sql .= " ORDER BY o.order_date DESC";

        // We use prepare/execute instead of query() for safety with GET parameters
        DB::connect();
        $stmt = DB::$pdo->prepare($sql);
        $stmt->execute($params);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function getCount()
    {
        $stmt = DB::query("SELECT COUNT(*) as total FROM orders");
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['total'] ?? 0;
    }

    public static function create($clientId, $date, $comment, $status)
    {
        DB::connect();
        try {
            DB::$pdo->beginTransaction();
            $stmt = DB::$pdo->prepare("INSERT INTO orders (order_date, comment, status) VALUES (?, ?, ?)");
            $stmt->execute([$date, $comment, $status]);

            $orderId = DB::$pdo->lastInsertId();

            if (!$orderId) {
                die("Error: Could not retrieve last insert ID.");
            }

            $stmtLink = DB::$pdo->prepare("INSERT INTO client_orders (client_id, order_id) VALUES (?, ?)");
            return $stmtLink->execute([$clientId, $orderId]);

        DB::$pdo->commit();
            return $orderId;
        } catch (Exception $e) {
            DB::$pdo->rollBack();
            throw $e;
        }
    }
}