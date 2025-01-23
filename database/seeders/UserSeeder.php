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
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('1234')
            ],
            [
                'name' => 'editor',
                'email' => 'editor@gmail.com',
                'password' => Hash::make('1234')
            ],
            [
                'name' => 'vendor',
                'email' => 'vendor@gmail.com',
                'password' => Hash::make('1234')
            ]
        ];

        foreach($users as $user) {
            User::create($user);
        }
    }
}
