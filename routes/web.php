<?php

use App\Http\Controllers\LoginController;
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

Route::middleware(['guest'])->group(function () {
    // all the routes that need to be shown when the user is not logged in
    Route::get('/', [LoginController::class, 'showLoginForm']);
});

Route::middleware(['auth'])->group(function () {
   // all the routes that need to be shown when the user is logged in
});
