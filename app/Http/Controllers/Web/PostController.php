<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use App\Repositories\Post\PostRepository;
use Carbon\Carbon;

class PostController extends Controller
{
    protected $repository;

    public function __construct(PostRepository $repository)
    {
        $this->repository = $repository;
    }

    /*----Get All Posts Controller Method----*/
    public function index()
    {
        $posts = $this->repository->all();
        return view("posts.index", ["posts" => $posts]);
    }

    /*----Show Create Post Form Controller Method----*/
    public function create()
    {
        return view("posts.create");
    }

    /*----Save Post Controller Method----*/
    public function store(StorePostRequest $request)
    {
        $postData = $request->all();
        $postData["user_id"] = auth()->user()->id;

        $this->repository->store($postData);

        return redirect(route("posts.index"));
    }

    /*----Get Single Post Controller Method----*/
    public function show(Post $post)
    {
        return view("posts.show", ["post" => $post]);
    }

    /*----Show Edit Post Form Controller Method----*/
    public function edit(Post $post)
    {
        return view("posts.edit", ["post" => $post]);
    }

    /*----Update Post Controller Method----*/
    public function update(UpdatePostRequest $request, Post $post)
    {
        $this->repository->update($request->all(), $post);

        return redirect(route("posts.index"));
    }

    /*----Delete Post Controller Method----*/
    public function destroy(Post $post)
    {
        $this->repository->delete($post);

        return redirect(route("posts.index"));
    }
}
