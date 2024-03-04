<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SupplierAddressesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('supplier_addresses')->delete();
        
        \DB::table('supplier_addresses')->insert(array (
            0 => 
            array (
                'id' => 1,
                'stline' => 'Unit 4 Lillington Road',
                'ndline' => 'Bulwell Nottingham',
                'town' => 'Nottinghamshire',
                'post_code' => 'NG68HJ',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'stline' => '23 Castle View',
                'ndline' => NULL,
                'town' => 'Port rush',
                'post_code' => 'bt73 2dk',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}