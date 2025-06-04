<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Route;

//frontend route
Route::get('/',[HomeController::class,'home'])->name('home');

// Route::match(['get','post'],'/login',[AuthController::class,'userLogin'])->name('login');
// Route::middleware(['auth', 'web'])->group(function () {

// });

//beckend route
Route::match(['get','post'],'/admin',[AuthController::class,'adminLogin'])->name('admin.login');
Route::middleware(['auth', 'admin'])->group(function () {

});

