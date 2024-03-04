<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserDetailsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('user_details')->delete();
        
        \DB::table('user_details')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 1,
                'fname' => 'Konrad',
                'mname' => 'Sebastian',
                'lname' => 'Szczepanik',
                'sex' => 'male',
                'avatar' => 'https://loremflickr.com/220/150/dog',
                'created_at' => '2022-08-14 18:57:38',
                'updated_at' => '2022-08-14 18:57:38',
            ),
        ));
        
        
    }
}