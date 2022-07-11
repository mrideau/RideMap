<?php

use App\Http\Controllers\SkateParcController;
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

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/carte', [\App\Http\Controllers\MapController::class, 'index'])->name('map');

Route::get('/skateparcs/{skateparc:slug}', [SkateParcController::class, 'show'])->name('skate-parcs.show');

// Admin Dashboard //
Route::group([
    'prefix' => 'admin',
    'middleware' => 'auth',
//    'except' => ['show']
], function() {
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
    Route::controller(SkateParcController::class)->group(function() {
        Route::get('/skateparcs', 'index')->name('skate-parcs.index');
        Route::post('/skateparcs', 'store')->name('skate-parcs.store');
        Route::get('/skateparcs/create', 'create')->name('skate-parcs.create');
        Route::patch('/skateparcs/{skateparc:slug}', 'update')->name('skate-parcs.update');
        Route::get('/skateparcs/{skateparc:slug}/edit', 'edit')->name('skate-parcs.edit');
        Route::delete('/skateparcs/{skateparc:slug}', 'destroy')->name('skate-parcs.destroy');
    });
});

//Route::group([
//    'prefix' => 'admin',
//    'middleware' => 'auth',
//    'except' => ['show']
//], function() {
//    Route::get('/', function() {
//        return view('admin.dashboard');
//    })->name('admin');
//    Route::resource('/skate-parcs', SkateParcController::class)->only('index', 'store', 'create', 'edit', 'update');
//});

// Auth //
Route::controller(\App\Http\Controllers\Auth\LoginController::class)->name('login.')->group(function () {
    Route::get('/connexion', 'index');
    Route::post('/connexion', 'store')->name('store');
    Route::get('/deconnexion', 'logout')->name('logout');
});

