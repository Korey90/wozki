<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserAddressesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('user_addresses')->delete();
        
        \DB::table('user_addresses')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 1,
                'stline' => '12 Line of address',
                'ndline' => 'subb line addres',
                'town' => 'LONDON',
                'post_code' => 'BT735U4',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}