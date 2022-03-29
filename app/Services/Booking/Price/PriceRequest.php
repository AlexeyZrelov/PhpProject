<?php

namespace App\Services\Booking\Price;

class PriceRequest
{
    private array $vars = [];

    public function __construct(array $vars)
    {
        $this->vars = $vars;
    }

    public function getVars(): array
    {
        return $this->vars;
    }
}