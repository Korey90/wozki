<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SupplierContactsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('supplier_contacts')->delete();
        
        \DB::table('supplier_contacts')->insert(array (
            0 => 
            array (
                'id' => 1,
                'phone' => '+44 7898 678 873',
                'email' => 'info@eastsun4u.com',
                'fax' => '01159751503',
                'facebook' => 'https://www.facebook.com/EastsunToys/',
                'telegram' => NULL,
                'whatsapp' => NULL,
                'website' => 'https://www.eastsun4u.com/',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'phone' => '+44 8795 345 334',
                'email' => 'lego@support.com',
                'fax' => '01159731433',
                'facebook' => 'https://www.facebook.com/legoToys/',
                'telegram' => '@LegoSupport',
                'whatsapp' => NULL,
                'website' => 'http://www.lego.com',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}