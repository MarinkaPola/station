<?php

namespace App\Http\Resources;
use App\Models\Station;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class StationResource
 * @package App\Http\Resources
 * @mixin Station
 */
class StationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'city' => $this->city,
            'station_closed' => $this->station_closed,
        ];
    }
}
