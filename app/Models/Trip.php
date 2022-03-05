<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Validation\ValidationException;
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

    public function hasAvailableSeats(Station $source , Station $destination)
    {
        return count($this->getSeatsReserved($source,$destination))<12;
    }

    public function getSeatsReserved(Station $source , Station $destination)
    {
        //Check that 2 stations from the trip
        $source = $this->stations()->where('id','=',$source->id)->firstOrFail();
        $destination= $this->stations()->where('id','=',$destination->id)
            ->where('order','>',$source->order)->firstOrFail();

        return $this->whereHas('bookings',
            function ($query) use ($source,$destination){
                $query->whereHas('source_station' ,function ($query2) use ($source,$destination){
                    $query2->where('order','>=',$source->order)
                        ->where('order','<=',$destination->order);
                });
            }
        )->orWhereHas('bookings',
            function ($query) use ($source,$destination){
                $query->whereHas('destination_station',function ($query2) use ($source,$destination){
                    $query2->where('order','>=',$source->order)
                        ->where('order','<=',$destination->order);
                });
            }
        )->get()->pluck('bookings')->flatten()->pluck('seatsMapping')->flatten()->pluck('seat')->flatten();
    }

    public static function getAvailableTrips(City $source , City $destination)
    {
        $trips = Trip::whereHas('stations',
            function ($query) use ($source){
                $query->where('city_id','=',$source->id);
            }
        )->whereHas('stations',
            function ($query) use ($destination){
                $query->where('city_id','=',$destination->id);
            }
        )->get();
        foreach ($trips as $index => $trip)
        {
            $sourceStation = $trip->stations->where('city_id','=',$source->id)->first();
            $destinationStation = $trip->stations->where('city_id','=',$destination->id)->first();
            if($destinationStation->order <= $sourceStation->order || !$trip->hasAvailableSeats($sourceStation,$destinationStation))
                $trips->forget($index);
        }
        return $trips;
    }

    public function getAvailableSeats(Station $source , Station $destination)
    {
        $reserved = $this->getSeatsReserved($source , $destination);
        $allSeats = $this->bus->seats()->get();
        $available_seats = $allSeats->diff($reserved);
        return $available_seats->all();
    }

    /**
     * @throws ValidationException
     */
    public function checkStations(Station $source , Station $destination)
    {
        if($destination->order <= $source->order || !$this->hasAvailableSeats($source,$destination))
            throw ValidationException::withMessages(['source_station_id' => 'This value is incorrect',
                'destination_station_id' => 'This value is incorrect']);
    }

    /**
     * @throws ValidationException
     */
    public function checkSeats(Station $source , Station $destination , $seats)
    {
        $availableSeats = $this->getAvailableSeats($source, $destination);
        $all = collect($availableSeats)->pluck('id')->toArray();
        if (array_diff($seats, $all))
            throw ValidationException::withMessages(['seats' => 'This value is incorrect']);
    }

    public function pricePerSeat(Station $source , Station $destination)
    {
        return $this->stations()->where('order','>',$source->order)
            ->where('order','<=',$destination->order)->get()->pluck('price')->sum();
    }


}
