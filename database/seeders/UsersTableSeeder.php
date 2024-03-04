<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'admin',
                'email' => 'admin@example.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$th6A4.WdVyyLo8fOZvBqO.bGMfb8q3lK.eAa5P/Kq.ejMKMITR/hm',
                'remember_token' => NULL,
                'created_at' => '2022-08-11 16:57:12',
                'updated_at' => '2022-08-11 16:57:12',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'user',
                'email' => 'user@example.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$vAIrK.AWWJhWPzxZuqIfWebis4U/TAlVtKRD6trQmGe9BedV8tYKq',
                'remember_token' => NULL,
                'created_at' => '2022-08-15 12:29:29',
                'updated_at' => '2022-08-15 12:29:29',
            ),
        ));
        
        
    }
}