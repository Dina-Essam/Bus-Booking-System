<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'booking';
    protected $fillable = ['seat_numbers','total_price','user_id','source_station_id',
        'destination_station_id','trip_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function source_station()
    {
        return $this->belongsTo(Station::class, 'source_station_id');
    }

    public function destination_station()
    {
        return $this->belongsTo(Station::class, 'destination_station_id');
    }

    public function trip()
    {
        return $this->belongsTo(Trip::class, 'trip_id');
    }

    public function seatsMapping()
    {
        return $this->hasMany(SeatMapping::class,'booking_id');
    }

    public static function create(array $request)
    {
        //check two stations is in the trip
        $trip = Trip::find($request['trip_id']);
        $sourceStation = Station::find($request['source_station_id']);
        $destinationStation = Station::find($request['destination_station_id']);
        $trip->checkStations($sourceStation,$destinationStation);
        //check seats is available

        $trip->checkSeats($sourceStation,$destinationStation,$request['seats']);

        //get price of the reservation

        $pricePerSeat = $trip->pricePerSeat($sourceStation,$destinationStation);

        $model = new Booking;
        $model->trip_id = $request['trip_id'];
        $model->source_station_id = $request['source_station_id'];
        $model->destination_station_id = $request['destination_station_id'];
        $model->seat_numbers = count($request['seats']);
        $model->total_price = $pricePerSeat * $model->seat_numbers;
        $model->user_id = auth()->user()->getId();
        $model->save();
        foreach ($request['seats'] as $seat) {
            SeatMapping::create(["seat_id" => $seat , "booking_id"=>$model->id]);
        }
        return $model;
    }
}
