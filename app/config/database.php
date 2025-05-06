<?php
namespace Tegarsatria\trackrecord\FoxMind\config;

use PDO;
use PDOException;

class Database {
    private static ?PDO $pdo = null;

    public static function connect(): PDO {
        if (self::$pdo === null) {
            $host = 'localhost';
            $dbname = 'trackrecord';
            $username = 'root';
            $password = ''; // ganti kalau kamu pakai password

            try {
                self::$pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password, [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
                ]);
            } catch (PDOException $e) {
                die("Koneksi gagal: " . $e->getMessage());
            }
        }

        return self::$pdo;
    }
}
