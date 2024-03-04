<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Session;
use App\Models\Admin\Product;
use App\Models\Admin\ProductDetail;
use App\Models\Admin\ProductDescription;
use App\Models\Admin\Stock;
use App\Models\Admin\Tag;
use Illuminate\Support\Facades\DB;

use App\Models\Admin\Supplier;


use App\Http\Controllers\Controller;
use App\Models\Admin\ProductPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    public function index(Request $request){
        $query = Product::query();

        // Filtracja wg Kategorii
        if ($request->filled('kategoria')) {
            $query->whereHas('categories', function($q) use ($request) {
                $q->where('category_id', $request->kategoria);
            });
        }

        // Filtracja według nazwy produktu
        if ($request->filled('product_name')) {
            $query->where('title', 'like', '%' . $request->product_name . '%');
        }
        // Filtracja według ID
        if ($request->filled('product_id')) {
            $query->where('id', 'like', '%' . $request->product_id . '%');
        }
        // Filtracja według EAN
        if ($request->filled('product_ean')) {
            $query->where('ean_number', 'like', '%' . $request->product_ean . '%');
        }
        // Filtracja według VAT
        if ($request->filled('product_vat')) {
            $query->where('vat', $request->product_vat . '%');
        }


        // Zakres dla cena:
        if ($request->filled('cena_od')) {
            $query->where('sale_price', '>=', $request->cena_od);
        }
        if ($request->filled('cena_do')) {
            $query->where('sale_price', '<=', $request->cena_do);
        }
        
        

        // Zakres dla stanu/ilości: od do
        if ($request->filled('stan_od')) {
            $query->whereHas('productStock', function($q) use ($request) {
                $q->where('current_qty', '>=', $request->stan_od);
            });
        }
        
        if ($request->filled('stan_do')) {
            $query->whereHas('productStock', function($q) use ($request) {
                $q->where('current_qty', '<=', $request->stan_do);
            });
        }

        // Zakres dla wagi od do: 
        if ($request->filled('waga_od')) {
            $query->whereHas('productDetail', function($q) use ($request) {
                $q->whereRaw('CAST(weight AS DECIMAL(10,2)) >= ?', [$request->waga_od]);
            });
        }
                
        if ($request->filled('waga_do')) {
            $query->whereHas('productDetail', function($q) use ($request) {
                $q->whereRaw('CAST(weight AS DECIMAL(10,2)) <= ?', [$request->waga_do]);
            });
        }

        // Zakres dla Wysokości od do: 
        if ($request->filled('wysokosc_od')) {
            $query->whereHas('productDetail', function($q) use ($request) {
                $q->whereRaw('CAST(height AS DECIMAL(10,2)) >= ?', [$request->wysokosc_od]);
            });
        }
                
        if ($request->filled('wysokosc_do')) {
            $query->whereHas('productDetail', function($q) use ($request) {
                $q->whereRaw('CAST(height AS DECIMAL(10,2)) <= ?', [$request->wysokosc_do]);
            });
        }
        // Zakres dla Szerokości od do: 
        if ($request->filled('szerokosc_od')) {
            $query->whereHas('productDetail', function($q) use ($request) {
                $q->whereRaw('CAST(width AS DECIMAL(10,2)) >= ?', [$request->szerokosc_od]);
            });
        }
                
        if ($request->filled('szerokosc_do')) {
            $query->whereHas('productDetail', function($q) use ($request) {
                $q->whereRaw('CAST(width AS DECIMAL(10,2)) <= ?', [$request->szerokosc_do]);
            });
        }
        // Zakres dla Głębokości od do: 
        if ($request->filled('glebokosc_od')) {
            $query->whereHas('productDetail', function($q) use ($request) {
                $q->whereRaw('CAST(deepth AS DECIMAL(10,2)) >= ?', [$request->glebokosc_od]);
            });
        }
                
        if ($request->filled('glebokosc_do')) {
            $query->whereHas('productDetail', function($q) use ($request) {
                $q->whereRaw('CAST(deepth AS DECIMAL(10,2)) <= ?', [$request->glebokosc_do]);
            });
        }

        // Filtracja według Producent
        if ($request->filled('producent')) {
            $query->where('supplier_id', $request->producent . '%');
        }

        // Po zakończeniu dodawania wszystkich filtrów, pobieramy wyniki
        $products = $query->paginate(50);

        return view('admin.product.index', ['products' => $products, 'request' => $request]);
    }

    public function index555()
    {
//        $products = $this->getProductsWithRelations();
        $products = Product::with('productDescription', 'productDetail', 'productSupplier')->paginate(50);
//        $products->paginate(50)->get();
        return view('admin.product.index', ['products' => $products]);
    }
    
    public function search(Request $request)
    {
        $products = $this->getProductsWithRelations($request->search);
        return view('admin.product.index', ['products' => $products]);
    }
    
    private function getProductsWithRelations($search = null)
    {
        $query = Product::query()->with('productDescription', 'productDetail', 'productSupplier');
        
        if ($search) {
            $query->where(function ($query) use ($search) {
                $query->where('ean_number', 'like', '%' . $search . '%')
                    ->orWhereHas('productDescription', function ($query) use ($search) {
                        $query->where('title', 'like', '%' . $search . '%');
                    });
            });
        }
        
        return $query->sortable()->paginate(50)->get();
    }

    public function duplicates(){

        $db = Product::with('productDescription', 'productDetail', 'productSupplier')->get();

        $products = collect($db);
        $products->duplicates('code');
        return view('admin.product.index', ['products' => $products]);

    }


    public function show($id){

        $product = Product::where('id', '=', $id)->with(
                                                            'productDescription', 
                                                            'productDetail',
                                                            'productStock', 
                                                            'productSupplier', 
                                                            'productSupplier.supplierCompany', 
                                                            'productSupplier.supplierContact',
                                                            'productPhotos',
                                                            'categories')->first();

            $dir = $product->productPhotos->photo;
            //dd($dir);
            $fotki = $this->getPhoto('public/'.$dir);
       //     dd($fotki);
            $updatedPaths = array_map(function($fotki) {
                return str_replace('public/', 'storage/', $fotki);
            }, $fotki);
    
            $product->productPhotos->photo = $updatedPaths;


        return view('admin.product.show', ['product' => $product]);
    }


    public function create(){
        $supplier_name_and_id = Supplier::select('id', 'title')->get();

        return view('admin.product.create', ['suppliers' => $supplier_name_and_id]);
    }



    public function store(Request $request){
        ////////////////// Validiacja ///////////////////////
       $request->validate([
            'title'                 => 'required|max:120',//////
            'supplier_id'           => 'required|numeric',///////
            'ean_number'            => 'required|string',///////
            'weight'                => 'required|numeric',//////
            'weight_measure'        => 'required|ends_with:g,kg',//////
            'height'                => 'required|numeric',//////
            'height_measure'        => 'required|ends_with:cm,m,mm',//////
            'width'                 => 'required|numeric',//////
            'width_measure'         => 'required|ends_with:cm,m,mm',//////
            'deepth'                => 'required|numeric',//////
            'deepth_measure'        => 'required|ends_with:cm,m,mm',//////
            'front_title'           => 'required|string',////////
            'short_description'     => 'required|string',////////
            'long_description'      => 'required|string',////////
            'basket_description'    => 'required|string',////////
            'meta_tags'             => 'required|string',////////
            'meta_description'      => 'required|string',////////
            'price'                 => 'required|numeric',/////
            'sale_price'            => 'required|numeric',/////
            'delivery_cost'         => 'required|numeric',////
            'current_qty'           => 'required|numeric',////////////
            'minimum_stock'         => 'nullable|numeric',////////////
            'maximum_stock'         => 'nullable|numeric',////////////
            'tags'                  => 'required',////
            'status'                => 'required|string',//////
            'productImages.*'       => 'required|image|mimes:jpeg,jpg,png,gif',/////
            'submit'                => 'required|string',
        ]);


        ////////////////// Creating tags if not exist ///////////////////////
        $tags = explode(',', $request->tags);
        
        foreach($tags as $key => $val){
           $data = ['name' => $val];
           $validator = Validator::make(
                            $data, 
                            ['name' => 'unique:tags'],//// 
                            ['unique' => 'Tag ('.$data['name'].') already taken']
                        );


            if(!$validator->fails()){
                $newTag = Tag::create([
                    'name' => $data['name'],
                ]);
            }
            unset($data);
        }
        

        ////////////////// DETAILS ///////////////////////
        $ProductDetail = ProductDetail::create([
            'weight'            => $request->weight.' '.$request->weight_measure,
            'height'            => $request->height.' '.$request->height_measure,
            'width'             => $request->width.' '.$request->width_measure,
            'deepth'            => $request->deepth.' '.$request->deepth_measure,
        ]);


        ////////////////// DESCRIPTION ///////////////////////
        $ProductDescription = ProductDescription::create([
            'front_title'           => $request->front_title,
            'short_description'     => $request->short_description,
            'long_description'      => $request->long_description,
            'basket_description'    => $request->basket_description,
            'meta_tags'             => $request->meta_tags,
            'meta_description'      => $request->meta_description,
        ]);


        ////////////////// Product ///////////////////////
        $product = Product::create([
            'supplier_id'    => $request->supplier_id,
            'detail_id'      => $ProductDetail->id,
            'description_id' => $ProductDescription->id,   
            'title'          => $request->title,
            'ean_number'     => $request->ean_number,
            'price'          => $request->price,
            'sale_price'     => $request->sale_price,
            'delivery_cost'  => $request->delivery_cost,
            'status'         => $request->status,
        ]);


        ////////////////// Stocks ///////////////////////
        $stock = Stock::create([
            'product_id' => $product->id,
            'current_qty' => $request->current_qty,
            'minimum_stock' => $request->minimum_stock,
            'maximum_stock' => $request->maximum_stock,
        ]);


        ////////////////// przypisanie Tagow do pivota ///////////////////////
        // ... ... ...

        ////////////////// Upload Obrazka ///////////////////////
        foreach($request->productImages as $image){
            $dir = 'products/'.str_replace(" ", "-", $request->title).'/';
            $newFileName = 'product-'.rand().'.'.$image->extension();
            $image->storeAs($dir, $newFileName, 'public');  
        
            //store photos url in db
            $photo = ProductPhoto::create([
                'product_id' => $product->id,
                'photo' => $dir.$newFileName,
            ]);
        }

       return back()->with('status', 'ok  has ben Created successfully.');
    }

    public function edit($id){

        $suppliers = Supplier::all();
        $product = Product::where('id', '=', $id)->with('productPhotos')->first();

        $dir = $product->productPhotos->photo;// nazwa folderu z plikami

        $fotki = $this->getPhoto('public/'.$dir);

        $updatedPaths = array_map(function($fotki) {
            return str_replace('public/', 'storage/', $fotki);
        }, $fotki);

        $product->productPhotos->photo = $updatedPaths;
        
        //dd($updatedPaths);
       
//       $product->productPhotos->photo

        return view('admin.product.edit', ['product' => $product, 'suppliers' => $suppliers]);
    }


    public function saveMe(Request $request) {
        $value = $request->input('value');
        $field = $request->input('field');
        $ean = $request->input('ean');

        $productFields = ['supplier_id', 'status', 'description_id', 'detail_id', 'title', 'status', 'ean_number', 'price', 'sale_price', 'delivery_cost'];
        $productDescriptionFields = ['front_title', 'short_description', 'long_description', 'basket_description', 'meta_tags', 'meta_description'];
        $stockFields = ['current_qty', 'minimum_stock', 'maximum_stock'];
        $productDetaisFields = ['weight', 'height', 'width', 'deepth'];

        $product = Product::where('ean_number', '=', $ean)->first();

        if(in_array($field, $productFields)){
            $update = $product->update(
                [$field => $value]
            );
        } 
        else if(in_array($field, $productDescriptionFields)){
            $update = ProductDescription::where('product_id', $product->id)->update(
                [$field => $value]
            );
        }else if(in_array($field, $stockFields)){
            $update = Stock::where('product_id', $product->id)->update(
                [$field => $value]
            );
        }else if(in_array($field, $productDetaisFields)){
            $update = ProductDetail::where('product_id', $product->id)->update(
                [$field => $value]
            );
        }
    
        if(!$update){
            return response()->json([1]);
        }else{
            return response()->json([2]);
        }


    }

    public function deletePhoto(Request $request){

        $foto = str_replace('storage/', 'public/', $request->deletedPhoto);

        if(Storage::get($foto) !== null) {
            Storage::delete($foto);
         }else{
            return back()->withErrors(['Error: File Could not be find']);
         }
    
        return back()->with('status', 'Photo has been deleted.');
    }

    public function updatePhoto(Request $request){
                ////////////////// Validiacja ///////////////////////
       $request->validate([
        'productImages.*'       => 'required|image|mimes:jpeg,jpg,png,gif',/////
        'editedPhoto'           => 'required|integer',
        'id'                 => 'required',
       ]);

       $ean = Product::where('id', $request->id)->pluck('ean_number');
       

        ////////////////// Upload Obrazka ///////////////////////
        foreach($request->productImages as $image){
            
            $path_parts = $image->getClientOriginalExtension();

            $rand = rand();
            $dir = 'public/products2/'.$ean[0] .'/'.$rand.'.'.$path_parts;
        
            Storage::put($dir, file_get_contents($image));
        
        }

        if(ProductPhoto::where('product_id', $request->id)->first() == null){
            ProductPhoto::create([
                'product_id' => $request->id,
                'photo' => 'products2/'.$ean,
            ]);
        }
                

       return back()->with('status', 'ok it has ben Updated successfully.');
    }


    public function updatePrice()
    {
        return view('admin.product.updatePrice');
    }




    public function delete(Request $request){
        $product = Product::findOrFail($request->product_id);
        

        //RELATED TABLES
        $productDescription = ProductDescription::findOrFail($product->description_id);
        $productDetails = ProductDetail::find($product->detail_id);
        $productPhotos = ProductPhoto::where('product_id', '=', $request->product_id)->get();
        //dd($productPhotos);

        foreach($productPhotos as $photo){
            if(Storage::get('public/'.$photo->photo) !== null && Storage::delete('public/'.$photo->photo)) {
                $photo->delete();
             }else{
                return back()->withErrors(['Error: File Could not be find']);
             }                        
        }

        $product->delete();
        $productDescription->delete();
        $productDetails->delete();

        return 'usunelo';

       // return back()->with('status', 'User has ben deleted successfully.');
    }


    private function getPhoto($directory){
        
        if($directory == null){
            return null;
        }else{

        }
        // Pobierz listę plików w folderze
        $files = Storage::files($directory);

        return $files;


    }
}