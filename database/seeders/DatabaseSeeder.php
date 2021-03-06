<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(CitySeeder::class);
        $this->call(BusSeeder::class);
        $this->call(SeatSeeder::class);
        $this->call(TripSeeder::class);
        $this->call(StationSeeder::class);
        $this->call(BookingSeeder::class);
        $this->call(SeatMappingSeeder::class);
    }
}
