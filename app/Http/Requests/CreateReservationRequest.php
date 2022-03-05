<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateReservationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'trip_id'=>'required|exists:trip,id',
            'source_station_id'=>'required|exists:stations,id',
            'destination_station_id'=>'required|exists:stations,id',
            'seats'=>'required|array',
            'seats.*'=>'distinct|exists:seats,id'
        ];
    }
}
