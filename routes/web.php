<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostAdController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PaytmController;


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


// For Authentication
Route::get('login/{provider}', [LoginController::class,'redirect'])->name('login.social');
Route::get('login/{provider}/callback',[LoginController::class,'Callback']);
Auth::routes();


//Public Routes
Route::get('/', [HomeController::class, 'public_page'])->name('/');
Route::get('/terms',[HomeController::class, 'index'])->name('terms');
Route::get('view/post/{id}', [PostAdController::class, 'index'])->name('view.post-ad');


//User Routes

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::prefix('user')->name('user.')->middleware(['role:user'])->group(function(){
    Route::match(['get','post'],'/post-ad', [PostAdController::class, 'store'])->name('store.post-ad');
    Route::match(['get','post'],'/post-ad/{id}', [PostAdController::class, 'update'])->name('edit.post-ad');
    Route::post('/ad-photos-uploads', [PostAdController::class, 'addPhotos'])->name('ad.photos.uploads');
    Route::post('/ad-photos-delete', [PostAdController::class, 'deletePhotos'])->name('ad.photos.delete');
    Route::get('/profile/{id}', [ProfileController::class, 'index'])->name('view.profile');
    Route::post('/profile/{id}', [ProfileController::class, 'update'])->name('update.profile');
    Route::post('/change-profile/{id}', [ProfileController::class, 'updatePassword'])->name('update.profile.password');
    Route::match(['get','post'],'/ads/{type}', [PostAdController::class, 'listAds'])->name('list.ads');
    Route::get('/payment/initiate',[PostAdController::class,'initiate'])->name('initiate.payment');
    Route::post('/payment',[PostAdController::class,'pay'])->name('make.payment');
    Route::post('/payment/status', [PostAdController::class,'paymentCallback'])->name('payment.status');  
});



//Ajax Route

Route::post('AJAX_DATA', [AjaxController::class, 'index'])->name('AJAX_DATA');