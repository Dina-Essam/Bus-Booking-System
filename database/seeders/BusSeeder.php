<?php

namespace Database\Seeders;

use App\Models\Bus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

            $buses = [[
                'id'=>1,
                'bus_name' => 'Classic',
                'description' => 'Bus has TV and air conditioner',
            ],
            [
                'id'=>2,
                'bus_name' => 'Deluxe',
                'description' => 'Bus has TV, WIFI and air conditioner',
            ]];
            foreach ($buses as $bus)
                Bus::create($bus);
    }
}
