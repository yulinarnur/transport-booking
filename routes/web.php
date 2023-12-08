<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Backend\DashboardController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

Route::get('/',[DashboardController::class, 'index'])->middleware('auth');
Route::get('/backend/dashboard',[DashboardController::class, 'index'])->middleware('auth');

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
// Route::get('/backend/dashboard', [App\Http\Controllers\Backend\DashboardController::class, 'index'])->name('backend');

// login logout
Route::post('login/proses', [App\Http\Controllers\Auth\LoginController::class, 'proses'])->name('login.proses');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::controller(LoginController::class)->group(function(){
    Route::get('login', 'index')->name('login');
});

Route::group(['middleware' => ['auth']],function(){
    Route::group(['middleware' => ['cekUserLogin:1']],function(){
        Route::resource('beranda', Beranda::class);
    });

    // Route::group(['middleware' => ['cekUserLogin:2']],function(){
    //     Route::resource('backend/dashboard', DashboardController::class);
    // });
});
