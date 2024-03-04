<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SupplierCompaniesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('supplier_companies')->delete();
        
        \DB::table('supplier_companies')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Eastsun Import Ltd',
                'vat_id' => 'GB270759579',
                'eori_id' => 'GB270759579000',
                'logo' => 'https://images.squarespace-cdn.com/content/v1/60122a34898aa4550963abea/e0ab69dd-9326-4b48-8bbd-d9e612088d73/1.png',
                'description' => 'Eastsun Import Ltd, focusing on the happy growth of children, through years of research and observation on children, combined with Chinese and Western education, develops and designs different toys for children of different ages, and accompanies children to grow up happily. It is not only a toy, but also a child’s partner',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Lego UK Ltd',
                'vat_id' => 'GB270742869',
                'eori_id' => 'GB470754522900',
                'logo' => 'https://www.lego.com/cdn/cs/history/assets/blt34fefa5d891cd982/logo_1973.JPG?width=30&quality=80',
                'description' => 'As children shape their own worlds with LEGO bricks, we play our part in having a positive impact on the world they live in today and will inherit in the future.',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}