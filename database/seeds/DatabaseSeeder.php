<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);


        DB::table('users')->insert([
            [
                'level'       => 'creator',
                'username'          => 'admin',
                'firstName'      => 'توحید',
                'lastName'      => 'ناطقی',
                'email'         => 'nategit@gmail.com',
                'tel'         => '09145769644',
                'address'         => 'آذربایجان شرقی - سراب',
                'password'      => bcrypt('123456'),
                'created_at'    => date("Y-m-d H:i:s")
            ]
        ]);
    }
}
