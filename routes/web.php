<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
    Route::get('/UserRegister', [UserController::class, 'RegisterPage']);
    Route::post('/UserRegister', [UserController::class, 'Register']);

    Route::get('/', function () {
        return redirect('Dashboard');
    });

    Route::get('/Dashboard', function () {
        return view('Dashboard');
    });
});
