<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DateTime;
use PDF;
use Illuminate\Support\Str;

use App\Models\Admin\Order;
use App\Models\Admin\Cart;
use App\Models\Admin\Product;
use App\Models\Admin\User;

use App\Models\Admin\OrderProduct;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{

    public function index(){
        $orders = Order::where('user_id', '=', Auth::user()->id)->with('OrderProduct.produkty')->get();

         return view('front.order.index')->with(['orders' => $orders]);
    }
    
    public function show($unz){
        
        $order = Order::where('numer_zamowienia', '=', $unz)->with('OrderProduct.produkty','buyer', 'delivery_address')->first();

      //  dd($order->delivery_address);

        return view('front.order.show', ['order' => $order, 'total' => null]);
    }
  

    public function generateOrderToPDF(Request $request){
        //return 'hello'.$request;
        $order = Order::where('order_id', $request->order_id)->first();  // Załaduj zamówienie, zakładam że masz model Order

        $pdf = PDF::loadView('front.order.orderToPDF', ['order' => $order]);
    
        return $pdf->download('order.pdf');
    }

}
