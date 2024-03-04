<?php
namespace App\Http\Livewire;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use SimpleXMLElement;

class XmlImport extends Component
{
    public $updated_products;
    public $total_products;
    public $progress = 0;

    public function render()
    {
        return view('livewire.xml-import');
    }

    public function importXml()
    {
        ini_set('memory_limit', '8192M');

        $url = 'https://marini.pl/b2b/marini-b2b.xml';
        $xml = file_get_contents($url);
        $xmlObject = new SimpleXMLElement($xml);

        $items = $xmlObject->xpath('b2b');
        dd($items);

        $this->total_products = count($items);
        $this->updated_products = 0;

        foreach($items as $item){

            DB::table('products')->where('code', $item->kod)->update(['price' => $item->cena]);

            $this->progress = round($this->updated_products / $this->total_products * 100, 0);
            
            // Opóźnienie potrzebne do symulowania długiego przetwarzania
            $this->updated_products++;
            
            sleep(2);
        }

    }
}
