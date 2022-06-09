<?php

namespace App\Repositories\Post;

use App\Models\Post;

class PostRepository implements PostRepositoryInterface
{
    public function all()
    {
        return Post::orderBy("updated_at", "desc")->paginate(5);
    }

    public function find($id)
    {
        // TODO: Implement find() method.
        return Post::find($id);
    }

    public function store(array $attributes)
    {
        // TODO: Implement store() method.
        Post::create($attributes);
    }

    public function update(array $attributes, $post)
    {
        // TODO: Implement update() method.
        return $post->update($attributes);
    }

    public function delete($post)
    {
        // TODO: Implement delete() method.

        $post->delete();
    }
}
