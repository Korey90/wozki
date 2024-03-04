<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('orders')->delete();
        
        \DB::table('orders')->insert(array (
            0 => 
            array (
                'id' => 1,
                'reference_number' => 'ORD_231543345',
                'product_ean' => 'EAN374512',
                'user_email' => 'admin@example.com',
                'qty' => '1',
                'status' => 'pending',
                'color' => 'info',
                'created_at' => '2022-08-11 12:58:46',
                'updated_at' => '2022-08-13 21:58:46',
            ),
            1 => 
            array (
                'id' => 2,
                'reference_number' => 'ORD_274043345',
                'product_ean' => 'EAN135649',
                'user_email' => 'admin@example.com',
                'qty' => '2',
                'status' => 'processing',
                'color' => 'primary',
                'created_at' => '2022-08-13 21:58:46',
                'updated_at' => '2022-08-13 21:58:46',
            ),
            2 => 
            array (
                'id' => 3,
                'reference_number' => 'ORD_231543563',
                'product_ean' => 'EAN478534',
                'user_email' => 'admin@example.com',
                'qty' => '3',
                'status' => 'canceled',
                'color' => 'danger',
                'created_at' => '2022-08-13 21:58:46',
                'updated_at' => '2022-08-13 21:58:46',
            ),
            3 => 
            array (
                'id' => 4,
                'reference_number' => 'ORD_231543358',
                'product_ean' => 'EAN478534',
                'user_email' => 'admin@example.com',
                'qty' => '1',
                'status' => 'complete',
                'color' => 'success',
                'created_at' => '2022-08-13 21:58:46',
                'updated_at' => '2022-08-13 21:58:46',
            ),
            4 => 
            array (
                'id' => 8,
                'reference_number' => 'ORD_231543345',
                'product_ean' => 'EAN135649',
                'user_email' => 'admin@example.com',
                'qty' => '2',
                'status' => 'pending',
                'color' => 'info',
                'created_at' => '2022-08-11 12:58:46',
                'updated_at' => '2022-08-13 21:58:46',
            ),
            5 => 
            array (
                'id' => 9,
                'reference_number' => 'ORD_233244113',
                'product_ean' => 'EAN475345',
                'user_email' => 'admin@example.com',
                'qty' => '1',
                'status' => 'dispathed',
                'color' => 'success',
                'created_at' => '2022-08-09 16:58:46',
                'updated_at' => '2022-08-13 21:58:46',
            ),
            6 => 
            array (
                'id' => 10,
                'reference_number' => 'ORD_657345099',
                'product_ean' => 'EAN478534',
                'user_email' => 'user@example.com',
                'qty' => '3',
                'status' => 'Pending',
                'color' => 'info',
                'created_at' => '2022-08-15 13:44:44',
                'updated_at' => '2022-08-15 13:44:44',
            ),
        ));
        
        
    }
}