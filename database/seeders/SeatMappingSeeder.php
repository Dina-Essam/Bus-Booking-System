<?php

namespace Database\Seeders;

use App\Models\SeatMapping;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SeatMappingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seats = [[
            'seat_id'=>1,
            'booking_id'=>1
        ],[
            'seat_id'=>2,
            'booking_id'=>1
        ],[
            'seat_id'=>3,
            'booking_id'=>2
        ],[
            'seat_id'=>4,
            'booking_id'=>2
        ],[
            'seat_id'=>7,
            'booking_id'=>3
        ],[
            'seat_id'=>8,
            'booking_id'=>3
        ]];
        foreach ($seats as $seat) {
            SeatMapping::create($seat);
        }
    }
}
