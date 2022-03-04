<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'booking';
    protected $fillable = ['seat_numbers','total_price'];

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
}
