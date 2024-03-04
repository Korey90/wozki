<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DOMDocument, DOMXPath;
use Illuminate\Support\Facades\DB;
use App\Models\Btb;
use App\Models\Admin\Product;
use App\Models\Admin\Category;
use App\Models\Admin\ProductPhoto;
use Illuminate\Support\Facades\Storage;
use File;

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Reader\Exception;

class BtbController extends Controller{

    public function index(){

        $btb = Btb::sortable()->paginate(50);

           return view('btb.index', ['items' => $btb]);

    }

    public function dashboard(){

        $total_btbs = DB::table('btbs')->count();
        $last_update = DB::table('btbs')->max('updated_at');
        $total_products = Product::count();
        $last_update_products = Product::max('updated_at');
        $total_category = Category::count();
        $total_category_brand = Category::where('brand', 1)->count();
        $last_update_category = Category::max('updated_at');


        return view('btb.dashboard', [
            'total_btbs' => $total_btbs,
            'last_update' => $last_update,
            'total_products' => $total_products,
            'last_update_products' => $last_update_products,
            'total_category' => $total_category,
            'total_category_brand' => $total_category_brand,
            'last_update_category' => $last_update_category,

        ]);
    }



    public function makeIt(){ //Ma za zadanie pobrac plik xml z marini i przetworzyc go do tabeli misql 'b2b'

        ini_set('memory_limit', '2G');
        
        // Zwiększenie limitu czasu wykonania na 2 minuty
        set_time_limit(0);


        $file = 'https://marini.pl/b2b/marini-b2b.xml';

        // Load the XML file into a DOMDocument object
        $dom = new DOMDocument;
        $dom->load($file);
            
        // Use the DOMXPath class to query the XML data
        $xpath = new DOMXPath($dom);
        $items = $xpath->query('b2b');


        $produktyBezEanu = 0;
        $produktyBezFotki = 0;

        foreach($items as $item){

            $kod   = $item->getElementsByTagName('kod')[0]->nodeValue;
            $nazwa = $item->getElementsByTagName('nazwa')[0]->nodeValue;
            $cena  = $item->getElementsByTagName('cena')[0]->nodeValue;
            $vat   = $item->getElementsByTagName('VAT')[0]->nodeValue;
            $stan  = $item->getElementsByTagName('stan')[0]->nodeValue;
            $ean   = $item->getElementsByTagName('EAN')[0]->nodeValue;
            $grupa = $item->getElementsByTagName('grupa')[0]->nodeValue;
            $opis  = $item->getElementsByTagName('opis')[0]->nodeValue;


            if(strpos($grupa, 'WÓZKI')){
                if(empty($ean) OR empty($opis)){
                    $produktyBezEanu++;
                    continue;
                }
            
                if(isset($item->getElementsByTagName('zdjecia')[0]->nodeValue)){
                    $foto = $item->getElementsByTagName('zdjecia')[0]->nodeValue;
                }else{
                    $produktyBezFotki++;
                    $foto = null;
                }
    
            
                DB::table('btbs')->insert([
                    'kod'           =>      $kod,
                    'nazwa'         =>      $nazwa,
                    'nazwa_en'      =>      '',
                    'cena'          =>      $cena,
                    'VAT'           =>      $vat,
                    'stan'          =>      $stan,
                    'EAN'           =>      $ean,
                    'grupa'         =>      $grupa,
                    'opis'          =>      $opis,
                    'opis_en'       =>      '',
                    'zdjecia'       =>      $foto,
                ]);
            }



        }

        return 'Tabela B2B zostala przygotowana teraz mozna ja zintegrować <a href="'.route('btb.integrate').'">link</a> <hr>Produkty Bez Eanu: '.$produktyBezEanu.'<br> Produkty bez Fotki: '.$produktyBezFotki;

    }

   

    public function assignCategories(){ // ma za zadanie przypisac produkty do kategorii
        ini_set('memory_limit', '2G');
        
        // Zwiększenie limitu czasu wykonania na 2 minuty
        set_time_limit(0);
        
        $btb = Btb::sortable()->get();
        //$products = Product::all();
        
        
        $allGroups = [];
        foreach($btb as $g){
            $grupyAll =  explode('/', $g->grupa);

            foreach($grupyAll as $value){
                if (!in_array($value, $allGroups)) {
                    $allGroups[] = $value;
                }
            }

        }



        $c = 0;
        foreach($btb as $itemBtb){
            $grupyAll =  explode('/', $itemBtb->grupa);
            //$product = Product::find($itemBtb->id);
            foreach($grupyAll as $g){
                $product = Product::where('id', '=', $itemBtb->id)->first('id');
                $grupa = Category::where('name', '=', $g)->first('id');

                //echo $products.'<hr>';
                $product->categories()->attach($grupa);
                $c++;
            }

        }



        return 'Zaktualizowano '.$c.' kategorii.';


         //   return view('btb.index', ['items' => $btb, 'grupy' => $allGroups]);
    }


    public function integrate(){ // funkcja pobiera wszystkie Eany z tabeli products, 

        ini_set('memory_limit', '2G');
        set_time_limit(0);

        // Pobierz listę EAN z bazy danych
        $existingEANs = Product::pluck('ean_number')->toArray();

        $regexPatterns = $this->getRegexPatterns();

        //DB::beginTransaction();

        try {
            Btb::chunk(200, function ($btbChunk) use ($existingEANs, $regexPatterns) {
                foreach ($btbChunk as $value) {
                    if (in_array($value->EAN, $existingEANs)) {
                        continue;
                    }

                    $this->processProduct($value, $regexPatterns);

                }
            });

            //DB::commit();
            return 'integracja chyba się udała';

        } catch (\Exception $e) {
        //    DB::rollBack();
            return 'Błąd integracji: ' . $e->getMessage();
        }
    }

    public function bdIntegrate(){

        $file = storage_path('app/new-products.xlsx');
        //$file = $request->file('excel_file'); // Pobierz przesłany plik Excel z formularza

        if (file_exists($file)) {
            $excelData = []; // Tutaj umieść dane z arkusza kalkulacyjnego po odczytaniu

            try {
                $spreadsheet = IOFactory::load($file);
                $worksheet = $spreadsheet->getActiveSheet();
                $rows = $worksheet->toArray();
                

                // Przeszukaj wiersze i umieść dane w tablicy $excelData
                foreach ($rows as $row) {
                    $excelData[] = [
                        'product_code' => $row[0],
                        'product_name' => $row[1],
                        'brand' => $row[2],
                        'product_description' => $row[3],
                        'product_features' => $row[4],
                        'part_number' => $row[5],
                        'barcode' => $row[6],
                        'price' => $row[7],
                        'srp' => $row[8],
                        'commodity_code' => $row[9],
                        'country_of_origin' => $row[10],
                        'item_weight_grams' => $row[11],
                        'item_length_cm' => $row[12],
                        'item_width_cm' => $row[13],
                        'item_height_cm' => $row[14],
                        'carton_barcode' => $row[15],
                        'carton_weight_grams' => $row[16],
                        'carton_length_cm' => $row[17],
                        'carton_width_cm' => $row[18],
                        'carton_height_cm' => $row[19],
                        'carton_quantity' => $row[20],
                    ];
                }

                // Zapisz dane do bazy danych
                foreach ($excelData as $key => $data) {
                    if($key <= 1){
                        continue;
                    }
                    //dd($data);
                    DB::table('bd')->insert($data);
                }

                // Wyświetl dane w tablicy $excelData w celach diagnostycznych
               // dd($excelData);
                return 'wszystko zaktualizowane';
                //return redirect()->back()->with('success', 'Dane zostały zaimportowane.');
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Wystąpił błąd podczas importowania danych: ' . $e->getMessage());
            }
        }

        return redirect()->back()->with('error', 'Nie znaleziono przesłanego pliku Excel.');






    }

    private function getRegexPatterns(){
        return [
            'waga' => '/(\d+(\.\d+)?)\s*kg/i',
            'dlugosc' => '/(\d+(\.\d+)?)\s*(cm|centymetry)/i',
            'szerokosc' => '/(\d+(\.\d+)?)\s*(cm|centymetry)/i',
            'wysokosc' => '/(\d+(\.\d+)?)\s*(cm|centymetry)/i'
        ];
    }

    private function processProduct($value, $regexPatterns){
    

        $measurements = $this->extractMeasurements($value->opis, $regexPatterns);

        // Tworzenie produktu
        $product = Product::create([
            'supplier_id'    => 4,
            'title'          => $value->nazwa,
            'ean_number'     => $value->EAN,
            'price'          => $value->cena,
            'sale_price'     => $value->cena + ($value->cena * 0.20),
            'delivery_cost'  => '',
            'status'         => 'active',
            'code'           => $value->kod,
            'vat'            => $value->VAT,
        ]);

        // Jeśli puste, ustaw jako null
        $value->opis_en = empty($value->opis_en) ? null : $value->opis_en;
        $value->nazwa_en = empty($value->nazwa_en) ? null : $value->nazwa_en;

        // Tworzenie opisu produktu
        \App\Models\Admin\ProductDescription::create([
            'product_id'            => $product->id,
            'front_title'           => $value->nazwa,
            'front_title_en'        => $value->nazwa_en,
            'short_description'     => substr($value->opis, 0, 255),
            'short_description_en'  => substr($value->opis_en, 0, 255),
            'long_description'      => $value->opis,
            'long_description_en'   => $value->opis_en,
            'basket_description'    => '',
            'meta_tags'             => '',
            'meta_description'      => '',
        ]);

        // Tworzenie szczegółów produktu
        \App\Models\Admin\ProductDetail::create([
            'product_id'        => $product->id,
            'weight'            => $measurements['waga'] !== null ? $measurements['waga'] . " kg" : "",
            'width'             => $measurements['szerokosc'] !== null ? $measurements['szerokosc'] . " cm" : "",
            'height'            => $measurements['wysokosc'] !== null ? $measurements['wysokosc'] . " cm" : "",
            'deepth'            => $measurements['dlugosc'] !== null ? $measurements['dlugosc'] . " cm" : "",
        ]);

        // Tworzenie danych magazynowych
        \App\Models\Admin\Stock::create([
            'product_id' => $product->id,
            'current_qty' => 10,
            'minimum_stock' => 5,
            'maximum_stock' => 50,
        ]);

      //  dd($product);
        if($value->zdjecia != null) {
            $this->storeProductImages($product->id, $value->zdjecia, $value->EAN);
        }
    }

    private function extractMeasurements($description, $regexPatterns){
        $measurements = [];

        foreach ($regexPatterns as $key => $pattern) {
            if (preg_match($pattern, $description, $matches)) {
                $measurements[$key] = $matches[1];
            } else {
                $measurements[$key] = null;
            }
        }

        return $measurements;
    }


    private function storeProductImages($productId, $imageUrls, $productEAN){

        if (!Storage::disk('local')->exists('products2/'.$productEAN)) {
            foreach (explode(' ', $imageUrls) as $image) {
                $path_parts = pathinfo($image);
                $rand = rand();
                $dir = 'products2/'.$productEAN .'/'.$rand.'.'.$path_parts['extension'];
                $image_data = file_get_contents($image);
            
                Storage::put($dir, $image_data);
            
            }   

        }else{
            $dir = null;
        }

        // Zapisz URL zdjęcia w bazie danych
        \App\Models\Admin\ProductPhoto::create([
            'product_id' => $productId,
            'photo' => $dir,
        ]);
    }


}
