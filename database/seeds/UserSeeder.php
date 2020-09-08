<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::firstOrCreate(
            [
                'level'       => 'creator',
                'username'    => 'admin',
            ],
            [
                'firstName'   => 'توحید',
                'lastName'    => 'ناطقی',
                'email'       => 'nategit@gmail.com',
                'tel'         => '09145769644',
                'address'     => 'آذربایجان شرقی - سراب',
                'password'    => bcrypt('123456'),
                'created_at'  => date("Y-m-d H:i:s")
            ]
        );

        factory(User::class, 10)->create();
    }
}
