<?php

namespace App\Http\Controllers\Store;

use App\Models\Store\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Storage;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();

        $carousel = DB::table('web_carousel')->get();
       

  //      dd($products);
        return view('store.product.index', ['products' => $products, 'carousel' => $carousel]);
    }

    public function show($ean){

        $product = Product::where('ean_number', $ean)->with('productDescription', 'productDetail', 'productSupplier', 'productPhotos', 'categories')->first();

        $dir = $product->productPhotos->first()->photo;
        $urle = $this->getPhoto('public/'.$dir);
        $updatedPaths = array_map(function($urle) {
            return str_replace('public/', 'storage/', $urle);
        }, $urle);


        $product->productPhotos->photo = $updatedPaths;

        return view('store.product.show', ['product' => $product]);

    }


    private function getPhoto($directory){
        
        if($directory == null){
            return '';
        }else{

        }
        // Pobierz listę plików w folderze
        $files = Storage::files($directory);

        return $files;


    }
}
