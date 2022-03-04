<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use phpDocumentor\Reflection\Types\Boolean;
use phpDocumentor\Reflection\Types\This;

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

    public function hasAvailableSeats(Station $source , Station $destination):Boolean
    {
        return count($this->getSeatsReserved($source,$destination))<12;
    }

    public function getSeatsReserved(Station $source , Station $destination)
    {
        return $this->bookings->where(
            function ($query) use ($source,$destination){
                $query->source_station()->where('order','>=',$source->order)
                    ->where('order','<=',$destination->order);
            }
        )->orWhere(
            function ($query) use ($source,$destination){
                $query->destination_station()->where('order','>=',$source->order)
                    ->where('order','<=',$destination->order);
            }
        )->seatsMapping->seat()->get();
    }

    public function getAvailableSeats(Station $source , Station $destination)
    {
        $reserved = $this->getSeatsReserved($source , $destination);
        $allSeats = $this->bus->seats()->get();
        $available_seats = $allSeats->diff($reserved);
        return $available_seats->all();
    }


}
