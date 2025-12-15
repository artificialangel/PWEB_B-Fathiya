<?php
$host = "localhost";
$port = "3307";                 // 🔴 REQUIRED
$db   = "pendaftaransiswa";
$user = "root";
$pass = "root";                 // your confirmed password

try {
    $pdo = new PDO(
        "mysql:host=$host;port=$port;dbname=$db;charset=utf8mb4",
        $user,
        $pass,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_EMULATE_PREPARES => false,
        ]
    );
    echo "DB CONNECTED SUCCESSFULLY";
} catch (PDOException $e) {
    die("DB CONNECTION FAILED: " . $e->getMessage());
}
