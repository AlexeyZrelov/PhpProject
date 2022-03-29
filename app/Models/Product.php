<?php

namespace App\Models;

class Product
{
    private string $name;
    private string $description;
    private float $price;
    private int $amount;
    private string $date;

    public function __construct(string $name, string $description, float $price, int $amount, string $date)
    {
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->amount = $amount;
        $this->date = $date;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getAmount(): int
    {
        return $this->amount;
    }

    public function getDate(): string
    {
        return $this->date;
    }


}