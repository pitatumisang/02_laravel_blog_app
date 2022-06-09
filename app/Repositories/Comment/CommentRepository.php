<?php

namespace App\Repositories\Comment;

use App\Models\Comment;

class CommentRepository implements CommentRepositoryInterface
{
    public function store(array $attributes)
    {
        // TODO: Implement store() method.
        Comment::create($attributes);
    }

    public function delete($comment)
    {
        // TODO: Implement delete() method.
        $comment->delete();
    }
}
