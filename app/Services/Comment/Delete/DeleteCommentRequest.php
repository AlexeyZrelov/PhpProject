<?php

namespace App\Services\Comment\Delete;

class DeleteCommentRequest
{
    private array $vars = [];

    public function __construct(array $vars)
    {
        $this->vars = $vars;
    }

    public function getVars(): array
    {
        return $this->vars;
    }

}