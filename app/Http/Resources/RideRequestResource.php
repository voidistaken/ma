<?php

namespace App\Http\Resources;

use App\Models\Driver;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RideRequestResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'from' => $this->from,
            'to' => $this->to,
            'rider' => new RiderResource($this->rider),
            'drivers' => $this->drivers ? $this->getDriverDetails($this->drivers) : [],
            'distance' => $this->distance,
            'price' => $this->price
        ];   
    }

    private function getDriverDetails($driverIds)
    {
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
}
