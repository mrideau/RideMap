<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\SkateParkController;
use \App\Http\Controllers\SponsorsController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');
//Route::post('/contact/send', 'App\Http\Controllers\EmailController@contact');
Route::post('/contact/send', [\App\Http\Controllers\EmailController::class, 'contact']);

Route::get('/carte', [MapController::class, 'index'])->name('map');

Route::resource('skateparks', SkateParkController::class)->only('show')->scoped([
    'skatepark' => 'slug'
]);

// Admin Dashboard //
Route::group([
    'prefix' => 'admin', // Prefix "admin" aux vues
    'middleware' => 'auth', // Utilisation du middleware "auth" pour valider l'authentification de l'utilisateur
], function() {
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::resource('skateparks', SkateParkController::class)->except('show')->scoped([
        'skatepark' => 'slug'
    ]);

    Route::resource('partenaires', SponsorsController::class)->except('show')->names('sponsors');
});

// Auth //
Route::controller(\App\Http\Controllers\Auth\LoginController::class)->name('login.')->group(function () {
    Route::get('/connexion', 'index');
    Route::post('/connexion', 'store')->name('store');
    Route::get('/deconnexion', 'logout')->name('logout');
});

