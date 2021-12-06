<?php

use App\Http\Controllers\Backend\BackendController;
use App\Http\Controllers\Backend\NewsController;
use App\Http\Controllers\Backend\AdvertisementController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;

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

//Frontend Routes

Route::group(['namespace'=>'frontend'], function(){
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('newsAll', [HomeController::class, 'newsAll'])->name('news.all');
    Route::get('newsDetail/{slug}', [HomeController::class, 'newsDetail'])->name('news.detail');
    Route::get('newsFilter/{category}', [HomeController::class, 'newsFilter'])->name('news.filter');
    Route::get('aboutUs', [HomeController::class, 'aboutUs'])->name('about.us');
    Route::get('contact', [HomeController::class, 'contact'])->name('contact');
    Route::post('contact', [HomeController::class, 'contact'])->name('contact');
});

Route::group(['namespace'=>'Backend', 'prefix' => 'Backend', 'middleware' => 'auth'], function(){
    Route::get('admin', [BackendController::class, 'index'])->name('admin');
    Route::get('news', [NewsController::class, 'index'])->name('news.list');
    Route::get('category', [NewsController::class, 'indexCategory'])->name('category.list');
    Route::get('video', [NewsController::class, 'indexGallery'])->name('gallery.list');
    Route::get('gallery', [NewsController::class, 'indexVideo'])->name('video.list');
    Route::any('categoryCreate', [NewsController::class, 'categoryCreate'])->name('category.create');
    Route::any('categoryEdit/{category}', [NewsController::class, 'categoryEdit'])->name('category.edit');
    Route::post('categoryDelete', [NewsController::class, 'categoryDelete'])->name('category.delete');
    Route::any('newsCreate', [NewsController::class, 'newsCreate'])->name('news.create');
    Route::any('newsEdit/{slug}', [NewsController::class, 'newsEdit'])->name('news.edit');
    Route::post('addFeatured/{slug}', [NewsController::class, 'addFeatured'])->name('add.featured');
    Route::get('removeFeatured/{slug}', [NewsController::class, 'removeFeatured'])->name('remove.featured');
    Route::post('newsDelete', [NewsController::class, 'newsDelete'])->name('news.delete');
    Route::any('videoCreate', [NewsController::class, 'videoCreate'])->name('video.create');
    Route::post('videoDelete', [NewsController::class, 'videoDelete'])->name('video.delete');
    Route::any('videoEdit/{category}', [NewsController::class, 'videoEdit'])->name('video.edit');
    Route::any('galleryCreate', [NewsController::class, 'galleryCreate'])->name('gallery.create');
    Route::post('galleryDelete', [NewsController::class, 'galleryDelete'])->name('gallery.delete');
    Route::any('galleryEdit/{category}', [NewsController::class, 'galleryEdit'])->name('gallery.edit');
    Route::any('ad', [AdvertisementController::class, 'index'])->name('ad.list');
    Route::any('adCreate', [AdvertisementController::class, 'adCreate'])->name('ad.create');
    Route::post('adDelete', [AdvertisementController::class, 'adDelete'])->name('ad.delete');
    Route::any('adEdit/{category}', [AdvertisementController::class, 'adEdit'])->name('ad.edit');
});

//Auth Routes
Route::group(['namespace'=>'Auth'], function(){
    // Authentication Routes...
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login']);
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');

//    // Registration Routes...
//    Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
//    Route::post('register', [RegisterController::class, 'register']);
//
//    // Password Reset Routes...
//    Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm']);
//    Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail']);
//    Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm']);
//    Route::post('password/reset', [ResetPasswordController::class, 'reset']);
});

//Auth::routes();
