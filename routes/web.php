<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\DriversController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\TransportController;
use App\Http\Controllers\TransportBookedController;
use App\Http\Controllers\AgreementController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckUserLogin;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// login logout
Route::post('login/proses', [App\Http\Controllers\Auth\LoginController::class, 'proses'])->name('login.proses');
Route::controller(LoginController::class)->group(function(){
    Route::get('login', 'index')->name('login');
});
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// register
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');

Route::group(['middleware' => ['auth']],function(){
    Route::group(['middleware' => ['cekUserLogin:1']],function(){
        Route::resource('beranda', Beranda::class);
    });

    // Route::group(['middleware' => ['cekUserLogin:2']],function(){
    //     Route::resource('backend/dashboard', DashboardController::class);
    // });
});


// dashboard
Route::get('/',[DashboardController::class, 'index'])->middleware('auth');
Route::get('/backend/dashboard',[DashboardController::class, 'index'])->middleware('auth')->name('backend.dashboard');

// data region
Route::get('/index',[RegionController::class, 'index'])->middleware('auth')->name('backend.region');
Route::get('/addRegion',[RegionController::class, 'addRegion'])->middleware('auth')->name('backend.regionAdd');
Route::post('/region', [RegionController::class, 'store'])->name('region.store');
Route::get('/region/{id}/edit', [RegionController::class, 'edit'])->name('region.edit');
Route::post('/region/{id}', [RegionController::class, 'update'])->name('region.update');
Route::delete('/region/{id}', [RegionController::class, 'destroy'])->name('region.destroy');

// data office
Route::get('data_office/index',[OfficeController::class, 'index'])->middleware('auth')->name('backend.office');
Route::get('/addOffice',[OfficeController::class, 'addOffice'])->middleware('auth')->name('backend.officeAdd');
Route::post('/office', [OfficeController::class, 'store'])->name('office.store');
Route::get('/office/{id}/edit', [OfficeController::class, 'edit'])->name('office.edit');
Route::post('/office/{id}', [OfficeController::class, 'update'])->name('office.update');
Route::delete('/office/{id}', [OfficeController::class, 'destroy'])->name('office.destroy');

// driver
Route::get('data_driver/index',[DriversController::class, 'index'])->middleware('auth')->name('backend.driver');
Route::get('/addDriver',[DriversController::class, 'addDriver'])->middleware('auth')->name('backend.driverAdd');
Route::post('/driver', [DriversController::class, 'store'])->name('driver.store');
Route::get('/driver/{id}/edit', [DriversController::class, 'edit'])->name('driver.edit');
Route::put('/driver/{id}', [DriversController::class, 'update'])->name('driver.update');
Route::delete('/driver/{id}', [DriversController::class, 'destroy'])->name('driver.destroy');

// transport
Route::get('data_transport/index',[TransportController::class, 'index'])->middleware('auth')->name('backend.transport');
Route::get('/addTransport',[TransportController::class, 'addTransport'])->middleware('auth')->name('backend.transportAdd');
Route::post('/transport', [TransportController::class, 'store'])->name('transport.store');
Route::get('/transport/{id}/edit', [TransportController::class, 'edit'])->name('transport.edit');
Route::put('/transport/{id}', [TransportController::class, 'update'])->name('transport.update');
Route::delete('/transport/{id}', [TransportController::class, 'destroy'])->name('transport.destroy');

// transport_booked
Route::get('transport_booked/index',[TransportBookedController::class, 'index'])->middleware('auth')->name('backend.transportBooked');
Route::get('/addTransportBooked',[TransportBookedController::class, 'addTransportBooked'])->middleware('auth')->name('backend.transportAddBooked');
Route::post('/transport_booked', [TransportBookedController::class, 'store'])->name('transport_booked.store');
Route::get('/transport_booked/{id}/edit', [TransportBookedController::class, 'edit'])->name('transport_booked.edit');
Route::put('/transport_booked/{id}', [TransportBookedController::class, 'update'])->name('transport_booked.update');
Route::delete('/transport_booked/{id}', [TransportBookedController::class, 'destroy'])->name('transport_booked.destroy');

// agreement supervisor
Route::get('agreement/index',[AgreementController::class, 'index'])->middleware('auth')->name('backend.agreement');
Route::get('/agreement/{id}/edit', [AgreementController::class, 'edit'])->name('agreement.edit');
// Route::put('/agreement/{id}', [AgreementController::class, 'update'])->name('agreement.update');
Route::post('/agreement/approve/{id}', [AgreementController::class, 'approve'])->name('agreement.approve');
Route::post('/agreement/reject/{id}', [AgreementController::class, 'reject'])->name('agreement.reject');