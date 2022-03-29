<?php

namespace App\Services\Apartment\Insert;

use App\Repositories\Apartment\ApartmentRepository;
use App\Repositories\Apartment\PdoApartmentRepository;

class InsertApartmentService
{
    private ApartmentRepository $repo;

    public function __construct()
    {
        $this->repo = new PdoApartmentRepository();
    }

    public function execute(InsertApartmentRequest $request)
    {
        $this->repo->insert($request->getTitle(), $request->getDescription(), $request->getAddress(), $request->getArrival(), $request->getDeparture(), $request->getBooked());
    }
}