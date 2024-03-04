<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SuppliersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('suppliers')->delete();
        
        \DB::table('suppliers')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'Lego',
                'fname' => 'Nikolas',
                'mname' => NULL,
                'lname' => 'Bennet',
                'language' => 'English',
                'address_id' => 2,
                'contact_id' => 2,
                'company_id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'title' => 'EastSun',
                'fname' => 'Frank',
                'mname' => NULL,
                'lname' => 'Yin',
                'language' => 'English',
                'address_id' => 1,
                'contact_id' => 1,
                'company_id' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}