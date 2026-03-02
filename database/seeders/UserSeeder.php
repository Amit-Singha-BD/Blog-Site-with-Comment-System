<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::insert([
            [
                "name"         => "Amit Singha",
                "email"        => "amitsingha@gmail.com",
                "phone"        => "01779178486",
                "gender"       => "Male",
                "role"         => "Super Admin",
                "password"     => Hash::make("password"),
            ],
            [
                "name"         => "Roni Singha",
                "email"        => "ronisingha@gmail.com",
                "phone"        => "01660033965",
                "gender"       => "Male",
                "role"         => "Admin",
                "password"     => Hash::make("password"),
            ],
            [
                "name"         => "Somor Singha",
                "email"        => "somorsingha@gmail.com",
                "phone"        => "01782065067",
                "gender"       => "Male",
                "role"         => "Editor",
                "password"     => Hash::make("password"),
            ],
            [
                "name"         => "Shishir Singha",
                "email"        => "shishirsingha@gmail.com",
                "phone"        => "01715903676",
                "gender"       => "Male",
                "role"         => "User",
                "password"     => Hash::make("password"),
            ]
        ]);
    }
}
