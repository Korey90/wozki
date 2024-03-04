<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductDetailsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('product_details')->delete();
        
        \DB::table('product_details')->insert(array (
            0 => 
            array (
                'id' => 1,
                'weight' => '0,8',
                'width' => '22',
                'height' => '16',
                'deepth' => '12',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'weight' => '1,25',
                'width' => '25',
                'height' => '20',
                'deepth' => '25',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'weight' => '0,45',
                'width' => '95',
                'height' => '0,8',
                'deepth' => '28',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'weight' => '0,6',
                'width' => '18',
                'height' => '12',
                'deepth' => '14',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}