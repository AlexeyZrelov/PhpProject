<?php

namespace App\Repositories\Login;

use App\Models\User;

interface LoginRepository
{
    public function insert($pwd): void;
    public function allUsers($uid, $pwd): User;
    public function allUsersPassword($uid, $pwd): User;
    public function allApartment(): array;
    public function password(): bool;
}