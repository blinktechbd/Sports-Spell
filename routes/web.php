<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Beckend\AdMangementController;
use App\Http\Controllers\Beckend\AuthorController;
use App\Http\Controllers\Beckend\UserController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Beckend\ContentController;
use App\Http\Controllers\Beckend\GalleryController;
use App\Http\Controllers\Beckend\SettingController;
use App\Http\Controllers\Beckend\CategoryController;
use App\Http\Controllers\Beckend\VotePollController;
use App\Http\Controllers\Beckend\SubcategoryController;
use App\Http\Controllers\Beckend\TodaySportsController;
use App\Http\Controllers\Beckend\HomeController as BeckendHomeController;

//clear route
Route::get('/clear', function () {
    Artisan::call('cache:clear'); Artisan::call('config:clear'); Artisan::call('config:cache'); Artisan::call('view:clear'); Artisan::call('route:clear'); Artisan::call('optimize:clear'); Artisan::call('storage:link');
    return "Cleared!";
});

//beckend route
Route::match(['get','post'],'/admin',[AuthController::class,'adminLogin'])->name('admin.login');
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard',[BeckendHomeController::class,'dashboard'])->name('dashboard');
    Route::resource('/categories',CategoryController::class);
    Route::resource('/subcategories',SubcategoryController::class);
    Route::resource('/contents',ContentController::class);
    Route::resource('/galleries',GalleryController::class);
    Route::get('/delete-gallery-item/{item_id}',[GalleryController::class,'deleteGalleryItem'])->name('deleteGalleryItem');
    Route::resource('/users',UserController::class);
    Route::resource('/authors',AuthorController::class);
    Route::resource('/today-sports',TodaySportsController::class);
    Route::resource('/vote-polls',VotePollController::class);
    Route::match(['get','post'],'/admanagements',[AdMangementController::class, 'ad_managements'])->name('admanagements');
    Route::get('/comment-lists',[UserController::class,'comment_lists'])->name('commentLists');
    Route::get('/comment/{id}',[UserController::class,'comment_delete'])->name('commentDelete');
    Route::match(['get','post'],'/settings',[SettingController::class, 'index'])->name('settings');
    Route::match(['get','post'],'/profile-settings',[SettingController::class, 'profile_settings'])->name('profile.settings');
    Route::get('/admin-logout',[AuthController::class,'adminLogout'])->name('admin.logout');
    // ajax call
    Route::get('/get-subcategories/{category_id}', [SubcategoryController::class, 'getSubcategories']);
});

//frontend route
Route::match(['get','post'],'/login',[AuthController::class,'userLogin'])->name('login');
Route::match(['get','post'],'/sign-up',[AuthController::class,'userSignUp'])->name('userSignUp');
Route::middleware(['auth', 'web'])->group(function () {
    Route::match(['get','post'],'/profile',[HomeController::class,'profile'])->name('profile');
    Route::get('logout',[AuthController::class,'logout'])->name('logout');
});
Route::get('/',[HomeController::class,'home'])->name('home');
Route::get('/about',[HomeController::class,'about'])->name('about');
Route::get('/contact',[HomeController::class,'contact'])->name('contact');
Route::get('/privacy-policy',[HomeController::class,'privacy_policy'])->name('privacyPolicy');
Route::get('/today-sports/{category_slug}',[HomeController::class,'today_cat_sports'])->name('todayCatSports');
Route::get('/content-search', [HomeController::class, 'contentSearch'])->name('contentSearch');
Route::get('/tag-search', [HomeController::class, 'tagSearch'])->name('tagSearch');
Route::get('/গ্যালারি',[HomeController::class,'photoGalleries'])->name('photoGalleries');
Route::get('/গ্যালারি/{id}',[HomeController::class,'photoGalleryDetails'])->name('photoGalleryDetails');
Route::get('/{category}',[HomeController::class,'categoryWiseContent'])->name('category-wise-content');
Route::get('/{category}/{subcategory}',[HomeController::class,'catWiseSubContent'])->name('cat-wise-sub-content');
Route::get('/{category_slug}/{subcategory_name}/{title_slug}',[HomeController::class,'categoryWiseContentDetails'])->name('categoryWiseContentDetails');
Route::post('/vote-submit', [VotePollController::class, 'submitVote'])->name('vote.submit');
Route::post('/ajker-sport-vote-submit', [VotePollController::class, 'submitAjkerSportVote'])->name('ajkerSportVote.submit');
Route::post('/comments', [HomeController::class, 'comment'])->name('comments');

