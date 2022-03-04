<?php

namespace Database\Seeders;

use App\Models\Trip;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TripSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dt = Carbon::now();
        $trips = [
            [
                'departure_time' => $dt->addDays(7)->toDateTimeString(),
                'bus_id' => 1,
            ],
            [
                'departure_time' => $dt->addDays(15)->toDateTimeString(),
                'bus_id' => 2,
            ]
        ];
        foreach ($trips as $trip)
            Trip::create($trip);
    }
}
