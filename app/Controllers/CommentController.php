<?php

namespace App\Controllers;

use App\Redirect;
use App\Repositories\Comment\PdoCommentRepository;
use App\Services\Comment\All\AllCommentRequest;
use App\Services\Comment\All\AllCommentService;
use App\Services\Comment\Delete\DeleteCommentRequest;
use App\Services\Comment\Delete\DeleteCommentService;
use App\Services\Comment\Insert\InsertCommentRequest;
use App\Services\Comment\Insert\InsertCommentService;
use App\View;
use App\Models\Dbh;
use PDO;

class CommentController
{
    public function index(): View
    {
        $srv = new AllCommentService();
        $result = $srv->execute(new AllCommentRequest());

        return new View('Comment/index.html', [

//            'apartment_id' => $_POST['uid'],
            'results' => $result

        ]);
    }

    public function save(): Redirect
    {
        $srv = new InsertCommentService();
        $srv->execute(new InsertCommentRequest($_POST['apartment_id'], $_POST['name'], $_POST['comment']));

        return new Redirect('/comments');
    }

    public function delete(array $vars): Redirect
    {
        $srv = new DeleteCommentService();
        $srv->execute(new DeleteCommentRequest($vars));

        return new Redirect('/comments');
    }

}