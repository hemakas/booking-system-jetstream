<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// testing
use App\Http\Controllers\TaskController;

use App\Http\Controllers\BookingController;
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
Route::get('/calendar', function () {
    return Inertia::render('CalendarPage');
})->name('calendar');

// all booking routes
Route::get('/bookings', [BookingController::class, 'index'])->name('bookings');

// all channel routes
Route::get('/channels', [ChannelController::class, 'index'])->name('channels');
Route::get('/channels/{channel}/edit', [ChannelController::class, 'edit'])->name('channels.edit');
Route::put('/channels/{channel}', [ChannelController::class, 'update'])->name('channels.update');

// all test tasks
Route::get('/gettasks', [TaskController::class, 'index']);