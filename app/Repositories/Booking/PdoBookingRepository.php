<?php

namespace App\Repositories\Booking;

use App\Models\Dbh;
use PDO;

class PdoBookingRepository implements BookingRepository
{
    public function allId(array $vars): array
    {
        $id = (int)$vars['id'];

        $stmt1 = (new Dbh())->connect()->prepare('SELECT * FROM apartment WHERE id = ?');
        $stmt1->execute([$id]);
        return $stmt1->fetchAll(PDO::FETCH_ASSOC);
    }

    public function priceId(array $vars): string
    {
        $id = (int)$vars['id'];

        $stmt1 = (new Dbh())->connect()->prepare('SELECT * FROM apartment WHERE id = ?');
        $stmt1->execute([$id]);
        $arr = $stmt1->fetchAll(PDO::FETCH_ASSOC);
        return $arr[0]['booked'];
    }

    public function updateId($name, $address, $arrival, $departure, $apartment_id): void
    {
//        $arrival = $_POST['arrival'] ?? null;
//        $departure = $_POST['departure'] ?? null;

        $stmt = (new Dbh())->connect()->prepare('UPDATE booking SET name=?, address=?, arrival=?, departure=? WHERE apartment_id=?');

        $stmt->execute([$name, $address, $arrival, $departure, $apartment_id]);
    }

}