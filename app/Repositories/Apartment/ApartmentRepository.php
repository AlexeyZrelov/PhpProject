<?php

namespace App\Repositories\Apartment;

interface ApartmentRepository
{
    public function insert($title, $description, $address, $arrival, $departure, $booked): void;
    public function allBookingDeparture($arrival): array;
}