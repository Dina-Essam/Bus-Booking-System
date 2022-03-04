<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TripsAvailableRequest;
use App\Models\City;
use App\Models\Trip;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TripController extends Controller
{
    public function availableTrips(TripsAvailableRequest $request): JsonResponse {
        $fields = $request->validated();

        $sourceCity = City::find($fields['sourceCity_id']);
        $destinationCity = City::find($fields['destinationCity_id']);
        $trips = Trip::getAvailableTrips($sourceCity,$destinationCity);
        foreach ($trips as $trip)
        {
            $sourceStation = $trip->stations->where('city_id','=',$sourceCity->id)->first();
            $destinationStation = $trip->stations->where('city_id','=',$destinationCity->id)->first();
            $trip['available_Seats'] = $trip->getAvailableSeats($sourceStation,$destinationStation);
        }
        $response = [
            'trips' => $trips
        ];

        return $this->successResponse($response);
    }

}
