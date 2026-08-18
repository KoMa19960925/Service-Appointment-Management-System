<?php

use App\Http\Controllers\Customer\AuthController;
use App\Http\Controllers\Customer\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('loginpage');
});

Route::get('/register', [AuthController::class, 'register'])->name('registerpage');
Route::post('/registerstore', [AuthController::class, 'registerstore'])->name('registerstore');
Route::get('/login', [AuthController::class, 'login'])->name('loginpage');
Route::post('/loginstore', [AuthController::class, 'loginstore'])->name('loginstore');
Route::post('/logout', [AuthController::class, 'logout'])->name('logoutpage');





Route::middleware('auth')->group(function () {

    Route::get('/customer/dashboard', [DashboardController::class, 'customerDashboard'])
        ->middleware('role:customer')
        ->name('customer.dashboard');

});