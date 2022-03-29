<?php

namespace App\Repositories\Comment;

interface CommentRepository
{
    public function all(): array;
    public function insert($apartment_id, $name, $comment): void;
    public function deleteById(array $vars): void;
}