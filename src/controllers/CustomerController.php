<?php

require_once __DIR__ . '/../models/Customer.php';

class CustomerController
{
    public static function index()
    {
        $withOrders = $_GET['with-orders'] ?? '';

        if ($withOrders === 'full') {
            // Use the Model to get data
            $rows = Customer::getAllWithOrders();

            // The grouping logic remains in the controller (it's "formatting" the data)
            $customers = [];
            foreach ($rows as $row) {
                $id = $row['client_id'];
                if (!isset($customers[$id])) {
                    $customers[$id] = [
                        'client_id' => $id,
                        'name'      => $row['name'],
                        'email'     => $row['email'],
                        'orders'    => []
                    ];
                }
                if (!empty($row['order_id'])) {
                    $customers[$id]['orders'][] = [
                        'id'     => $row['order_id'],
                        'date'   => $row['order_date'],
                        'status' => $row['status']
                    ];
                }
            }
            require __DIR__ . '/../views/customers_full.php';
        } else {
            // Use the Model to get data
            $customers = Customer::getAll();
            require __DIR__ . '/../views/customers.php';
        }
    }
}