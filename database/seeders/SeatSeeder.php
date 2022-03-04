<?php

namespace Database\Seeders;

use App\Models\Seat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SeatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(1, 12) as $i) {

            Seat::create([
                'code' => $i,
                'description' => 'Bus has TV and air conditioner',
                'bus_id'=>1
            ],);

        }

        foreach (range(1, 12) as $i) {

            Seat::create([
                'code' => $i,
                'description' => 'Bus has TV, WIFI and air conditioner',
                'bus_id'=>2
            ],);

        }
    }
}
