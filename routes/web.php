<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Routing\RouteRegistrar;
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

Route::post("/posts", [PostController::class, "store"])->middleware('auth');

Route::get('/posts/create', [PostController::class, "create"])->middleware('auth');

Route::get('/posts/posts-manage', [PostController::class, 'manage'])->middleware('auth');


Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->middleware('auth');

Route::put('/posts/{post}', [PostController::class, 'update'])->middleware('auth');

Route::delete('/posts/{post}', [PostController::class, 'destroy'])->middleware('auth');

Route::get("/posts/{post}", [PostController::class, "show"]);



Route::get('/register', [UserController::class, 'create'])->middleware('guest');

Route::post('/users', [UserController::class, 'store'])->middleware('guest');

Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

Route::post('/users/authenticate', [UserController::class, 'authenticate']);
