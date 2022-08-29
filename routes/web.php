<?php

use App\Http\Controllers\SkateParkController;
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

Route::get('/skateparks/{skatepark:slug}', [SkateParkController::class, 'show'])->name('skateparks.show');

// Admin Dashboard //
Route::group([
    'prefix' => 'admin', // Prefixer "admin" aux vues
    'middleware' => 'auth', // Utilisation du middleware "auth" pour valider l'authentification de l'utilisateur
], function() {
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
    Route::controller(SkateParkController::class)->group(function() {
        Route::get('/skateparks', 'index')->name('skateparks.index');
        Route::post('/skateparks', 'store')->name('skateparks.store');
        Route::get('/skateparks/create', 'create')->name('skateparks.create');
        Route::patch('/skateparks/{skatepark:slug}', 'update')->name('skateparks.update');
        Route::get('/skateparks/{skatepark:slug}/edit', 'edit')->name('skateparks.edit');
        Route::delete('/skateparks/{skatepark:slug}', 'destroy')->name('skateparks.destroy');
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
//    Route::resource('/skateparks', SkateParkController::class)->only('index', 'store', 'create', 'edit', 'update');
//});

// Auth //
Route::controller(\App\Http\Controllers\Auth\LoginController::class)->name('login.')->group(function () {
    Route::get('/connexion', 'index');
    Route::post('/connexion', 'store')->name('store');
    Route::get('/deconnexion', 'logout')->name('logout');
});

