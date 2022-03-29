<?php

namespace App\Services\Booking\All;

use App\Repositories\Booking\BookingRepository;
use App\Repositories\Booking\PdoBookingRepository;

class AllBookingService
{
    private BookingRepository $repo;

    public function __construct()
    {
        $this->repo = new PdoBookingRepository();
    }

    public function execute(AllBookingRequest $request): array
    {
        return $this->repo->allId($request->getVars());
    }
}