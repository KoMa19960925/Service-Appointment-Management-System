<?php

use App\Http\Controllers\Admin\AdmindashboardController;
use App\Http\Controllers\Admin\AssignedtechnicianController;
use App\Http\Controllers\Admin\TechnicianPaymentController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Customer\DashboardController;
use App\Http\Controllers\Customer\ServicerequController;
use App\Http\Controllers\Technician\TechniciandashboardController;
use App\Models\Technician;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('Main.home');
})->name('home');

Route::get('/about', function () {
    return view('Main.about');
})->name('about');


// Route::get('/login', function () {
//     return redirect()->route('loginpage');
// });

Route::get('/register', [AuthController::class, 'register'])->name('registerpage');
Route::post('/registerstore', [AuthController::class, 'registerstore'])->name('registerstore');
Route::get('/login', [AuthController::class, 'login'])->name('loginpage');
Route::post('/loginstore', [AuthController::class, 'loginstore'])->name('loginstore');
Route::post('/logout', [AuthController::class, 'logout'])->name('logoutpage');







Route::middleware('auth')->group(function () {
    

    Route::get('/customer/dashboard',[DashboardController::class, 'customerDashboard'])->middleware('role:customer')->name('Customer.dashboard');
    Route::get('/customer/services',[DashboardController::class, 'services'])->middleware('role:customer')->name('Customer.services');
    Route::get('/customer/Servicehistory',[DashboardController::class, 'Servicehistory'])->middleware('role:customer')->name('Customer.Servicehistory');
    Route::get('/customer/feedback',[DashboardController::class, 'feedback'])->middleware('role:customer')->name('Customer.feedback');   
    Route::get('/customer/request/create',[ServicerequController::class, 'createRequest'])->middleware('role:customer')->name('Customer.request.create');
    Route::post('/customer/request/store',[ServicerequController::class, 'storeRequest'])->middleware('role:customer')->name('Customer.request.store');
    Route::get('/customer/requests',[ServicerequController::class, 'requests'])->middleware('role:customer')->name('Customer.requests');
    Route::get('/customer/request/{id}/edit',[ServicerequController::class, 'editRequest'])->middleware('role:customer')->name('requests.edit');
    Route::put('/customer/request/{id}',[ServicerequController::class, 'updateRequest'])->middleware('role:customer')->name('requests.update');
    Route::delete('/customer/request/{id}',[ServicerequController::class, 'deleteRequest'])->middleware('role:customer')->name('requests.delete');
    Route::get('/customer/Technicianassigned',[ServicerequController::class, 'Technicianassigned'])->middleware('role:customer')->name('Customer.Technicianassigned');
    Route::post('/customer/feedback/store',[DashboardController::class, 'storeFeedback'])->middleware('role:customer')->name('Customer.feedback.store');

    



    Route::get('/admin/dashboard',[AdmindashboardController::class, 'AdminDashboard'])->middleware('role:admin')->name('Admin.dashboard');
    Route::get('/admin/customer-service-requests',[AdmindashboardController::class, 'Customerservicerequests'])->middleware('role:admin')->name('Admin.Customerservicerequests');
    Route::get('/admin/customer-feedback',[AdmindashboardController::class, 'Customerfeedback'])->middleware('role:admin')->name('Admin.Customerfeedback');
    Route::get('/admin/service-history',[AdmindashboardController::class, 'Servicehistory'])->middleware('role:admin')->name('Admin.Servicehistory');
    Route::get('/admin/technician-details',[AdmindashboardController::class, 'Techniciandetails'])->middleware('role:admin')->name('Admin.Techniciandetails');
    Route::post('/admin/technician/store',[AdmindashboardController::class, 'storeTechnician'])->middleware('role:admin')->name('Admin.technician.store');
    Route::get('/admin/technician/create',[AdmindashboardController::class, 'createtechnician'])->middleware('role:admin')->name('Admin.createtechnician');
    Route::get('/admin/technician-assigned',[AssignedtechnicianController::class, 'TechnicianAssigned'])->middleware('role:admin')->name('Admin.TechnicianAssigned');
    Route::get('/admin/technician/Createtechnicianassigned',[AssignedtechnicianController::class, 'Createtechnicianassigned'])->middleware('role:admin')->name('Admin.Createtechnicianassigned');
    Route::post('/admin/technician-assigned/{id}',[AssignedtechnicianController::class, 'assignTechnician'])->middleware('role:admin')->name('Admin.assignTechnician');
    Route::put( '/admin/technician-assigned/status/{id}',[AssignedtechnicianController::class, 'updateStatus'])->middleware('role:admin')->name('Admin.updateTechnicianStatus');
    Route::get('/admin/technician-payments',[TechnicianPaymentController::class, 'index'])->middleware('role:admin')->name('Admin.TechnicianPayment');
    Route::get('/admin/technician-payment/create/{id}',[TechnicianPaymentController::class, 'create'])->middleware('role:admin')->name('Admin.CreateTechnicianPayment');
    Route::post('/admin/technician-payment/store/{id}',[TechnicianPaymentController::class, 'store'])->middleware('role:admin')->name('Admin.StoreTechnicianPayment');
    Route::delete('/admin/technician/delete/{id}',[AdmindashboardController::class, 'deleteTechnician'])->middleware('role:admin')->name('Admin.Technician.delete');
    Route::delete('/admin/technician-assigned/{id}/remove',[AssignedtechnicianController::class, 'removeTechnician'])->middleware('role:admin')->name('Admin.removeTechnician');
    Route::get('/admin/customer-feedback',[AdmindashboardController::class, 'Customerfeedback'])->middleware('role:admin')->name('Admin.Customerfeedback');
    Route::get('/admin/technician/edit/{user}',[AdmindashboardController::class, 'editTechnician'])->middleware('role:admin')->name('Admin.technician.edit');
    Route::put('/admin/technician/update/{user}',[AdmindashboardController::class, 'updateTechnician'])->middleware('role:admin')->name('Admin.technician.update');





    Route::get('/technician/dashboard',[TechniciandashboardController::class, 'dashboard'])->middleware('role:technician')->name('Technician.dashboard');
    Route::get('/technician/assigned-work',[TechniciandashboardController::class, 'Assignedwork'])->middleware('role:technician')->name('Technician.Assignedwork');
    Route::post('/technician/assigned-work/{id}/upload-proof',[TechniciandashboardController::class, 'uploadWorkProof'])->middleware('role:technician')->name('Technician.uploadWorkProof');
    Route::get('/technician/service-history',[TechniciandashboardController::class, 'Servicehistory'])->middleware('role:technician')->name('Technician.Servicehistory');
    Route::get('/technician/payment',[TechniciandashboardController::class, 'Payment'])->middleware('role:technician')->name('Technician.Payment');
    Route::get('/technician/Customerfeedback',[TechniciandashboardController::class, 'feedback'])->middleware('role:technician')->name('Technician.Customerfeedback');
    Route::delete('/technician/assigned-work/{id}/delete-proof',[TechniciandashboardController::class, 'deleteWorkProof'])->middleware('role:technician')->name('Technician.deleteWorkProof');
    Route::get('/technician/payment',[TechniciandashboardController::class, 'Payment'])->middleware('role:technician')->name('Technician.Payment');




});

















 








    
















