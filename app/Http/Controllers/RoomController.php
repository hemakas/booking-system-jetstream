<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use Inertia\Inertia;

class RoomController extends Controller
{
    // show all rooms
    public function index()
    {
        $rooms = Room::all();
        
        return Inertia::render('Rooms/Index', [
            'rooms' => $rooms
        ]);
    }

    // render room create page
    public function create()
    {
        return Inertia::render('Rooms/Create');
    }

    // store new room
    public function store(Request $request)
    {
        $this->validate($request, [
            'roomName' => 'required|string|max:150',
        ]);
        
        Room::create([
            'name' => $request->roomName,
        ]);

        return redirect()->route('rooms');
    }

    public function show($id)
    {
        //
    }

    // edit a room
    public function edit($id)
    {
        
        $room = Room::find($id);
        
        return Inertia::render('Rooms/Edit', [
            'room' => $room
        ]);
    }

    // update a room
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'roomName' => 'required|string|max:150',
        ]);
        
        $room = Room::find($id);
        
        $room->name = $request->roomName;

        $room->update();

        return redirect()->route('rooms');
    }

    // delete a room
    public function destroy($id)
    {
        Room::destroy($id);

        return redirect()->route('rooms');
    }
}
