<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'role_id' => 1,
                'name' => 'Pankaj Kumar',
                'email' => 'ankuprsdpkp@gmail.com',
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
                'mobile' => '9031251290'
            ],
            [
                'role_id' => 1,
                'name' => 'Demo User',
                'email' => 'demo@example.com',
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
            ],
        ];

        foreach ( $users as $user ){
            User::create( $user );
        }

    }
}
