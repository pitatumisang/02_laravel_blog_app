<?php
namespace App\Repositories\Post;

interface PostRepositoryInterface
{
    public function all();
    public function find($id);
    public function store(array $attributes);
    public function update(array $attributes, $post);
    public function delete($post);
}
