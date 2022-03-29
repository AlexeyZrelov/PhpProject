<?php

namespace App\Controllers;

use App\Redirect;
use App\Repositories\Login\PdoLoginRepository;
use App\Services\Login\AllUsers\AllUsersRequest;
use App\Services\Login\AllUsers\AllUsersService;
use App\Services\Login\AllUsersPassword\AllUsersPasswordService;
use App\View;
use App\Models\Dbh;
use PDO;

class LoginController
{

    public function index(): View
    {
        return new View('Login/index.html');
    }

    public function signup()
    {
        $login = new PdoLoginRepository();

        if (!empty($_POST['uid']) && !empty($_POST['email']) && !empty($_POST['pwd'])) {

            $pwd = password_hash($_POST['pwd'], PASSWORD_DEFAULT);

            $login->insert($pwd);
            $user = $login->allUsersPassword($_POST['uid'], $pwd);

//            session_start();
            $_SESSION['user_id'] = $user->getId();
            $_SESSION['log_name'] = $user->getUid();
            $_SESSION['email'] = $user->getEmail();
            $_SESSION['password'] = $user->getEmail();

            return new View('Login/main.html', [
//
//                'uid' => $_POST['uid'],
//                'email' => $_POST['email']

                'uid' => $_SESSION['log_name'],
                'email' => $_SESSION['email']

            ]);

        }

        return new Redirect('/login');

    }

    public function login()
    {
        $login = new PdoLoginRepository();
        $checkPwd = $login->password();

        if ($checkPwd == false) {
            $checkPwd = null;
            return new Redirect('/login');

        } else {

//            $user = $login->allUsers();

            $u = new AllUsersService();
            $user = $u->execute(new AllUsersRequest($_POST['uid'], $_POST['pwd']));

            $_SESSION['user_id'] = $user->getId();
            $_SESSION['log_name'] = $user->getUid();
            $_SESSION['email'] = $user->getEmail();
            $_SESSION['password'] = $user->getPassword();
            $_SESSION['created_at'] = $user->getCreatedAt();

            $allApartment = $login->allApartment();

            return new View('Login/main.html', [

                'id' => $_SESSION['user_id'],
                'uid' => $_SESSION['log_name'],
                'email' => $_SESSION['email'],
                'date' => $_SESSION['created_at'],
                'apartments' => $allApartment

            ]);

        }
    }

}