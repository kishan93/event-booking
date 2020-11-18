<?php

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

Route::get('/', 'PageController@index');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia\Inertia::render('Dashboard');
})->name('dashboard');

Route::middleware('auth:sanctum')->group(function (){

    #Event
    Route::resource('events', \App\Http\Controllers\EventController::class);
    Route::resource('slots', \App\Http\Controllers\SlotController::class);

    #bookings
    Route::resource('bookings', \App\Http\Controllers\BookingController::class);

});
