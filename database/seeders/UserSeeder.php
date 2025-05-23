<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'user4',
            'email' => 'tes@gmail.com',
            'password' => Hash::make('12341234'),
        ]);

        User::create([
            'name' => 'user5',
            'email' => 'tes@example.com',
            'password' => Hash::make('12341234'),
        ]);
    }
}
