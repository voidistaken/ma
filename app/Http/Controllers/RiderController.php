<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeRider;
use App\Http\Resources\RiderResource;
use App\Models\Rider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RiderController extends Controller
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
    public function store(storeRider $request)
    {
        $form = $request->validated();
        $form['password'] = Hash::make($form['password']);
        $rider = Rider::create($form);
        return new RiderResource($rider);
    }

    /**
     * Display the specified resource.
     */
    public function show(Rider $rider)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rider $rider)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rider $rider)
    {
        //
    }
}
