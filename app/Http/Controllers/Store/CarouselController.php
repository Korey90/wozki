<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CarouselController extends Controller
{
    public function index(){

        $carousel = DB::table('web_carousel')->get();
       
        return view('store.index', ['carousel' => $carousel]);
    }
}
