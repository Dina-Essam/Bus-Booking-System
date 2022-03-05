<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateReservationRequest;
use App\Models\Booking;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function createReservation(CreateReservationRequest $request): JsonResponse {
        $fields = $request->validated();

        $reservation = Booking::create($fields);
        $response = [
            'reservation' => $reservation
        ];

        return $this->successResponse($response);
    }
}
