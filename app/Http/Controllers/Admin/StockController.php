<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Stock;
use App\Models\Admin\StockRotation;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function index(){
        $stocks = Stock::with('productInformation')->get();
        //dd($stock);
        return view('admin.stock.index', ['stocks' => $stocks]);
    }

    public function show($ean){
        return 'hellllo'.$ean;
    }


    public function stockHistory($ean){

        $stock = StockRotation::where('product_ean', '=', $ean)->get();

        return view('admin.stock.history', ['stock' => $stock]);
    }
}
