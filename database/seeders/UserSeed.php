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
                'mobile' => '9031251290',
                'country_code' => '+91',
                'profile_img' => 'https://shorturl.at/YbVus'
            ],
            [
                'role_id' => 2,
                'name' => 'Site User',
                'email' => 'siteUser@gmail.com',
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
                'mobile' => '9031201290',
                'country_code' => '+91',
                 'profile_img' => 'https://shorturl.at/YbVus'
            ],
            [
                'role_id' => 3,
                'name' => 'Demo User',
                'email' => 'demo@example.com',
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
                'mobile' => '9030951290',
                'country_code' => '+91',
                 'profile_img' => 'https://shorturl.at/YbVus'
            ],
            [
                'role_id' => 4,
                'name' => 'Vendor User',
                'email' => 'vendor@example.com',
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
                 'mobile' => '9098787635',
                'country_code' => '+91',
                 'profile_img' => 'https://shorturl.at/YbVus'
            ],
        ];

        foreach ( $users as $user ){
            User::create( $user );
        }

        $vendorDetail =  [
            'user_id' => 4,
            'name' => 'Vendor User Shop',
            'email' => 'vendor@example.com',
             'mobile' => '9098787635',
            'country_code' => '+91',
            'shop_img' => 'https://shorturl.at/9bReg',
        ]; 


    }
}
