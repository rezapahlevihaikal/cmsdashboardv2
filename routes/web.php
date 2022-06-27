<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\YoutubeController;
use App\Http\Controllers\InstagramController;
use App\Http\Controllers\TiktokController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PerformanceController;
use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\DealsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventCategoryController;
use App\Http\Controllers\PicController;
use App\Http\Controllers\StatusEventController;
use App\Http\Controllers\DivisiController;
use App\Http\Controllers\CoreBisnisController;

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

Route::get('/', function () {
    return view('auth.login');
})->name('login');
Auth::routes();

Route::get('/login',[LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');


Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::get('upgrade', function () {return view('pages.upgrade');})->name('upgrade'); 
	 Route::get('map', function () {return view('pages.maps');})->name('map');
	 Route::get('icons', function () {return view('pages.icons');})->name('icons'); 
	 Route::get('table-list', function () {return view('pages.tables');})->name('table');
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

Route::prefix('website')->group(function(){
	Route::get('/', [WebsiteController::class, 'index'])->name('website');
	Route::post('store', [WebsiteController::class, 'store'])->name('website.store');
	Route::get('edit/{id}', [WebsiteController::class, 'edit'])->name('website.edit');
	Route::post('update/{id}',[WebsiteController::class, 'update'])->name('website.update');
	Route::post('destroy/{id}', [WebsiteController::class, 'destroy'])->name('website.destroy');
});

Route::prefix('youtube')->group(function(){
	Route::get('/', [YoutubeController::class, 'index'])->name('youtube');
	Route::post('store', [YoutubeController::class, 'store'])->name('youtube.store');
	Route::get('edit/{id}', [YoutubeController::class, 'edit'])->name('youtube.edit');
	Route::post('update/{id}', [YoutubeController::class, 'update'])->name('youtube.update');
	Route::post('destroy/{id}', [YoutubeController::class, 'destroy'])->name('youtube.destroy');
});

Route::prefix('instagram')->group(function(){
	Route::get('/', [InstagramController::class, 'index'])->name('instagram');
	Route::post('store', [InstagramController::class, 'store'])->name('instagram.store');
	Route::get('edit/{id}', [InstagramController::class, 'edit'])->name('instagram.edit');
	Route::post('update/{id}', [InstagramController::class, 'update'])->name('instagram.update');
	Route::post('destroy/{id}', [InstagramController::class, 'destroy'])->name('instagram.destroy');
});

Route::prefix('tiktok')->group(function(){
	Route::get('/', [TiktokController::class, 'index'])->name('tiktok');
	Route::post('store', [TiktokController::class, 'store'])->name('tiktok.store');
	Route::get('edit/{id}', [TiktokController::class, 'edit'])->name('tiktok.edit');
	Route::post('update/{id}', [TiktokController::class, 'update'])->name('tiktok.update');
	Route::post('destroy/{id}', [TiktokController::class, 'destroy'])->name('tiktok.destroy');
});

Route::prefix('events')->group(function(){
	Route::get('/', [EventController::class, 'index'])->name('events');
	Route::post('store', [EventController::class, 'store'])->name('events.store');
	Route::get('edit/{id}', [EventController::class, 'edit'])->name('events.edit');
	Route::post('update/{id}', [EventController::class, 'update'])->name('events.update');
	Route::post('destroy/{id}', [EventController::class, 'destroy'])->name('events.destroy');
});

Route::prefix('performance')->group(function(){
	Route::get('/', [PerformanceController::class, 'index'])->name('performance');
	Route::post('store', [PerformanceController::class, 'store'])->name('performance.store');
	Route::get('edit/{id}', [PerformanceController::class, 'edit'])->name('performance.edit');
	Route::post('update/{id}', [PerformanceController::class, 'update'])->name('performance.update');
	Route::post('destroy/{id}', [PerformanceController::class, 'destroy'])->name('performance.destroy');
});

Route::prefix('companies')->group(function(){
	Route::get('/', [CompaniesController::class, 'index'])->name('companies');
});

Route::prefix('contacts')->group(function(){
	Route::get('/', [ContactsController::class, 'index'])->name('contacts');
});

Route::prefix('deals')->group(function(){
	Route::get('/', [DealsController::class, 'index'])->name('deals');
});

Route::prefix('eventCategory')->group(function(){
	Route::get('/', [EventCategoryController::class, 'index'])->name('eventCategory');
	Route::post('store', [EventCategoryController::class, 'store'])->name('eventCategory.store');
	Route::get('edit/{id}', [EventCategoryController::class, 'edit'])->name('eventCategory.edit');
	Route::post('update/{id}', [EventCategoryController::class, 'update'])->name('eventCategory.update');
	Route::post('delete/{id}', [EventCategoryController::class, 'destroy'])->name('eventCategory.destroy');
});

Route::prefix('picEvent')->group(function(){
	Route::get('/', [PicController::class, 'index'])->name('picEvent');
	Route::post('store', [PicController::class, 'store'])->name('picEvent.store');
	Route::get('edit/{id}', [PicController::class, 'edit'])->name('picEvent.edit');
	Route::post('update/{id}', [PicController::class, 'update'])->name('picEvent.update');
	Route::post('delete/{id}', [PicController::class, 'destroy'])->name('picEvent.destroy');
});

Route::prefix('statusEvent')->group(function(){
	Route::get('/', [StatusEventController::class, 'index'])->name('statusEvent');
	Route::post('store', [StatusEventController::class, 'store'])->name('statusEvent.store');
	Route::get('edit/{id}', [StatusEventController::class, 'edit'])->name('statusEvent.edit');
	Route::post('update/{id}', [StatusEventController::class, 'update'])->name('statusEvent.update');
	Route::post('delete/{id}', [StatusEventController::class, 'destroy'])->name('statusEvent.destroy');
});

Route::prefix('divisi')->group(function(){
	Route::get('/', [DivisiController::class, 'index'])->name('divisi');
	Route::post('store', [DivisiController::class, 'store'])->name('divisi.store');
	Route::get('edit/{id}', [DivisiController::class, 'edit'])->name('divisi.edit');
	Route::post('update/{id}', [DivisiController::class, 'update'])->name('divisi.update');
	Route::post('delete/{id}', [DivisiController::class, 'destroy'])->name('divisi.destroy');
});

Route::prefix('coreBisnis')->group(function(){
	Route::get('/', [CoreBisnisController::class, 'index'])->name('coreBisnis');
	Route::post('store', [CoreBisnisController::class, 'store'])->name('coreBisnis.store');
	Route::get('edit/{id}', [CoreBisnisController::class, 'edit'])->name('coreBisnis.edit');
	Route::post('update/{id}', [CoreBisnisController::class, 'update'])->name('coreBisnis.update');
	Route::post('delete/{id}', [CoreBisnisController::class, 'destroy'])->name('coreBisnis.destroy');
});