<?php

use App\Http\Controllers\Web\CommentsController;
use App\Http\Controllers\Web\PostController;
use App\Http\Controllers\Web\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get("/", function () {
    return redirect(route("posts.index"));
});

/*-----Requiring AUTH routes-----*/
require __DIR__ . "/auth.php";

/*-----Posts routes-----*/
Route::resource("/posts", PostController::class)->middleware([
    "auth",
    "verified",
]);

/*-----Comments routes-----*/
Route::middleware(["auth", "verified"])->group(function () {
    Route::post("/posts/{post}/comment", [
        CommentsController::class,
        "store",
    ])->name("comments.store");

    Route::delete("/posts/comments/{comment}", [
        CommentsController::class,
        "destroy",
    ])->name("comments.destroy");
});
