<?php

namespace App\Services\Comment\Insert;

class InsertCommentRequest
{
    private int $apartment_id;
    private string $name;
    private string $comment;

    public function __construct(int $apartment_id, string $name, string $comment)
    {
        $this->apartment_id = $apartment_id;
        $this->name = $name;
        $this->comment = $comment;
    }

    public function getApartmentId(): int
    {
        return $this->apartment_id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getComment(): string
    {
        return $this->comment;
    }


}