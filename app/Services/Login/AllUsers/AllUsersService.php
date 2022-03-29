<?php

namespace App\Services\Login\AllUsers;

use App\Models\User;
use App\Repositories\Login\LoginRepository;
use App\Repositories\Login\PdoLoginRepository;

class AllUsersService
{
    private LoginRepository $loginRepository;

    public function __construct()
    {
        $this->loginRepository = new PdoLoginRepository();
    }

    public function execute(AllUsersRequest $request): User
    {
        return $this->loginRepository->allUsers($request->getUid(), $request->getPassword());
    }
}