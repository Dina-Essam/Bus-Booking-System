<?php

namespace Database\Seeders;

use App\Models\Station;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $stations_trip1 = [
            [
                'order'=>1,
                'price'=>0.0,
                'city_id'=>1,
                'trip_id'=>1

            ],[
                'order'=>2,
                'price'=>100.0,
                'city_id'=>2,
                'trip_id'=>1
            ],[
                'order'=>3,
                'price'=>100.0,
                'city_id'=>3,
                'trip_id'=>1
            ],[
                'order'=>4,
                'price'=>100.0,
                'city_id'=>4,
                'trip_id'=>1
            ]
        ];
        foreach ($stations_trip1 as $station)
            Station::create($station);

        $stations_trip2 = [
            [
                'order'=>1,
                'price'=>0.0,
                'city_id'=>5,
                'trip_id'=>2

            ],[
                'order'=>2,
                'price'=>100.0,
                'city_id'=>2,
                'trip_id'=>2
            ],[
                'order'=>3,
                'price'=>100.0,
                'city_id'=>6,
                'trip_id'=>2
            ],[
                'order'=>4,
                'price'=>100.0,
                'city_id'=>9,
                'trip_id'=>2
            ]
        ];
        foreach ($stations_trip2 as $station)
            Station::create($station);
    }
}
