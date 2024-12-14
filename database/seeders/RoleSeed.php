<?php

namespace Database\Seeders;

use App\Models\UserRole;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles=[
            [
                'name' => 'admin',
                'slug' => 'admin'
            ],
            [
                'name' => 'user',
                'slug' => 'user'
            ],
            [
                'name' => 'demo',
                'slug' => 'demo'
            ],
        ];

        foreach ( $roles as $role){
            UserRole::create( $role );
        }



    }
}
