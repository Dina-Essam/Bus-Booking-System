<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Trip extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'trip';
    protected $fillable = ['departure_time'];

    public function bus()
    {
        return $this->belongsTo(Bus::class, 'bus_id');
    }

    public function stations()
    {
        return $this->hasMany(Station::class)->orderBy('order');
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class,'trip_id');
    }


}
