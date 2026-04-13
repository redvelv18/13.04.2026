<?php

$servername = "192.168.208.1";
$username = "store_app";
$password = "password";
$dbname = "store_dev_diegosterling";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";