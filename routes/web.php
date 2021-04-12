<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\BreedController;
use App\Http\Controllers\SubBreedController;

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
    return view('home');
})->name('home');

Route::get('dashboard', [PagesController::class, 'dashboard'])->name('dashboard');
Route::resource('breeds', BreedController::class)->only(['show']);
# IMPORTANT!!! Use underscore in routes based in model name, resource does not work if use subbreeds or sub-breeds 
Route::resource('sub_breeds', SubBreedController::class)->only(['show']);
