<?php
require_once __DIR__ . '/../models/Customer.php';
require_once __DIR__ . '/../models/Order.php';

class HomeController
{
    public static function index()
    {
        $customerCount = Customer::getCount();
        $orderCount = Order::getCount();
        
        require __DIR__ . '/../views/home.php';
    }
}