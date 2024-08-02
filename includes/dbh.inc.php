<?php

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$dsn = "mysql:host=" . $_ENV['DB_HOST'] . ";dbname=" . $_ENV['DB_DATABASE'];
$dbusername = $_ENV['DB_USERNAME'];
$dbpassword = $_ENV['DB_PASSWORD'];

try {
    $pdo = new PDO($dsn, $dbusername, $dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Check if the users table exists, and create it if it doesn't
    $query = "CREATE TABLE IF NOT EXISTS users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(50) NOT NULL,
        surname VARCHAR(50) NOT NULL,
        username VARCHAR(30) NOT NULL UNIQUE,
        pwd VARCHAR(255) NOT NULL,
        email VARCHAR(100) NOT NULL UNIQUE,
        `created_at` DATETIME NOT NULL DEFAULT curtime()
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;";

    $pdo->exec($query);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
