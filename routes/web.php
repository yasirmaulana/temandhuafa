<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DonasiController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\DonaturController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\KeuanganController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FundraiserController;
use App\Http\Controllers\SocialiteController;
use App\Livewire\Campaign;
use App\Livewire\Home;
use App\Livewire\Posts\Index;

Route::get('/', function () {
    return view('front.home');
});
Route::get('/campaign/{slug}', function () {
    return view('front.detail');
});
Route::get('/pembayaran', function () {
    return view('front.detail');
});
Route::get('/metodepembayaran', function () {
    return view('front.detail');
});

Route::get('/login', [AuthController::class, 'login']);
Route::post('/login', [AuthController::class, 'auth_login']);
Route::get('logout', [AuthController::class, 'logout']);

Route::controller(SocialiteController::class)->group(function () {
    Route::get('auth/google', 'googleLogin')->name('auth.google');
    Route::get('auth/google-callback', 'googleAuthentication')->name('auth.google-callback');
});


Route::group(['middleware' => 'useradmin'], function () {

    Route::get('/panel/dashboard', [DashboardController::class, 'dashboard']);

    Route::get('/panel/category', [CategoryController::class, 'list']);
    Route::get('/panel/category/add', [CategoryController::class, 'add']);
    Route::post('/panel/category/add', [CategoryController::class, 'insert']);
    Route::get('/panel/category/edit/{id}', [CategoryController::class, 'edit']);
    Route::post('/panel/category/edit/{id}', [CategoryController::class, 'update']);
    Route::get('/panel/category/delete/{id}', [CategoryController::class, 'delete']);

    Route::get('/panel/campaign', [CampaignController::class, 'list']);
    Route::get('/panel/campaign/add', [CampaignController::class, 'add']);
    Route::post('/panel/campaign/add', [CampaignController::class, 'insert']);
    Route::get('/panel/campaign/edit/{id}', [CampaignController::class, 'edit']);
    Route::post('/panel/campaign/edit/{id}', [CampaignController::class, 'update']);
    Route::get('/panel/campaign/delete/{id}', [CampaignController::class, 'delete']);
    Route::get('/panel/campaign/approve/{id}', [CampaignController::class, 'approve']);
    Route::get('/panel/campaign/complate/{id}', [CampaignController::class, 'complate']);

    Route::get('/panel/donatur', [DonaturController::class, 'list']);

    Route::get('/panel/donasi', [DonasiController::class, 'list']);

    Route::get('/panel/fundraiser', [FundraiserController::class, 'list']);

    Route::get('/panel/keuangan', [KeuanganController::class, 'list']);

    Route::get('/panel/slider', [SliderController::class, 'list']);
    Route::get('/panel/slider/add', [SliderController::class, 'add']);
    Route::post('/panel/slider/add', [SliderController::class, 'insert']);
    Route::get('/panel/slider/edit/{id}', [SliderController::class, 'edit']);
    Route::post('/panel/slider/edit/{id}', [SliderController::class, 'update']);
    Route::get('/panel/slider/delete/{id}', [SliderController::class, 'delete']);

    Route::get('/panel/role', [RoleController::class, 'list']);
    Route::get('/panel/role/add', [RoleController::class, 'add']);
    Route::post('/panel/role/add', [RoleController::class, 'insert']);
    Route::get('/panel/role/edit/{id}', [RoleController::class, 'edit']);
    Route::post('/panel/role/edit/{id}', [RoleController::class, 'update']);
    Route::get('/panel/role/delete/{id}', [RoleController::class, 'delete']);

    Route::get('/panel/user', [UserController::class, 'list']);
    Route::get('/panel/user/add', [UserController::class, 'add']);
    Route::post('/panel/user/add', [UserController::class, 'insert']);
    Route::get('/panel/user/edit/{id}', [UserController::class, 'edit']);
    Route::post('/panel/user/edit/{id}', [UserController::class, 'update']);
    Route::get('/panel/user/delete/{id}', [UserController::class, 'delete']);
});
