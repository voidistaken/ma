<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RideResource extends JsonResource
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
            'drivers' => new DriverResource($this->driver),
            'distance' => $this->distance,
            'price' => $this->price,
            'started_at' => $this->started_at,
            'finished_at' => $this->finished_at
        ]; 
    }
}
