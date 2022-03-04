<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TripsAvailableRequest extends FormRequest
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
            'sourceCity_id' => 'required|exists:cities,id',
            'destinationCity_id' => 'required|exists:cities,id',
        ];
    }
}
