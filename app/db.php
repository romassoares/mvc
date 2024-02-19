<?php

namespace App;

use PDO;
use PDOException;
use Exception;

class DB
{
    static function conection()
    {
        try {
            $conn = new PDO('mysql:host=localhost;dbname=testing', 'root', '12345678');
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $e) {
            throw new Exception('Database Connection Error: ' . $e->getMessage());
        }
    }
}
