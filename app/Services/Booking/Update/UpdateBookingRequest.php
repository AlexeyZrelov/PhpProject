<?php

namespace App\Services\Booking\Update;

class UpdateBookingRequest
{
    private string $name;
    private string $address;
    private string $arrival;
    private string $departure;
    private string $apartment_id;

    public function __construct(string $name, string $address, string $arrival, string $departure, string $apartment_id)
    {
        $this->name = $name;
        $this->address = $address;
        $this->arrival = $arrival;
        $this->departure = $departure;
        $this->apartment_id = $apartment_id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function getArrival(): string
    {
        return $this->arrival;
    }

    public function getDeparture(): string
    {
        return $this->departure;
    }

    public function getApartmentId(): string
    {
        return $this->apartment_id;
    }


}