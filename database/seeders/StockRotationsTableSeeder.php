<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StockRotationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('stock_rotations')->delete();
        
        \DB::table('stock_rotations')->insert(array (
            0 => 
            array (
                'id' => 1,
                'reference_number' => '123123',
                'product_ean' => 'EAN374512',
                'stage' => 'null',
                'qty' => '-1',
                'created_at' => '2022-08-07 12:36:15',
                'updated_at' => '2022-08-15 09:36:15',
                'location' => 'store1',
            ),
            1 => 
            array (
                'id' => 2,
                'reference_number' => '234234',
                'product_ean' => 'EAN374512',
                'stage' => 'null',
                'qty' => '-2',
                'created_at' => '2022-08-09 10:49:30',
                'updated_at' => '2022-08-15 12:49:30',
                'location' => 'store1',
            ),
            2 => 
            array (
                'id' => 3,
                'reference_number' => '345345',
                'product_ean' => 'EAN374512',
                'stage' => 'null',
                'qty' => '-1',
                'created_at' => '2022-08-13 12:00:30',
                'updated_at' => '2022-08-15 12:49:30',
                'location' => 'store1',
            ),
            3 => 
            array (
                'id' => 4,
                'reference_number' => '456456',
                'product_ean' => 'EAN374512',
                'stage' => 'null',
                'qty' => '5',
                'created_at' => '2022-08-15 12:49:30',
                'updated_at' => '2022-08-15 12:49:30',
                'location' => 'store1',
            ),
        ));
        
        
    }
}