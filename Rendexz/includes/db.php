<?php
$host = 'localhost';
$db   = 'elearnpro';
$user = 'root';       // use your DB username
$pass = '';           // use your DB password
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

try {
  $pdo = new PDO($dsn, $user, $pass);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (\PDOException $e) {
  die("Database connection failed: " . $e->getMessage());
}
?>
