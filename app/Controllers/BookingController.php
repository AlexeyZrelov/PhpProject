<?php

namespace App\Controllers;

use App\Redirect;
use App\Repositories\Booking\PdoBookingRepository;
use App\Services\Booking\All\AllBookingRequest;
use App\Services\Booking\All\AllBookingService;
use App\Services\Booking\Price\PriceRequest;
use App\Services\Booking\Price\PriceService;
use App\Services\Booking\Update\UpdateBookingRequest;
use App\Services\Booking\Update\UpdateBookingService;
use App\View;
use App\Models\Dbh;
use Carbon\Carbon;
use PDO;

class BookingController
{
    public function index(array $vars): View
    {

        $arrival = $_POST['arrival'] ?? null;
        $departure = $_POST['departure'] ?? null;

        $srv = new AllBookingService();
        $result = $srv->execute(new AllBookingRequest($vars));

        $interval = Carbon::parse($arrival)->diffInDays($departure);

        $prc = new PriceService();
        $price = $prc->execute(new PriceRequest($vars));
        $total = $interval * $price;

        return new View('Booking/index.html', [

            'arrival' => $arrival,
            'departure' => $departure,
            'total' => $total,
            'results' => $result

        ]);
    }

    public function save(): View
    {
        $arrival = $_POST['arrival'] ?? null;
        $departure = $_POST['departure'] ?? null;

        $up = new UpdateBookingService();
        $up->execute(new UpdateBookingRequest($_POST['name'], $_POST['address'], $arrival, $departure, $_POST['apartment_id']));

        return new View('Booking/comments.html', [

            'apartment_id' => $_POST['apartment_id'],
            'name' =>  $_POST['name'],
            'address' => $_POST['address'],
            'arrival' => $arrival,
            'departure' => $departure,
            'total' => $_POST['booked']

        ]);

    }

//    public function delete(array $vars): Redirect
//    {
//        $stmt = (new Dbh())->connect()->prepare('DELETE FROM booking WHERE apartment_id=? AND arrival = ?');
//        $stmt->execute([$vars['id'], $_POST['arrival']]);
//
//        return new Redirect('/apartment/search');
//    }

}