<?php
$host = 'db-697098fa1e7e1babe3943369';
$db   = 'app';
$user = 'admin';
$pass = '2ab7ff85ad29c37722ce4990';
$port = 0;

$dsn = "pgsql:host=$host;port=$port;dbname=$db";

try {
     $pdo = new PDO($dsn, $user, $pass, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
     echo "Connected successfully";
} catch (\PDOException $e) {
     throw new \PDOException($e->getMessage(), (int)$e->getCode());
}


