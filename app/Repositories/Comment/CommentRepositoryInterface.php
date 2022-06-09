<?php

namespace App\Repositories\Comment;

interface CommentRepositoryInterface
{
    public function store(array $attributes);
    public function delete($comment);
}
