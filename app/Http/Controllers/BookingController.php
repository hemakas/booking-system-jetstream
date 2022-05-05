<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use Inertia\Inertia;

class BookingController extends Controller
{

    public function index()
    {
        $bookings = Booking::orderBy('created_at', 'DESC')->paginate(5);

        // return Inertia::render('Bookings/Index', [
        //     'bookings' => $bookings->map(function($booking) {
        //         return [
        //             'id' => $booking->id,
        //             'first_name' => $booking->first_name,
        //             'last_name' => $booking->last_name,
        //             'contact_mobile' => $booking->contact_mobile,
        //             'contact_email' => $booking->contact_email,
        //             'check_in' => $booking->check_in,
        //             'check_out' => $booking->check_out,
        //             'booking_date' => $booking->booking_date,
        //             'no_of_rooms' => $booking->no_of_rooms,
        //             'no_of_adults' => $booking->no_of_adults,
        //             'no_of_children' => $booking->no_of_children,
        //             'total_amount' => $booking->total_amount,
        //             'comment' => $booking->comment
        //         ];
        //     })
        // ]);

        return Inertia::render('Bookings/Index', [
            'bookings' => $bookings
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
