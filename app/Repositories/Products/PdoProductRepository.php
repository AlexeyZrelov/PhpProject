<?php

namespace App\Repositories\Products;

use App\Models\Dbh;
use PDO;

class PdoProductRepository implements ProductRepository
{
    public function add($name, $description, $price, $amount, $date): void
    {
        $stmt = (new Dbh())->connect()->prepare('INSERT INTO products (name, description, price, amount, date) VALUES (?, ?, ?, ?, ?)');

        $stmt->execute([$name, $description, $price, $amount, $date]);
    }

    public function all(): array
    {
        $stmt1 = (new Dbh())->connect()->prepare('SELECT * FROM products');
        $stmt1->execute();
        return $stmt1->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteById(array $vars): void
    {
        $id = (int)$vars['id'];
        $stmt = (new Dbh())->connect()->prepare('DELETE FROM products WHERE id=?');
        $stmt->execute([$id]);
    }

    public function buyId(array $vars): array
    {
        $id = (int)$vars['id'];

        $stmt1 = (new Dbh())->connect()->prepare('SELECT * FROM products WHERE id = ?');
        $stmt1->execute([$id]);
        return $stmt1->fetchAll(PDO::FETCH_ASSOC);
    }
}