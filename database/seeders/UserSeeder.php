<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Nalyar Ulryk',
            'email' => 'nalyar@gmail.com',
            'password' => Hash::make('123456')
        ]);
        User::create([
            'name' => 'Nyx Ulryk',
            'email' => 'nu@outlook.com',
            'password' => Hash::make('123456')
        ]);
    }
}
