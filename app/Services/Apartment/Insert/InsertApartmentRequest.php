<?php

namespace App\Services\Apartment\Insert;

class InsertApartmentRequest
{
    private string $title;
    private string $description;
    private string $address;
    private string $arrival;
    private string $departure;
    private string $booked;

    public function __construct(string $title, string $description, string $address, string $arrival, string $departure, string $booked)
    {
        $this->title = $title;
        $this->description = $description;
        $this->address = $address;
        $this->arrival = $arrival;
        $this->departure = $departure;
        $this->booked = $booked;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDescription(): string
    {
        return $this->description;
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

    public function getBooked(): string
    {
        return $this->booked;
    }

}