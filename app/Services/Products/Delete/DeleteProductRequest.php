<?php

namespace App\Services\Products\Delete;

class DeleteProductRequest
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