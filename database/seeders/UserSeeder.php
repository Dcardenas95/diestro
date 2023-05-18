<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        user::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'role' => 'admin',
            'password' => Hash::make('12345678')
        ]);

        user::create([
            'name' => strtolower('PAREJA VERA ESTEBAN'),
            'cedula' => '1033336967',
            'email' => 'user@gmail.com',
            'role' => 'vendedor',
            'password' => Hash::make('12345678')
        ]);

        user::create([
            'name' => strtolower('GUTIERREZ  VELASQUEZ L'),
            'cedula' => '6366193',
            'email' => 'user1@gmail.com',
            'role' => 'vendedor',
            'password' => Hash::make('12345678')
        ]);

        user::create([
            'name' => strtolower('URREA GARCIA LUISA  FE'),
            'cedula' => '1041232478',
            'email' => 'user2@gmail.com',
            'role' => 'vendedor',
            'password' => Hash::make('12345678')
        ]);
    }
}
