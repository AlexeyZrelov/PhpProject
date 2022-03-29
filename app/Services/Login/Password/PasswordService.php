<?php

namespace App\Services\Login\Password;

use App\Repositories\Login\LoginRepository;
use App\Repositories\Login\PdoLoginRepository;

class PasswordService
{
    private LoginRepository $loginRepository;

    public function __construct()
    {
        $this->loginRepository = new PdoLoginRepository();
    }

    public function execute(PasswordRequest $request): bool
    {
        return $this->loginRepository->password($request->getUid(), $request->getPwd());
    }
}