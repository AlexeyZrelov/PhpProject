<?php

namespace App\Services\Login\Password;

class PasswordRequest
{
    private string $uid;
    private string $pwd;

    public function __construct(string $uid, string $pwd)
    {
        $this->uid = $uid;
        $this->pwd = $pwd;
    }

    public function getPwd(): string
    {
        return $this->pwd;
    }

    public function getUid(): string
    {
        return $this->uid;
    }


}