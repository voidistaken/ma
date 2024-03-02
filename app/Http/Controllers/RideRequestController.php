<?php

namespace App\Http\Controllers;

use App\Http\Requests\acceptRideRequest;
use App\Http\Requests\storeRideRequest;
use App\Http\Resources\RideRequestResource;
use App\Models\Driver;
use App\Models\Ride;
use App\Models\RideRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RideRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return RideRequestResource::collection(RideRequest::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(storeRideRequest $request)
    {
        //When a user recreate a ride request the old one gets deleted. :D

        $rider = Auth::guard('rider');
        if ($rider->user()->ride_requests) { // check if already made a ride request
            $rider->user()->ride_requests->delete();  // if true delete it
        }

        $ride = RideRequest::create($request->validated()); // create the ride request
        return $ride;
    }


    /**
     * Display the specified resource.
     */
    public function show(RideRequest $rideRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RideRequest $rideRequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    
    public function destroy(RideRequest $rideRequest)
    {
        $rideRequest->delete();
        return response()->json(['message' => 'Ride request deleted successfully'], 201);
    }


    public function accept(RideRequest $ride, $id)
{
    // Logic to authenticate the driver
    $user = auth()->user();

    // Add the driver's ID to the drivers array
    $drivers = $ride->drivers ?? [];
    if (!in_array($id, $drivers)) {
        $drivers[] = $id;
        $ride->update(['drivers' => $drivers]);
    }

    return response()->json(['message' => 'Ride request accepted successfully']);
}


public function acceptDriver(acceptRideRequest $request)
{
    $ride = $request->validated();
    $rider = Auth::guard('rider');
    if ($rider->user()->ride_requests){
        Ride::create($ride);
        $rider->user()->ride_requests->delete();
        return response()->json(['message' => $ride]);
    }
    
}

public function drivers($id)
{
    $ride = RideRequest::find($id);
    if ($ride){
        $driverIds = $ride->drivers;
        if (!$driverIds) {
            return [];
        }
        $drivers = [];
            foreach ($driverIds as $driverId) {
                // Retrieve details of each driver by ID
                $driver = Driver::find($driverId);
                if ($driver) {
                    // Include relevant driver details
                    $drivers[] = [
                        'id' => $driver->id,
                        'first_name' => $driver->first_name,
                        'last_name' => $driver->last_name,
                        // Include other driver details as needed
                    ];
                }
            }
        return $drivers;
    }
    return [];
}
}
