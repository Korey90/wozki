<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Purchase;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function index(){
        $purchases = Purchase::all();


        foreach($purchases as $k => $w){
            $w->qty = explode(',', $w->qty);
            $w->unit_price = explode(',', $w->unit_price);
            $w->ean_number = explode(',', $w->ean_number);
                /*            
                $i = 0;
                    foreach($w->ean_number as $key => $ean){
                        echo $ean.' -> '.$w->unit_price[$key].' * ',$w->qty[$key].' = '.($w->unit_price[$key]*$w->qty[$key]).'<br>';
                        $i = $i+$w->unit_price[$key]*$w->qty[$key];
                    }
                    echo ' >>'.$i;
                    echo '<hr>';
                */                
        }

//dd($dane->pluck('unit_price', 'qty'));

        return view('admin.purchase.index', ['purchases' => $purchases]);
    }
}
