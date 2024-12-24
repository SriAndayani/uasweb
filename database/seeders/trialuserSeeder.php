<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class trialuserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'name'=>'kak Admin',
                'email'=>'admin@gmail.com',
                'password'=>bcrypt('123456789'),
                'phone'=>'081222333444',
                'role'=>'admin'
            ],
            [
                'name'=>'kak Penyelenggara',
                'email'=>'penyelenggara@gmail.com',
                'password'=>bcrypt('123456789'),
                'phone'=>'081222333444',
                'role'=>'penyelenggara'
            ],
            [
                'name'=>'kak Pelanggan',
                'email'=>'pelanggan@gmail.com',
                'password'=>bcrypt('123456789'),
                'phone'=>'081222333444',
                'role'=>'pelanggan'
            ],
        ];

        foreach($userData as $key => $val){
            User::create($val);
        }
    }
}
