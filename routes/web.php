<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::get('/Login', [UserController::class, 'LoginPage'])->name('login');
Route::post('/Login', [UserController::class, 'Login'])->name('login');

Route::middleware('auth')->group(function () {
    Route::get('/UserRegister', [UserController::class, 'RegisterPage'])->name('RegisterPage');
    Route::post('/UserRegister', [UserController::class, 'Register']);

    Route::get('/', [DashboardController::class, 'ShowDashboard'])->name('ShowDashboard');

    Route::get('/Dashboard', function () {
        return redirect()->route('ShowDashboard');
    });

});

Route::post('/Logout', function () {
    Auth::logout();
    return redirect()->route('login');
})->name('logout');
