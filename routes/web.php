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

    Route::get('/customer/dashboard',[DashboardController::class, 'customerDashboard'])->middleware('role:customer')->name('Customer.dashboard');
    Route::get('/customer/services',[DashboardController::class, 'services'])->middleware('role:customer')->name('Customer.services');
    Route::get('/customer/requests',[DashboardController::class, 'requests'])->middleware('role:customer')->name('Customer.requests');
    Route::get('/customer/appointments',[DashboardController::class, 'appointments'])->middleware('role:customer')->name('Customer.appointments');
    Route::get('/customer/history',[DashboardController::class, 'history'])->middleware('role:customer')->name('Customer.history');
    Route::get('/customer/feedback',[DashboardController::class, 'feedback'])->middleware('role:customer')->name('Customer.feedback');
    Route::get('/customer/request/create',[DashboardController::class, 'createRequest'])->middleware('role:customer')->name('Customer.request.create');
    Route::post('/customer/request/store',[DashboardController::class, 'storeRequest'])->middleware('role:customer')->name('Customer.request.store');

});


