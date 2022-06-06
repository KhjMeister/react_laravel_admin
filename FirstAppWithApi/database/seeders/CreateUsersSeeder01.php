<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUsersSeeder01 extends Seeder
{
    public function run()

    {

        $user = [

            [

               'name'=>'Admin',

               'email'=>'admin@itsolutionstuff.com',

                'role'=>'admin',

               'password'=> bcrypt('123456789'),

            ],

            [

               'name'=>'User',

               'email'=>'user@itsolutionstuff.com',

                'is_admin'=>'0',

               'password'=> bcrypt('123456'),

            ],

        ];

  

        foreach ($user as $key => $value) {

            User::create($value);

        }

    }
}
