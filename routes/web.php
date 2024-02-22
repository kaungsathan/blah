<?php

use App\Http\Controllers\RegisteredUserController;
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


Route::get('/', fn() => redirect(route('registered-users.index')));

// For the demonstration purpose, I will just keep all the routes in web.php
Route::resource("/registered-users", RegisteredUserController::class)->only(["index", "create", "store"]);



