<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RatePlan;
use Inertia\Inertia;

class RatePlanController extends Controller
{
    
    // contructor
    public function __construct()
    {
        $this->middleware('auth');
    }    
    
    // show all rate plans
    public function index()
    {
        $ratePlans = RatePlan::all();
        
        return Inertia::render('RatePlans/Index', [
            'ratePlans' => $ratePlans
        ]);
    }

    // render rate plan create page
    public function create()
    {
        return Inertia::render('RatePlans/Create');
    }

    // store new rate plan
    public function store(Request $request)
    {
        $this->validate($request, [
            'rateplanName' => 'required|string|max:150',
        ]);
        
        RatePlan::create([
            'name' => $request->rateplanName,
        ]);

        return redirect()->route('ratePlans');
    }

    public function show($id)
    {
        //
    }

    // edit a Rate Plan
    public function edit($id)
    {
        
        $ratePlan = RatePlan::find($id);
        
        return Inertia::render('RatePlans/Edit', [
            'ratePlan' => $ratePlan
        ]);
    }

    // update rate plan
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'rateplanName' => 'required|string|max:150',
        ]);
        
        $rateplan = RatePlan::find($id);
        
        $rateplan->name = $request->ratePlanName;

        $rateplan->update();

        return redirect()->route('ratePlans');
    }

    // delete rate plan
    public function destroy($id)
    {
        RatePlan::destroy($id);

        return redirect()->route('ratePlans');
    }
}
