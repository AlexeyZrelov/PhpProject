<?php

namespace App\Services\Comment\Insert;

use App\Repositories\Comment\CommentRepository;
use App\Repositories\Comment\PdoCommentRepository;

class InsertCommentService
{
    private CommentRepository $repo;

    public function __construct()
    {
        $this->repo = new PdoCommentRepository();
    }

    public function execute(InsertCommentRequest $request)
    {
        $this->repo->insert($request->getApartmentId(), $request->getName(), $request->getComment());
    }
}