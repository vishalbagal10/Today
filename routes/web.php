<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookingController;


Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/registersave', [UserController::class, 'saveRegister'])->name('register.save');

Route::get('/', [UserController::class, 'login'])->name('login');
Route::post('/authenticate-login', [UserController::class, 'authenticateLogin'])->name('check.login');

Route::middleware(['authcheck'])->group(function () {
    Route::get('/index', [BookingController::class, 'index'])->name('booking.index');
    // Route::post('/select-seats', [BookingController::class, 'selectSeats'])->name('booking.select_seats');
    Route::post('/select-seats', [BookingController::class, 'selectSeats'])->name('select.seats');

    // Route::post('/confirm-booking', [BookingController::class, 'confirmBooking'])->name('booking.confirm');
    // Route::get('/booking-success', [BookingController::class, 'success'])->name('booking.success');
    Route::post('/getLocation', [BookingController::class, 'getLocation'])->name('getLocation');

    Route::post('/booking/confirm', [BookingController::class, 'confirmBooking'])->name('booking.confirm');
    Route::post('/booking/finalize', [BookingController::class, 'finalizeBooking'])->name('booking.finalize');
    Route::get('success', [BookingController::class, 'success'])->name('booking.success');
    Route::get('/booking/error', [BookingController::class, 'error'])->name('booking.error');
    Route::get('/booking_view/{id}', [BookingController::class, 'booking_view']);


    Route::get('/profile', [UserController::class, 'userProfile'])->name('profile');

    Route::get('/logout', [UserController::class, 'logout'])->name('exit');

});



