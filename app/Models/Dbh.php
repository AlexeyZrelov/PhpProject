<?php

namespace App\Models;

use PDO;
use PDOException;

class Dbh
{
    public function connect()
    {
        try {
            $username = "root";
            $password = "root1234";
            $dbh = new PDO('mysql:host=localhost;dbname=phpproject', $username, $password);
            return $dbh;
        } catch (PDOException $e) {
            echo "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }
}