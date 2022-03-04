<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'User',
                'email' => 'user@gmail.com',
                'password' => bcrypt('password')
            ],
            [
                'name' => 'User2',
                'email' => 'user2@gmail.com',
                'password' => bcrypt('password')
            ]
        ];
        foreach ($users as $user)
            User::create($user);
    }
}
