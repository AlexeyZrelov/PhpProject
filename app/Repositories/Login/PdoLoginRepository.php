<?php

namespace App\Repositories\Login;

use App\Models\Dbh;
use App\Models\User;
use PDO;

class PdoLoginRepository implements LoginRepository
{

    public function allUsers($uid, $pwd): User
    {
        $stmt = (new Dbh())->connect()->prepare("SELECT * FROM users WHERE uid = ? OR password = ?");
        $stmt->execute(array($uid, $pwd));
        $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return new User($arr[0]['id'], $arr[0]['uid'], $arr[0]['email'], $arr[0]['password'], $arr[0]['created_at']);
    }

    public function allUsersPassword($uid, $pwd): User
    {
        $stmt1 = (new Dbh())->connect()->prepare('SELECT * FROM users WHERE uid = ? AND password = ?');
        $stmt1->execute([$uid, $pwd]);
        $arr = $stmt1->fetchAll(PDO::FETCH_ASSOC);

        return new User($arr[0]['id'], $arr[0]['uid'], $arr[0]['email'], $arr[0]['password']);
    }

    public function allApartment(): array
    {
        $stmt3 = (new Dbh())->connect()->prepare('SELECT * FROM apartment');
        $stmt3->execute();
        return $stmt3->fetchAll(PDO::FETCH_ASSOC);
    }

    public function password(): bool
    {
        $stmt = (new Dbh())->connect()->prepare('SELECT password FROM users WHERE uid = ?');

        $stmt->execute(array($_POST['uid']));
//        $stmt->execute(array($uid));
        $pwdHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return password_verify($_POST['pwd'], $pwdHashed[0]["password"]);
//        return password_verify($pwd, $pwdHashed[0]["password"]);
    }

    public function insert($pwd): void
    {
        $pwd ??= null;
        $stmt = (new Dbh())->connect()->prepare('INSERT INTO users (uid, email, password, created_at) VALUES (?, ?, ?, NOW())');
        $stmt->execute([$_POST['uid'], $_POST['email'], $pwd]);
    }
}