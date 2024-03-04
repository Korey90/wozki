<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StocksTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('stocks')->delete();
        
        \DB::table('stocks')->insert(array (
            0 => 
            array (
                'id' => 1,
                'product_id' => 4,
                'current_qty' => '12',
                'minimum_stock' => '2',
                'maximum_stock' => '50',
                'created_at' => '2022-08-15 09:29:46',
                'updated_at' => '2022-08-15 09:29:46',
            ),
            1 => 
            array (
                'id' => 2,
                'product_id' => 5,
                'current_qty' => '19',
                'minimum_stock' => '2',
                'maximum_stock' => '50',
                'created_at' => '2022-08-15 09:29:46',
                'updated_at' => '2022-08-15 09:29:46',
            ),
            2 => 
            array (
                'id' => 3,
                'product_id' => 3,
                'current_qty' => '8',
                'minimum_stock' => '2',
                'maximum_stock' => '50',
                'created_at' => '2022-08-15 09:29:46',
                'updated_at' => '2022-08-15 09:29:46',
            ),
            3 => 
            array (
                'id' => 4,
                'product_id' => 6,
                'current_qty' => '4',
                'minimum_stock' => '2',
                'maximum_stock' => '50',
                'created_at' => '2022-08-15 09:29:46',
                'updated_at' => '2022-08-15 09:29:46',
            ),
        ));
        
        
    }
}