<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Oliver Sykes',
                'email' => 'oliversykes@gmail.com',
                'password' => Hash::make('oliver123')
            ],
            [
                'name' => 'Admin',
                'email' => 'admin1@gmail.test',
                'password' => Hash::make('secret123')
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
