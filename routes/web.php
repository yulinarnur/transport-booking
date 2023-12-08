<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\RegionController;
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