<?php
namespace App;

use PDO;
use PDOException;

class DB {
    private static $conn;

    public static function connect() {
        if (!self::$conn) {
            try {
                self::$conn = new PDO("mysql:host=localhost;dbname=user_management", "root", "");
                self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("DB Connection failed: " . $e->getMessage());
            }
        }
        return self::$conn;
    }
}