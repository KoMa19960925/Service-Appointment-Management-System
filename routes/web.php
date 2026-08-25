<?php

use App\Http\Controllers\Admin\AdmindashboardController;
use App\Http\Controllers\Admin\AssignedtechnicianController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Customer\DashboardController;
use App\Http\Controllers\Customer\ServicerequController;
use App\Http\Controllers\Technician\TechniciandashboardController;
use App\Models\Technician;
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
    Route::get('/customer/Technicianassigned',[DashboardController::class, 'Technicianassigned'])->middleware('role:customer')->name('Customer.Technicianassigned');
    Route::get('/customer/Servicehistory',[DashboardController::class, 'Servicehistory'])->middleware('role:customer')->name('Customer.Servicehistory');
    Route::get('/customer/feedback',[DashboardController::class, 'feedback'])->middleware('role:customer')->name('Customer.feedback');   
    Route::get('/customer/request/create',[ServicerequController::class, 'createRequest'])->middleware('role:customer')->name('Customer.request.create');
    Route::post('/customer/request/store',[ServicerequController::class, 'storeRequest'])->middleware('role:customer')->name('Customer.request.store');
    Route::get('/customer/requests',[ServicerequController::class, 'requests'])->middleware('role:customer')->name('Customer.requests');
    Route::get('/customer/request/{id}/edit',[ServicerequController::class, 'editRequest'])->middleware('role:customer')->name('requests.edit');
    Route::put('/customer/request/{id}',[ServicerequController::class, 'updateRequest'])->middleware('role:customer')->name('requests.update');
    Route::delete('/customer/request/{id}',[ServicerequController::class, 'deleteRequest'])->middleware('role:customer')->name('requests.delete');




    Route::get('/admin/dashboard',[AdmindashboardController::class, 'AdminDashboard'])->middleware('role:admin')->name('Admin.dashboard');
    Route::get('/admin/technician-details',[AdmindashboardController::class, 'Techniciandetails'])->middleware('role:admin')->name('Admin.Techniciandetails');
    Route::get('/admin/customer-service-requests',[AdmindashboardController::class, 'Customerservicerequests'])->middleware('role:admin')->name('Admin.Customerservicerequests');
    Route::get('/admin/technician-assigned',[AdmindashboardController::class, 'Technicianassigned'])->middleware('role:admin')->name('Admin.TechnicianAssigned');
    Route::get('/admin/service-history',[AdmindashboardController::class, 'Servicehistory'])->middleware('role:admin')->name('Admin.Servicehistory');
    Route::get('/admin/customer-feedback',[AdmindashboardController::class, 'Customerfeedback'])->middleware('role:admin')->name('Admin.Customerfeedback');
    
    
    Route::post('/admin/technician/store',[AdmindashboardController::class, 'storeTechnician'])->middleware('role:admin')->name('Admin.technician.store');
    Route::get('/admin/technician/create',[AdmindashboardController::class, 'createtechnician'])->middleware('role:admin')->name('Admin.createtechnician');
    Route::get('/admin/technician/Createtechnicianassigned',[AssignedtechnicianController::class, 'Createtechnicianassigned'])->middleware('role:admin')->name('Admin.Createtechnicianassigned');
    Route::get('/admin/technician-assigned',[AssignedtechnicianController::class, 'TechnicianAssigned'])->middleware('role:admin')->name('Admin.TechnicianAssigned');
    Route::post('/admin/technician-assigned/{id}',[AssignedtechnicianController::class, 'assignTechnician'])->middleware('role:admin')->name('Admin.assignTechnician');
    Route::put( '/admin/technician-assigned/status/{id}',[AssignedtechnicianController::class, 'updateStatus'])->middleware('role:admin')->name('Admin.updateTechnicianStatus');



    Route::get('/Technician/dashboard',[TechniciandashboardController::class, 'TechnicianDashboard'])->middleware('role:technician')->name('Technician.dashboard');
          





});










