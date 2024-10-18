<?php

use App\Http\Controllers\AuthController;
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

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);


Route::middleware(['guest'])->group(function () {
    Route::get('/login', function () {
        return view('login', [
            "title" => "login"
        ]);
    });
    Route::get('/register', function () {
        return view('register', ['title' => 'Register']);
    });
});

Route::middleware(['auth.jwt'])->group(function () {
    Route::get('/', function () {
        return view('home', [
            "title" => "Home"
        ]);
    });
    Route::post('logout', [AuthController::class, 'logout']);
});
