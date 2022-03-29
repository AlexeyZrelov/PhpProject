<?php

namespace App\Services\Products\Buy;

class BuyProductRequest
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