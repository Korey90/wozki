<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Transaction;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view('admin.index');
    }
    public function dashboard(){
        return view('admin.dashboard');
    }
    public function login(){
        return view('admin.login');
    }

    public function inne(){
       
        $transactions = Transaction::orderBy('id', 'desc')->get();

        //dd($transactions);
        return view('admin.inne', ['transactions' => $transactions]);
    }

    public function filter(Request $request)
{

        // Pobierz dane z żądania
        $typ = $request->input('typ');
        $value = $request->input('value');
        $balance = $request->input('balance');
        $operator = $request->input('operator');
        $date = $request->input('date');
        $title = $request->input('title');

        // Rozpocznij zapytanie
        $query = Transaction::query();

       // Dodaj warunki do zapytania dla każdego pola, jeśli istnieje
       if (!empty($typ)) $query->where('typ', 'LIKE', '%' . $typ . '%');
       if (!empty($value)) $query->where('value', 'LIKE', $value . '%');
       if (!empty($balance)) $query->where('balance', 'LIKE', '%' . $balance . '%');
       if (!empty($operator)) $query->where('operator', 'LIKE', '%' . $operator . '%');
       if (!empty($date)) $query->where('date', 'LIKE', '%' . $date . '%');
       if (!empty($title)) $query->where('title', 'LIKE', '%' . $title . '%');

        // Wykonaj zapytanie i pobierz wyniki
        $results = $query->orderBy('id', 'desc')->get();
        //dd($results);

        // Zwróć wyniki jako JSON
        return response()->json($results);
    }

    public function addNewTransaction(Request $request){

        $saldo = Transaction::latest('id')
                            ->value('balance');
                 ////////////////// Validiacja ///////////////////////
           $request->validate([
            'typ'                  => 'required|max:255',//////
            'value'                => 'required|numeric',///////
            'operator'                => 'required|string|max:255',//////
            'date'                  => 'required|date',//////
            'title'                => 'required|string|max:255',//////
           ]);


        ////////////////// DESCRIPTION ///////////////////////
        $ProductDescription = Transaction::create([
            'typ'           => $request->typ,
            'value'     => $request->value,
            'balance'      => $saldo+$request->value,
            'operator'    => $request->operator,
            'date'             => $request->date,
            'title'      => $request->title,
        ]);






       return back()->with('status', 'ok  has ben Created successfully.');

    
    }

}
