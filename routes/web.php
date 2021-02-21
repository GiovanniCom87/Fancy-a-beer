<?php

use App\Http\Controllers\BreweryController;
use App\Http\Controllers\PublicController;
use App\Models\Brewery;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [PublicController::class, 'index'])->name('homepage');

Route::get('/birrerie', [PublicController::class, 'breweries'])->name('breweries');

Auth::routes();

Route::post('/store', [BreweryController::class, 'store'])->name('store');

Route::post('/{id}/approve', [BreweryController::class, 'approve'])->name('approve');

Route::post('/{id}/salva_commento', [BreweryController::class, 'storeComment'])->name('storeComment');

Route::post('/birrerie/{id}/beers/sync', [BreweryController::class,'beersSync'])->name('beers.sync');

Route::get('/{id}/{name}', [PublicController::class, 'show'])->name('show');

Route::get('/search', [PublicController::class, 'search'])->name('search');

Route::get('/contact', [PublicController::class, 'contact'])->name('contact');


