<?php

namespace App\Services\Comment\All;

use App\Repositories\Comment\CommentRepository;
use App\Repositories\Comment\PdoCommentRepository;

class AllCommentService
{
    private CommentRepository $repo;

    public function __construct()
    {
        $this->repo = new PdoCommentRepository();
    }

    public function execute(AllCommentRequest $request): array
    {
        return $this->repo->all();
    }
}