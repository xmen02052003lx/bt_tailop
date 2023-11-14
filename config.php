<?php
$host = 'your_database_host';
$user = 'your_database_user';
$pass = 'your_database_password';
$db   = 'your_database_name';

$conn = new mysqli("localhost", "root", "", "bt_tailop_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
