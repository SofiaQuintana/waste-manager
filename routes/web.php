<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\WasteIncomeController;
use App\Http\Controllers\WasteInventoryController;
use App\Models\WasteInventory;
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
    Route::get('/', [AuthController::class, 'showLoginForm'])->name('root');

    Route::post('/login', [AuthController::class, 'login'])->name('login');


});

Route::middleware(['auth'])->group(function () {
    // all the routes that need to be shown when the user is logged in

    // redirection to the home page
    Route::get('/home', [HomeController::class,'index'])->name('home');
    // employee logout
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::resource('/employee', EmployeeController::class);
    Route::resource('/waste-inventory', WasteInventoryController::class); 
    Route::resource('/waste-income', WasteIncomeController::class);
    
});
