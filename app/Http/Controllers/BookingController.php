<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Channel;
use App\Models\RatePlan;
use App\Models\Room;
use Inertia\Inertia;

class BookingController extends Controller
{

    // contructor
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    // show all bookings
    public function index()
    {
        $bookings = Booking::with('channel', 'room', 'ratePlan')->orderBy('created_at', 'DESC')->get();

        return Inertia::render('Bookings/Index', [
            'bookings' => $bookings
        ]);
    }

    // render booking create page
    public function create()
    {
        $channels = Channel::orderBy('name', 'ASC')->get();
        $ratePlans = RatePlan::orderBy('name', 'ASC')->get();
        $rooms = Room::orderBy('name', 'ASC')->get();

        return Inertia::render('Bookings/Create', [
            'channels' => $channels,
            'ratePlans' => $ratePlans,
            'rooms' => $rooms,
        ]);
    }

    // create booking
    public function store(Request $request)
    {
        $this->validate($request, [
            'channel' => 'required',
            'room' => 'required',
            'ratePlan' => 'required',
            'noOfRooms' => 'required',
            'checkIn' => 'required|date',
            'checkOut' => 'required|date|after_or_equal:checkIn',
            'firstName' => 'required|max:50 ',
            'contactMobile' => 'integer|max:10',
            'contactEmail' => 'email:rfc',
            'noOfAdults' => 'max:2',
            'noOfChildren' => 'max:2',
            'bookingDate' => 'date|before_or_equal:checkIn',
        ]);
        
        Booking::create([
            'first_name' => $request->firstName,
            'last_name' => $request->lastName,
            'contact_mobile' => $request->mobile,
            'contact_email' => $request->email,
            'check_in' => $request->checkIn,
            'check_out' => $request->checkOut,
            'booking_date' => $request->bookingDate,
            'no_of_rooms' => $request->noOfRooms,
            'no_of_adults' => $request->noOfAdults,
            'no_of_children' => $request->noOfChildren,
            'total_amount' => $request->amount,
            'comment' => $request->comment,
            'channel_id' => $request->channel,
            'room_id' => $request->room,
            'rate_plan_id' => $request->ratePlan,
        ]);

        return redirect()->route('bookings');
    }

    public function show($id)
    {
        //
    }

    // edit booking
    public function edit($id)
    {
         
        $booking = Booking::with('channel', 'room', 'ratePlan')->find($id);
        $channels = Channel::orderBy('name', 'ASC')->get();
        $ratePlans = RatePlan::orderBy('name', 'ASC')->get();
        $rooms = Room::orderBy('name', 'ASC')->get();
        
        return Inertia::render('Bookings/Edit', [
            'booking' => $booking,
            'channels' => $channels,
            'ratePlans' => $ratePlans,
            'rooms' => $rooms,
        ]);

    }

    // update booking
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'channel' => 'required',
            'room' => 'required',
            'ratePlan' => 'required',
            'noOfRooms' => 'required',
            'checkIn' => 'required|date',
            'checkOut' => 'required|date|after_or_equal:checkIn',
            'firstName' => 'required|max:50 ',
            'contactMobile' => 'integer|max:10',
            'contactEmail' => 'email:rfc',
            'noOfAdults' => 'max:2',
            'noOfChildren' => 'max:2',
            'bookingDate' => 'date|before_or_equal:checkIn',
        ]);
        
        $booking = Booking::find($id);
        
        $booking->first_name = $request->firstName;
        $booking->last_name = $request->lastName;
        $booking->contact_mobile = $request->mobile;
        $booking->contact_email = $request->email;
        $booking->check_in = $request->checkIn;
        $booking->check_out = $request->checkOut;
        $booking->booking_date = $request->bookingDate;
        $booking->no_of_rooms = $request->noOfRooms;
        $booking->no_of_adults = $request->noOfAdults;
        $booking->no_of_children = $request->noOfChildren;
        $booking->total_amount = $request->amount;
        $booking->comment = $request->comment;
        $booking->channel_id = $request->channel;
        $booking->room_id = $request->room;
        $booking->rate_plan_id = $request->ratePlan;

        $booking->update();

        return redirect()->route('bookings');
    }

    // delete booking
    public function destroy($id)
    {
        Booking::destroy($id);

        return redirect()->route('bookings');
    }
}
