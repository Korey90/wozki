<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Product;
use App\Http\Controllers\Controller;
use App\Models\Admin\Promotion;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    public function index(){

        $promotions = Promotion::all();

        return view('admin.promotion.index', ['promotions' => $promotions]);
    }


    public function create(){
        return view('admin.promotion.create');
    }

    public function store(Request $request){

        //dd($request);
        $typ = [
            0 =>  'Rabat kwotowy na produkty',
            1 =>  'Rabat kwotowy na zamówienie',
            2 =>  'Kup X, a otrzymasz Y',
            3 =>  'Darmowa wysyłka',
            4 =>  'Promocja na produkt',
        ];

        $request->validate([
            'title'             => 'nullable',
            'typ'               => 'required',
            'value'             => 'numeric',
            'value_option'      => 'ends_with:pln,procent',
            'selected_products' => 'required',
            'status'            => 'required|ends_with:active,draw,disabled',
            'requirment'        => 'nullable',
            'valid_from'        => 'required|date',
            'valid_to'          => 'date',
            'code'              => 'nullable|string',
        ]);


        Promotion::create([
            'title'   => $request->title,
            'typ'     => $request->typ,
            'value'   => $request->value.' '.str_replace('procent', '%', $request->value_option),
            'products'   => implode('|', $request->selected_products),
            'status'      => $request->status,
            'requirments'      => $request->requirment,
            'valid_from'      => $request->valid_from,
            'valid_to'    => $request->valid_to,
            'code'    => $request->code,
        ]);
        
        return back()->with('status', 'Promotion has ben Created successfully.');
    }



    public function findddd(Request $request){
        $element = $request->productfind;
    
        $products = Product::where('title', 'like', '%'.$element.'%')
                    ->orWhere('ean_number', 'like', '%'.$element.'%')
                    ->get();
    
        return response()->json($products);
    }


    public function find(Request $request)
    {
        $searchTerm = $request->input('searchTerm');
        $products = Product::where('title', 'like', '%'.$searchTerm.'%')->get();
        return response()->json($products);
    }
    
}
