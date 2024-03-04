<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DOMDocument, DOMXPath;
use Illuminate\Support\Facades\DB;

use App\Models\Admin\Product;
use Illuminate\Support\Facades\Storage;


class TranslateController extends Controller
{
  
    public function translate(){
        set_time_limit(0); // 300 sekund


        $produkty = Product::where('title_en', '')->get();
       // $url = 'https://script.google.com/macros/s/AKfycbzVX2kdsck9jpiG32wv9_0UxG6owipJjiJFOgvozPNHe_4v0JutJC_zTu-NPuGunSR2QA/exec'; // net
        $url = 'https://script.google.com/macros/s/AKfycbxgLkCai9A3oT4x_jkU8de6HF26AXoWmaBNvFgWy7_denA_ZnCunuoXAVW1TFPdWWj3/exec'; //palka zaplaka
   //     $url = 'https://script.google.com/macros/s/AKfycbx-6RD93IXHuIFcbbeayaC791xa-9Q6dhjMY3hm5qw3OQiDI6bgDTjPPPtkl9HRQ1C_pA/exec'; //ja
   //     $url = 'https://script.google.com/macros/s/AKfycbzdXTEYALMB8UU1nbyCyTMmV-ik7Vd_A2oD3EuNDT50W6ETzrt2iTq9Dc3qG2kwZI9CoQ/exec'; // lina
    //      $url = 'https://script.google.com/macros/s/AKfycbz96GhLhIfcu6-1wbLDcz52l9LjCO4oibAtA7AJHrLsXiDiatmo2Hae19Plta1beLZB5A/exec'; //mksi.kontakt

        foreach($produkty as $produkt){
            $text = $produkt->title;

            if(empty($produkt->title_en)){
                $ch = curl_init($url);

                curl_setopt_array($ch, [
                    CURLOPT_FOLLOWLOCATION => 1,
                    CURLOPT_RETURNTRANSFER => 1,
                    CURLOPT_POSTFIELDS => http_build_query([
                        "source_lang" => 'pl',
                        "target_lang" => 'en',
                        "text" => $text,
                    ])
                ]);
            
                $result = curl_exec($ch);
                $data = json_decode($result, 1);
                //dd($data);
            if(isset($data['status']) AND $data['status'] == "error" ){
                dd($data);
            }
            //dd($data);
                 $translated = $data['translatedText'];

               Product::where('id', $produkt->id)->update(['title_en' => $translated]);
           }

        
            curl_close($ch);



        }

        return 'Chyba sie udało';

     

    }

    
}

