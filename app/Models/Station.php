<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Station extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'stations';
    protected $fillable = ['order','price'];

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function trip()
    {
        return $this->belongsTo(Trip::class, 'trip_id');
    }

    public function source_bookings()
    {
        return $this->hasMany(Booking::class,'source_station_id');
    }

    public function destination_bookings()
    {
        return $this->hasMany(Booking::class,'destination_station_id');
    }



}
