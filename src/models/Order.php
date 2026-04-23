<?php

require_once __DIR__ . '/../../db/DB.php';

class Order
{

    public $order_id;
    public $order_date;
    public $comment;
    public $status;
    public $client_name;

   public static function getAll($status = null)
{
    $sql = "SELECT o.order_id, o.order_date, o.comment, o.status, c.name as client_name
            FROM orders o
            LEFT JOIN client_orders co ON o.order_id = co.order_id
            LEFT JOIN clients c ON co.client_id = c.client_id";

    $params = [];
    if ($status) {
        $sql .= " WHERE o.status = :status";
        $params['status'] = $status;
    }

    DB::connect();
    $stmt = DB::$pdo->prepare($sql);
    $stmt->execute($params);

    // FETCH_CLASS automatically maps column names to class properties
    return $stmt->fetchAll(PDO::FETCH_CLASS, self::class);
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

        // 1. Insert into the main orders table
        $stmt = DB::$pdo->prepare("INSERT INTO orders (order_date, comment, status) VALUES (?, ?, ?)");
        $stmt->execute([$date, $comment, $status]);

        // 2. Get the newly generated ID
        $orderId = DB::$pdo->lastInsertId();

        if (!$orderId) {
            throw new Exception("Error: Could not retrieve last insert ID. Is order_id AUTO_INCREMENT?");
        }

        // 3. Link it in the junction table
        $stmtLink = DB::$pdo->prepare("INSERT INTO client_orders (client_id, order_id) VALUES (?, ?)");
        $stmtLink->execute([$clientId, $orderId]);

        // 4. Commit EVERYTHING at once
        DB::$pdo->commit();
        
        return $orderId; 

    } catch (Exception $e) {
        // If anything fails (including a duplicate entry), undo the first insert
        if (DB::$pdo->inTransaction()) {
            DB::$pdo->rollBack();
        }
        throw $e;
    }
}
}