<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SeatMapping extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'seat_mapping';
    protected $fillable = ['seat_id','booking_id'];


    public function seat()
    {
        return $this->belongsTo(Seat::class, 'seat_id');
    }
    public function booking()
    {
        return $this->belongsTo(Booking::class, 'booking_id');
    }

}
