<?php

namespace App\Services\Apartment\All;

class AllApartmentRequest
{
    private string $arrival;

    public function __construct(string $arrival)
    {
        $this->arrival = $arrival;
    }

    public function getArrival(): string
    {
        return $this->arrival;
    }
}