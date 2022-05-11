<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Channel;
use Inertia\Inertia;

class ChannelController extends Controller
{

    // show all channels
    public function index()
    {
        $channels = Channel::all();
        
        return Inertia::render('Channels/Index', [
            'channels' => $channels
        ]);
    }

    // render channel create page
    public function create()
    {
        return Inertia::render('Channels/Create');
    }

    // store new channel
    public function store(Request $request)
    {
        $this->validate($request, [
            'channelName' => 'required|string|max:150',
        ]);

        Channel::create([
            'name' => $request->channelName,
        ]);

        return redirect()->route('channels');
    }

    public function show($id)
    {
        //
    }

    // edit a channel
    public function edit($id)
    {
        
        $channel = Channel::find($id);
        
        return Inertia::render('Channels/Edit', [
            'channel' => $channel
        ]);
    }

    // update a channel
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'channelName' => 'required|string|max:150',
        ]);
        
        $channel = Channel::find($id);
        
        $channel->name = $request->channelName;

        $channel->update();

        return redirect()->route('channels');
    }

    
    // delete a channel
    public function destroy($id)
    {
        Channel::destroy($id);

        return redirect()->route('channels');
    }
}
