<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use Inertia\Inertia;

class CalendarController extends Controller
{
    // fetch all bookings
    public function fetch()
    {
        $bookings = Booking::with('channel', 'room', 'ratePlan')->orderBy('created_at', 'DESC')->get();

        return Inertia::render('Calendar/Index', [
            'bookings' => $bookings
        ]);
    }
}
