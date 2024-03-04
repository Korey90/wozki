<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('products')->delete();
        
        \DB::table('products')->insert(array (
            0 => 
            array (
                'id' => 3,
                'supplier_id' => 1,
                'description_id' => 1,
                'detail_id' => 1,
                'title' => 'Zestaw Autek napedzanych 3 in 1',
                'status' => 'active',
                'ean_number' => 'EAN135649',
                'price' => '8.21',
                'sale_price' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 4,
                'supplier_id' => 1,
                'description_id' => 2,
                'detail_id' => 2,
                'title' => 'Moj tytuł DomekPower',
                'status' => 'archive',
                'ean_number' => 'EAN374512',
                'price' => '12.11',
                'sale_price' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 5,
                'supplier_id' => 2,
                'description_id' => 3,
                'detail_id' => 3,
                'title' => 'Piano Mat',
                'status' => 'desibled',
                'ean_number' => 'EAN478534',
                'price' => '15.55',
                'sale_price' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 6,
                'supplier_id' => 2,
                'description_id' => 4,
                'detail_id' => 4,
                'title' => 'Grzechotki 4 Pack',
                'status' => 'wait for appruve',
                'ean_number' => 'EAN475345',
                'price' => '1.98',
                'sale_price' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}