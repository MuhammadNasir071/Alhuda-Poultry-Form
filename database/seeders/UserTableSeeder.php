<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        \App\Models\User::create([
            'id' => '1',
            'full_name' => 'Admin',
            'contact' => '03123456789',
            'status' => 'active',
            'email' => 'admin321@example.com',
            'pass' => 'Admin/321',
            'password' => Hash::make('Admin/321'),
        ]);
        \App\Models\User::create([
            'id' => '2',
            'full_name' => 'Poultry',
            'contact' => '03123456789',
            'status' => 'active',
            'email' => 'poultry.info@gmail.com',
            'pass' => 'Poultry/321',
            'password' => Hash::make('Poultry/321'),
        ]);

    }
}
