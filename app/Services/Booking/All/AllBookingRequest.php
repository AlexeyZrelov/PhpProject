<?php

namespace App\Services\Booking\All;

class AllBookingRequest
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