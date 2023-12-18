<?php

use App\Http\Controllers\PostController;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('layout', [
        "heading" => "Users",
        "posts" => Post::all()
    ]);
});

Route::get("/posts", [PostController::class, "index"]);

Route::post("/posts", [PostController::class, "store"]);

Route::get('/posts/create', [PostController::class, "create"]);

Route::get('/posts/{post}/edit', [PostController::class, 'edit']);

Route::put('/posts/{post}', [PostController::class, 'update']);

Route::delete('/posts/{post}', [PostController::class, 'destroy']);

Route::get("/posts/{post}", [PostController::class, "show"]);
