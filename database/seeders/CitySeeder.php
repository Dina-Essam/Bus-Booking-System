<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = [[
            'id'=>1,
            'city_name_ar' => 'القاهرة',
            'city_name_en' => 'Cairo',
        ],
        [
            'id'=>2,
            'city_name_ar' => 'الجيزة',
            'city_name_en' => 'Giza',
        ],
        [
            'id'=>3,
            'city_name_ar' => 'الأسكندرية',
            'city_name_en' => 'Alexandria',
        ],
        [
            'id'=>4,
            'city_name_ar' => 'الدقهلية',
            'city_name_en' => 'Dakahlia',
        ],
        [
            'id'=>5,
            'city_name_ar' => 'البحيرة',
            'city_name_en' => 'Beheira',
        ],
        [
            'id'=>6,
            'city_name_ar' => 'الفيوم',
            'city_name_en' => 'Fayoum',
        ],
        [
            'id'=>7,
            'city_name_ar' => 'الغربية',
            'city_name_en' => 'Gharbiya',
        ],
        [
            'id'=>8,
            'city_name_ar' => 'الإسماعلية',
            'city_name_en' => 'Ismailia',
        ],
        [
            'id'=>9,
            'city_name_ar' => 'المنوفية',
            'city_name_en' => 'Menofia',
        ],
        [
            'id'=>10,
            'city_name_ar' => 'المنيا',
            'city_name_en' => 'Minya',
        ],
        ];

        foreach ($cities as $city)
            City::create($city);
    }
}
