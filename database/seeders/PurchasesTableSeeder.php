<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PurchasesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('purchases')->delete();
        
        \DB::table('purchases')->insert(array (
            0 => 
            array (
                'id' => 1,
                'purchase_number' => 'PRH-485601-WG283',
                'ean_number' => 'EAN135649,EAN478534,EAN475345',
                'qty' => '1,3,2',
                'unit_price' => '100, 16.69, 8.40',
                'total' => '166.87',
                'vat' => '20',
                'status' => 'completed',
                'created_at' => '2022-09-18 22:44:40',
                'updated_at' => '2022-09-18 22:44:40',
            ),
            1 => 
            array (
                'id' => 2,
                'purchase_number' => 'PRH-486600-AC520',
                'ean_number' => 'EAN475345',
                'qty' => '2',
                'unit_price' => '8.40',
                'total' => '16.80',
                'vat' => '20',
                'status' => 'pending',
                'created_at' => '2022-09-18 22:44:40',
                'updated_at' => '2022-09-18 22:44:40',
            ),
            2 => 
            array (
                'id' => 3,
                'purchase_number' => 'PRH-440048-KL314',
                'ean_number' => 'EAN374512',
                'qty' => '3',
                'unit_price' => '11.67',
                'total' => '35.01',
                'vat' => '20',
                'status' => 'placed',
                'created_at' => '2022-09-18 22:44:40',
                'updated_at' => '2022-09-18 22:44:40',
            ),
        ));
        
        
    }
}