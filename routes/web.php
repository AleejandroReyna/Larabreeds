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

Route::get('dashboard', [PagesController::class, 'dashboard'])->name('dashboard')->middleware('auth');
Route::get('login', [PagesController::class, 'login'])->name('login');
Route::get('register', [PagesController::class, 'register'])->name('register');
Route::get('logout', [PagesController::class, 'logout'])->name('logout')->middleware('auth');
Route::post('authenticate', [PagesController::class, 'authenticate'])->name('authenticate');
Route::post('store_user', [PagesController::class, 'store_user'])->name('store_user');
Route::get('breeds/{breed}/add_to_user/', [BreedController::class, 'addToUser'])->name('breeds.add_breed_to_user')->middleware('auth');
Route::get('breeds/{breed}/remove_to_user/', [BreedController::class, 'removeToUser'])->name('breeds.remove_breed_to_user')->middleware('auth');
Route::resource('breeds', BreedController::class)->only(['show'])->middleware('auth');
# IMPORTANT!!! Use underscore in routes based in model name, resource does not work if use subbreeds or sub-breeds 
Route::resource('sub_breeds', SubBreedController::class)->only(['show'])->middleware('auth');
