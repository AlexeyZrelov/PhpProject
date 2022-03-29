<?php

namespace App\Repositories\Apartment;

use App\Models\Dbh;
use PDO;

class PdoApartmentRepository implements ApartmentRepository
{
    public function insert($title, $description, $address, $arrival, $departure, $booked): void
    {
        $stmt = (new Dbh())->connect()->prepare('INSERT INTO apartment (title, description, address, arrival, departure, booked) VALUES (?, ?, ?, ?, ?, ?)');

        $stmt->execute([$title, $description, $address, $arrival, $departure, $booked]);
    }

    public function allBookingDeparture($arrival): array
    {

        $stmt1 = (new Dbh())->connect()->prepare('SELECT * FROM booking WHERE departure <= ?');
        $stmt1->execute(array($arrival));
        $result1 = $stmt1->fetchAll(PDO::FETCH_ASSOC);

        $stmt2 = (new Dbh())->connect()->prepare('SELECT * FROM apartment WHERE id = ?');

        $result = [];
        foreach ($result1 as $v) {
            $stmt2->execute(array($v['apartment_id']));
            $result[] = $stmt2->fetchAll(PDO::FETCH_ASSOC)[0];
        }

        return $result;
    }

}