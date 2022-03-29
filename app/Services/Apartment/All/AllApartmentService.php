<?php

namespace App\Services\Apartment\All;

use App\Repositories\Apartment\ApartmentRepository;
use App\Repositories\Apartment\PdoApartmentRepository;

class AllApartmentService
{
    private ApartmentRepository $repo;

    public function __construct()
    {
        $this->repo = new PdoApartmentRepository();
    }

    public function execute(AllApartmentRequest $request): array
    {
        return $this->repo->allBookingDeparture($request->getArrival());
    }
}