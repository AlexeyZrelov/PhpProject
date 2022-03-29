<?php

namespace App\Services\Comment\Delete;

use App\Repositories\Comment\CommentRepository;
use App\Repositories\Comment\PdoCommentRepository;

class DeleteCommentService
{
    private CommentRepository $repo;

    public function __construct()
    {
        $this->repo = new PdoCommentRepository();
    }

    public function execute(DeleteCommentRequest $request)
    {
        $this->repo->deleteById($request->getVars());
    }
}