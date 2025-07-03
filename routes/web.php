<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Beckend\CategoryController;
use App\Http\Controllers\Beckend\ContentController;
use App\Http\Controllers\Beckend\HomeController as BeckendHomeController;
use App\Http\Controllers\Beckend\SubcategoryController;
use App\Http\Controllers\Beckend\UserController;
use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Route;


//beckend route
Route::match(['get','post'],'/admin',[AuthController::class,'adminLogin'])->name('admin.login');
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard',[BeckendHomeController::class,'dashboard'])->name('dashboard');
    Route::resource('/categories',CategoryController::class);
    Route::resource('/subcategories',SubcategoryController::class);
    Route::resource('/contents',ContentController::class);
    Route::resource('/users',UserController::class);
    // ajax call
    Route::get('/get-subcategories/{category_id}', [SubcategoryController::class, 'getSubcategories']);

});

//frontend route
// Route::match(['get','post'],'/login',[AuthController::class,'userLogin'])->name('login');
// Route::middleware(['auth', 'web'])->group(function () {

// });
Route::get('/',[HomeController::class,'home'])->name('home');
Route::get('/{category}',[HomeController::class,'categoryWiseContent'])->name('category-wise-content');
Route::get('/{category}/{subcategory}/{title}',[HomeController::class,'categoryWiseContentDetails'])->name('category-wise-content-details');
