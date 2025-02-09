<?php

use App\Http\Controllers\BannerController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ManualBookController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RickAndMortyApiController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/Login', [UserController::class, 'LoginPage'])->name('login');
Route::post('/Login', [UserController::class, 'Login'])->name('login');

Route::middleware('auth')->group(function () {
    //Dashboard
    Route::get('/', [DashboardController::class, 'ShowDashboard'])->name('ShowDashboard');
    Route::get('/Dashboard', function () {
        return redirect()->route('ShowDashboard');
    })->name('Dashboard');

    //Banner
    Route::get('/Banner', [BannerController::class, 'ShowBanner'])->name('ShowBanner');
    Route::get('/AddBanner', [BannerController::class, 'AddBannerPage'])->name('AddBannerPage')->middleware('CheckAdmin');
    Route::post('/AddBanner', [BannerController::class, 'AddBanner'])->name('AddBanner')->middleware('CheckAdmin');
    Route::get('/Banner/{id}/edit', [BannerController::class, 'EditBannerPage'])->name('EditBannerPage')->middleware('CheckAdmin');
    Route::post('/Banner/{id}/update', [BannerController::class, 'UpdateBanner'])->name('EditBanner')->middleware('CheckAdmin');
    Route::delete('/Banner/{id}', [BannerController::class, 'DeleteBanner'])->name('DeleteBanner')->middleware('CheckAdmin');

    //UserRegistration
    Route::get('/UserRegister', [UserController::class, 'RegisterPage'])->name('RegisterPage')->middleware('CheckAdmin');
    Route::post('/UserRegister', [UserController::class, 'Register'])->name('UserRegister')->middleware('CheckAdmin');

    //Company
    Route::get('/Company', [CompanyController::class, 'ShowCompany'])->name('CompanyPage')->middleware('CheckAdmin');
    Route::get('/AddCompany', [CompanyController::class, 'AddCompanyPage'])->name('AddCompanyPage')->middleware('CheckAdmin');
    Route::post('/AddCompany', [CompanyController::class, 'AddCompany'])->name('AddCompany')->middleware('CheckAdmin');
    Route::get('/Company/{id}/edit', [CompanyController::class, 'EditCompanyPage'])->name('EditCompanyPage')->middleware('CheckAdmin');
    Route::post('/Company/{id}/update', [CompanyController::class, 'UpdateCompany'])->name('EditCompany')->middleware('CheckAdmin');
    Route::delete('/Company/{id}', [CompanyController::class, 'DeleteCompany'])->name('DeleteCompany')->middleware('CheckAdmin');

    //Manual Book
    Route::get('/ManualBook', [ManualBookController::class, 'ShowManualBook'])->name('ShowManualBook');
    Route::get('/AddManualBook', [ManualBookController::class, 'AddManualBookPage'])->name('AddManualBookPage');
    Route::post('/AddManualBook', [ManualBookController::class, 'AddManualBook'])->name('AddManualBook');
    Route::get('/ManualBook/{id}/edit', [ManualBookController::class, 'EditManualBookPage'])->name('EditManualBookPage');
    Route::get('/ManualBook/{id}/Detail', [ManualBookController::class, 'DetailManualBookPage'])->name('DetailManualBookPage');
    Route::post('/ManualBook/{id}/update', [ManualBookController::class, 'EditManualBook'])->name('EditManualBook');
    Route::delete('/ManualBook/{id}', [ManualBookController::class, 'DeleteManualBook'])->name('DeleteManualBook');

    //Profile
    Route::get('/Profile', [ProfileController::class, 'ShowProfile'])->name('ShowProfile');
    Route::get('/EditProfile/{id}', [ProfileController::class, 'EditProfile'])->name('EditProfile');
    Route::put('/UpdateProfile/{id}', [ProfileController::class, 'UpdateProfile'])->name('UpdateProfile');

    //Rick and Morty API
    Route::get('/RickAndMortyApi', [RickAndMortyApiController::class, 'ShowApi'])->name('ShowApi')->middleware('CheckAdmin');

    //Logout
    Route::post('/Logout', function () {
        Auth::logout();
        return redirect()->route('login');
    })->name('logout');
});

Route::post('/Logout', function () {

    if (!Auth::check()) {
        return redirect()->route('login');
    }

    Auth::logout();
    return redirect()->route('login');
})->name('logout');
