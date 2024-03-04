<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class WebCarouselTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('web_carousel')->delete();
        
        \DB::table('web_carousel')->insert(array (
            0 => 
            array (
                'id' => 23,
                'product_ean' => 'EAN374512',
                'title' => 'test title 1',
                'description' => 'description produktu tutaj',
                'image' => 'carousel/test-title-1/carousel-gc9tl.jpg',
                'created_at' => '2022-09-18 17:56:01',
                'updated_at' => '2022-09-18 17:56:01',
            ),
            1 => 
            array (
                'id' => 24,
                'product_ean' => 'EAN374512',
                'title' => 'Domek Edukacyjny Dla Lalek',
                'description' => 'Super wielofunkcyjny domek edukacyjny dla dzieci od 2-giego roku zycia!!',
                'image' => 'carousel/Domek-Edukacyjny-Dla-Lalek/carousel-KgMQz.jpg',
                'created_at' => '2022-09-18 17:58:31',
                'updated_at' => '2022-09-18 17:58:31',
            ),
            2 => 
            array (
                'id' => 25,
                'product_ean' => 'EAN135649',
                'title' => 'Autka DYNAMO x3Pack',
                'description' => 'zestaw naperdzanych recznie autek dla kazdego! mega wytrwale i solidne zabawki',
                'image' => 'carousel/Autka-DYNAMO-x3Pack/carousel-fOy9Q.jpg',
                'created_at' => '2022-09-18 18:01:59',
                'updated_at' => '2022-09-18 18:01:59',
            ),
            3 => 
            array (
                'id' => 26,
                'product_ean' => 'EAN478534',
                'title' => 'Pianino Mata dla dzieci od 2 do 4 lat',
                'description' => 'sadas dsad fdsf sadf  safasdf err5t h yik oi hwedfew ewpoiuhg  epoi reoig poerigjerpo gjerpoigj eporijh',
                'image' => 'carousel/Pianino-Mata-dla-dzieci-od-2-do-4-lat/carousel-YlKZG.jpg',
                'created_at' => '2022-09-18 18:33:56',
                'updated_at' => '2022-09-18 18:33:56',
            ),
        ));
        
        
    }
}