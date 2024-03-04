<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Admin\User;
use App\Models\Admin\Category;
use App\Models\Admin\Product;
use App\Models\Admin\UserDetails;
use App\Models\Admin\UserAddress;
use App\Models\Admin\UserCompany;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\MessageBag;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Artisan;

class WelcomeController extends Controller {

    public function welcome(){
        $brands = Category::where('brand', 1)->get();
        $chunks = $brands->chunk(5);

        $wozki = Category::where('name', 'wózki')->first();
        if($wozki){
            $losoweWozki = $wozki->products()->with('productPhotos')->inRandomOrder()->take(5)->get();

            foreach($losoweWozki as $wozek){
               $dir = $wozek->productPhotos->photo;
               $url = $this->getPhoto('public/'.$dir); 
            //   dd($url);

               $wozek->productPhotos->photo = str_replace('public/', 'storage/', $url);
            }

        }else{
            $losoweWozki = collect();
        }

        ///////////////////////////////////////////////////        

        $bottels = Category::where('name', 'BUTELKI I KUBKI')->first();
        if($bottels){
            $randomBottels = $bottels->products()->with('productPhotos')->inRandomOrder()->take(5)->get();

            foreach($randomBottels as $bottle){
                $dir = $bottle->productPhotos->photo;
                $url = $this->getPhoto('public/'.$dir); 
 
                $bottle->productPhotos->photo = str_replace('public/', 'storage/', $url);
            }

        } else {
            $randomBottels = collect();
        }        

        ///////////////////////////////////////////////////        

        $smoczki = Category::where('name', 'smoczki')->first();
        if($smoczki){
            $randomSmoczki = $smoczki->products()->with('productPhotos')->inRandomOrder()->take(5)->get();

            foreach($randomSmoczki as $bottle){
                $dir = $bottle->productPhotos->photo;
                $url = $this->getPhoto('public/'.$dir); 
 
                $bottle->productPhotos->photo = str_replace('public/', 'storage/', $url);
            }

        }else{
            $randomSmoczki = collect();
        }
            


        return view('welcome', [
                        'chunks' => $chunks, 
                        'randomProducts' => $losoweWozki, 
                        'randomBottels' => $randomBottels,
                        'randomSmoczki' => $randomSmoczki,
                    ]);
    }

    private function getPhoto($directory){
        
        if($directory == null){
            return '';
        }
        // Pobierz listę plików w folderze
        $files = Storage::files($directory);

        if (!empty($files)) {
            // Wybierz pierwszy plik z listy
            $firstFile = $files[0];
        
            // Generuj URL dla pierwszego pliku
            return $firstFile;
//            return Storage::disk('local')->url($firstFile);
        }else{
            return null;
        }

    }

}
