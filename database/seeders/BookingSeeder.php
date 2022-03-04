<?php

namespace Database\Seeders;

use App\Models\Booking;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bookings = [[
            'seat_numbers'=>2,
            'total_price'=>200,
            'user_id'=>1,
            'source_station_id'=>1,
            'destination_station_id'=>3,
            'trip_id'=>1
        ],[
            'seat_numbers'=>2,
            'total_price'=>200,
            'user_id'=>1,
            'source_station_id'=>1,
            'destination_station_id'=>3,
            'trip_id'=>1
        ],[
            'seat_numbers'=>2,
            'total_price'=>100,
            'user_id'=>1,
            'source_station_id'=>3,
            'destination_station_id'=>4,
            'trip_id'=>1
        ]];

        foreach ($bookings as $booking) {
            Booking::create($booking);
        }
    }
}
