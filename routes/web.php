<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerUser;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ControllerReservations;
use App\Http\Middleware\AdminCheck;
use App\Http\Controllers\ControllerRoom;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/auth', function () {
    return view('login');
});
Route::get('/register', function () {
    return view('register');
});

Route::controller(ControllerRoom::class)->group(function () {
    Route::post('/addRoom', 'addRoom')->name('room.add');
    Route::get('/addRoomView', function () {
        return view('components.add-room');
    });
    Route::get('/deleteRoom/{id}', 'deleteRoom')->name('deleteRoom');
});

Route::controller(Controller::class)->group(function () {
    Route::get('/layout/{id}','show')->name('layout');
    Route::get('/search','search')->name('search');
    Route::get('/my-room','myRoom')->name('my-room');
    Route::get('/admin-room', 'adminRoom')->name('admin-room')->middleware([AdminCheck::class]);
});

Route::controller(ControllerReservations::class)->group(function () {
    Route::post('/resrvations/{id}', 'booking')->name('reservations');
    Route::get('/dellBooking/{id}', 'dellBooking')->name('dellBooking');
});

Route::controller(ControllerUser::class)->group(function () {
    Route::post('/store', 'store')->name('store');
    Route::post('/login', 'login')->name('login');
    Route::get('/logout', 'logout')->name('logout');
    Route::post('/edit-user', 'editUser')->name('user.edit');
});

//Route::get('/layout/{id}', [Controller::class, 'show'])->name('layout');
//Route::get('/my-room', [ControllerMyRoom::class, 'myRoom'])->name('my-room');
//Route::post('/search', [Controller::class, 'search'])->name('search');
