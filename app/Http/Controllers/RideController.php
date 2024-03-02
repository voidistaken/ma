<?php

namespace App\Http\Controllers;

use App\Http\Resources\RideResource;
use App\Models\Ride;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RideController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Ride $ride)
    {
        if (!$ride) {
            return response()->json(['error' => 'Ride not found'], 404);
        }
    
        return new RideResource($ride);
    }
    


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ride $ride)
    {
        //
    }
    public function start(Request $request, Ride $ride)
{
    $request->validate([
        'started_at' => 'required|date',
    ]);

    $startedAt = Carbon::parse($request->started_at);

    $ride->started_at = $startedAt;
    $ride->save();

    return response()->json(['message' => 'Ride started successfully'], 200);
}



    public function end(Request $request, Ride $ride)
{
    $request->validate([
        'finished_at' => 'required|date',
    ]);

    $finishedAt = Carbon::parse($request->finished_at);

    $ride->finished_at = $finishedAt;
    $ride->save();

    return response()->json(['message' => 'Ride ended successfully'], 200);
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ride $ride)
    {
        //
    }
}
