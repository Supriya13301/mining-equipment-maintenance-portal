<?php
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'mining_tracker';
$conn = new mysqli($host, $user, $password, $database);
if ($conn->connect_error) {
    die("DB Connection failed: " . $conn->connect_error);
}
?>