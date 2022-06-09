<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Models\Comment;
use App\Models\Post;
use App\Repositories\Comment\CommentRepository;

class CommentsController extends Controller
{
    protected $repository;

    public function __construct(CommentRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
    }
    public function create()
    {
        //
    }

    public function store(StoreCommentRequest $request, Post $post)
    {
        $comment = $request->only("body");
        $comment["post_id"] = $post->id;
        $comment["user_id"] = auth()->user()->id;

        $this->repository->store($comment);

        //        $post->comment()->create($request->all());

        return redirect(route("posts.show", [$post]));
    }

    public function show(Comment $comment)
    {
        //
    }
    public function edit(Comment $comment)
    {
        //
    }
    public function update(UpdateCommentRequest $request, Comment $comment)
    {
        //
    }

    public function destroy(Comment $comment)
    {
        $this->repository->delete($comment);

        return redirect(route("posts.show", [$comment->post]));
    }
}
