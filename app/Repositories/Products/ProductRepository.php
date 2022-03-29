<?php

namespace App\Repositories\Products;

interface ProductRepository
{
    public function add($name, $description, $price, $amount, $date): void;
    public function all(): array;
    public function deleteById(array $vars): void;
    public function buyId(array $vars): array;
}