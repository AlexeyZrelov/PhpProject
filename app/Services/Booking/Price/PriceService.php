<?php

namespace App\Services\Booking\Price;

use App\Repositories\Booking\BookingRepository;
use App\Repositories\Booking\PdoBookingRepository;

class PriceService
{
    private BookingRepository $repo;

    public function __construct()
    {
        $this->repo = new PdoBookingRepository();
    }

    public function execute(PriceRequest $request): string
    {
        return $this->repo->priceId($request->getVars());
    }
}