<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Channel;
use Inertia\Inertia;

class ChannelController extends Controller
{

    public function index()
    {
        $channels = Channel::all();
        
        return Inertia::render('Channels/Index', [
            'channels' => $channels
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
        
        $channel = Channel::find($id);
        
        return Inertia::render('Channels/Edit', [
            'channel' => $channel
        ]);
    }

    public function update(Request $request, $id)
    {
        $channel = Channel::find($id);
        
        $channel->name = $request->channelName;

        $channel->update();

        return redirect()->route('channels');
    }

    public function destroy($id)
    {
        //
    }
}
