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

        // return view('pages.bookings.index', 
        // [
        //     'bookings' => $bookings
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
