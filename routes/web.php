<?php

use App\Http\Controllers\BreweryController;
use App\Http\Controllers\PublicController;
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/store', [BreweryController::class, 'store'])->name('store');

Route::post('/{id}/approve', [BreweryController::class, 'approve'])->name('approve');

