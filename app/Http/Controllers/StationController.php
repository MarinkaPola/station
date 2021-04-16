<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Station;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Requests\StationRequest;
use App\Http\Resources\StationResource;
use App\Http\Resources\StationResourceCollection;
use Illuminate\Support\Facades\DB;

class StationController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Station::class);
    }
    /**
     * Display a listing of the resource.
     *
    @return JsonResponse
     */
    public function index()
    {
        $stationsQuery = Station::query();

        if (request()->filled('city'))
        {
            $stations=$stationsQuery->where('city', request()->city)->paginate();
        }
            return $this->success(StationResourceCollection::make($stations));

    }



    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StationRequest $request)
    {
        $station = Station::create($request->validated());
        return $this->created(StationResource::make($station));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Station $station
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Station $station)
    {

        return $this->success(StationResource::make($station));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Station $station
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(StationRequest $request, Station $station)
    {


        $station->update($request->validated());
        return $this->success(StationResource::make($station));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Station $station
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Station $station)
    {
        try {
            $station->delete();
        } catch (Exception $e) {
            return null;
        }

        return $this->success('Record deleted.', JsonResponse::HTTP_NO_CONTENT);
    }


    public function open_stantions()
    {
        $stationsQuery = Station::query();

        if (request()->filled('city'))
        {
            $stations=$stationsQuery->where('city', request()->city)->where('station_closed', 0)->paginate();
        }
        return $this->success(StationResourceCollection::make($stations));

    }


}
