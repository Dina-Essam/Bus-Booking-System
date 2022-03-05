<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function createReservation(Request $request): JsonResponse {
        $reservation = Booking::create($request->toArray());
        $response = [
            'reservation' => $reservation
        ];

        return $this->successResponse($response);
    }
}
