<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('roles')->insert([
            [
                'id'         => 1,
                'name'       => 'Admin',
                'created_at' => new \DateTime()
            ],
            [
                'id'         => 2,
                'name'       => 'Finance',
                'created_at' => new \DateTime()
            ],
            [
                'id'         => 3,
                'name'       => 'Building',
                'created_at' => new \DateTime()
            ],
            [
                'id'         => 4,
                'name'       => 'Article',
                'created_at' => new \DateTime()
            ],
            [
                'id'         => 5,
                'name'       => 'Guest',
                'created_at' => new \DateTime()
            ]
        ]);

        \Illuminate\Support\Facades\DB::table('users')->insert([
            'first_name' => 'Dito',
            'last_name'  => 'YP',
            'password'   => \Illuminate\Support\Facades\Hash::make('password'),
            'email'      => 'dito@gmail.com',
            'roles_id'   => 1,
            'created_at' => new \DateTime(),
        ]);
    }
}
