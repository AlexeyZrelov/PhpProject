<?php

namespace App\Services\Login\AllUsersPassword;

use App\Models\User;
use App\Repositories\Login\LoginRepository;
use App\Repositories\Login\PdoLoginRepository;

class AllUsersPasswordService
{
    private LoginRepository $loginRepository;

    public function __construct()
    {
        $this->loginRepository = new PdoLoginRepository();
    }

    public function execute(AllUsersPasswordRequest $request): User
    {
        return $this->loginRepository->allUsersPassword($request->getUid(), $request->getPassword());
    }
}