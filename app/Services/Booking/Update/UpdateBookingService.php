<?php

namespace App\Services\Booking\Update;

use App\Repositories\Booking\BookingRepository;
use App\Repositories\Booking\PdoBookingRepository;

class UpdateBookingService
{
    private BookingRepository $repo;

    public function __construct()
    {
        $this->repo = new PdoBookingRepository();
    }

    public function execute(UpdateBookingRequest $request)
    {
        $this->repo->updateId($request->getName(), $request->getAddress(), $request->getArrival(), $request->getDeparture(), $request->getApartmentId());
    }
}