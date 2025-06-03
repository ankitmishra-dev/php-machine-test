<?php

define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'students_crud');
define('DB_USER', 'root');
define('DB_PASS', '');

try {
    $connectionString = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME;
    $conn = new PDO($connectionString, DB_USER, DB_PASS);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}