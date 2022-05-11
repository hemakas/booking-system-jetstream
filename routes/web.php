<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// controllers
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\ChannelController;
use App\Http\Controllers\RatePlanController;
use App\Http\Controllers\RoomController;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

// calendar
Route::get('/calendar', [CalendarController::class, 'fetch'])->name('calendar');

// all booking routes
Route::get('/bookings', [BookingController::class, 'index'])->name('bookings');
Route::get('/bookings/create', [BookingController::class, 'create'])->name('bookings.create');
Route::post('/bookings/store', [BookingController::class, 'store'])->name('bookings.store');
Route::get('/bookings/{booking}/edit', [BookingController::class, 'edit'])->name('bookings.edit');
Route::put('/bookings/{booking}', [BookingController::class, 'update'])->name('bookings.update');
Route::delete('/bookings/{booking}', [BookingController::class, 'destroy'])->name('bookings.destroy');

// all channel routes
Route::get('/channels', [ChannelController::class, 'index'])->name('channels');
Route::get('/channels/create', [ChannelController::class, 'create'])->name('channels.create');
Route::put('/channels/store', [ChannelController::class, 'store'])->name('channels.store');
Route::get('/channels/{channel}/edit', [ChannelController::class, 'edit'])->name('channels.edit');
Route::put('/channels/{channel}', [ChannelController::class, 'update'])->name('channels.update');
Route::delete('/channels/{channel}', [ChannelController::class, 'destroy'])->name('channels.destroy');

// all rate plan routes
Route::get('/ratePlans', [RatePlanController::class, 'index'])->name('ratePlans');
Route::get('/ratePlans/create', [RatePlanController::class, 'create'])->name('ratePlans.create');
Route::put('/ratePlans/store', [RatePlanController::class, 'store'])->name('ratePlans.store');
Route::get('/ratePlans/{ratePlan}/edit', [RatePlanController::class, 'edit'])->name('ratePlans.edit');
Route::put('/ratePlans/{ratePlan}', [RatePlanController::class, 'update'])->name('ratePlans.update');
Route::delete('/ratePlans/{ratePlan}', [RatePlanController::class, 'destroy'])->name('ratePlans.destroy');

// all room routes
Route::get('/rooms', [RoomController::class, 'index'])->name('rooms');
Route::get('/rooms/create', [RoomController::class, 'create'])->name('rooms.create');
Route::put('/rooms/store', [RoomController::class, 'store'])->name('rooms.store');
Route::get('/rooms/{room}/edit', [RoomController::class, 'edit'])->name('rooms.edit');
Route::put('/rooms/{room}', [RoomController::class, 'update'])->name('rooms.update');
Route::delete('/rooms/{room}', [RoomController::class, 'destroy'])->name('rooms.destroy');

// all test tasks
Route::get('/gettasks', [TaskController::class, 'index']);