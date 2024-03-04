<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductDescriptionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('product_descriptions')->delete();
        
        \DB::table('product_descriptions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'EastSun Cart Pack 3 vechicles in 1 box',
                'meta_tags' => 'super wytrzymale autka dla dziecka w wieku do 3 lat',
                'meta_description' => 'tutaj krotki opis meta description',
                'short_description' => 'tutak bedzie ktorki opis pokazywany na sugestiach',
                'long_description' => 'tosamo co krotki opis albo jakis wydluzony opis produktu.. to bedzie pokazywane na stronie - widoku danego protuktu',
                'basket_description' => 'krotszy opis protuktu pokazywany w baskecie',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'title' => 'EastSun Educational House toy',
                'meta_tags' => 'domek dla dzieci, education, fun, tags dla meta',
                'meta_description' => 'sumer domek edukacyjny dla dzieci meta opis',
                'short_description' => 'short description visible on products page or main page',
                'long_description' => 'W przeciwieństwie do rozpowszechnionych opinii, Lorem Ipsum nie jest tylko przypadkowym tekstem. Ma ono korzenie w klasycznej łacińskiej literaturze z 45 roku przed Chrystusem, czyli ponad 2000 lat temu! Richard McClintock,',
                'basket_description' => 'Super House basket opis',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'title' => 'LEGO Mat super play music',
                'meta_tags' => 'mata tag, super tag, fun tag',
                'meta_description' => 'meta opis dla maty grajacej jest cooooool',
                'short_description' => 'ktotki opis produktu no bo dlugi jest gdzie indziej',
                'long_description' => 'Nulla ac eleifend nisi. Proin at dolor suscipit, pellentesque diam et, rhoncus odio. Nunc varius lectus maximus neque ultricies, vitae sagittis leo tincidunt. Vestibulum a eros dapibus, faucibus lacus ac, tristique tortor. Cras elementum tellus bibendum elit sagittis pulvinar ullamcorper sit amet nulla. Praesent eu felis viverra, luctus arcu egestas, gravida orci.',
                'basket_description' => 'basket opis dla LEGO MAT',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'title' => 'Lego Grzechotki tytul produktu widziany na stronie kupca',
                'meta_tags' => 'grzechotki tag, dla, meta',
                'meta_description' => 'grzechotki tez maja meta taki zeby bylo super',
                'short_description' => 'No a gdyby tak liczyc ilosc znakow opisu i go ucinac... hmm',
                'long_description' => 'Vestibulum mattis lectus sit amet dolor posuere dapibus. Sed sagittis erat sit amet vehicula volutpat. Nullam risus mauris, pretium non nisl eu, aliquet viverra leo. Vestibulum tellus enim, pulvinar sit amet venenatis id, maximus id risus. Nullam eget sagittis nulla. Fusce vel ornare nulla. Nunc porttitor neque massa, eu laoreet erat eleifend ac.',
                'basket_description' => 'Grzechotki sa super we koszyku',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}