<?php

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
    return view('welcome');
});

Route::get("/hello", function () {
    return 'hello world';
});

Route::get("/student/{id}", function ($id, Request $req) {
    return response("<h1>student $id</h1>
    <h2>$req->name and $req->age</h2>
    ", 200)->header("Content-Type", "text/html");
})->where("id", "[0-9]+");
