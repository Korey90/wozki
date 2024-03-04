<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Order;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function index(){
        $orders = Order::with('OrderProduct.produkty.productPhotos')->orderByDesc('created_at')->get();

        $statusy = $orders->unique('status')->pluck('status');

        return view('admin.order.index')->with(['orders' => $orders, 'statusy' => $statusy]);
    }

    public function indexdwa(){
        $orders = Order::with('products')->get();

        dd($orders);
//        return view('welcome');
        return view('admin.order.index')->with(['orders' => $orders]);
    }




    public function show($ref_number){
        $total = null;
        $order = Order::where('order_id', '=', $ref_number)->with('OrderProduct.produkty','buyer')->get();

        return view('admin.order.show', ['order' => $order, 'total' => $total]);
    }

    public function create(){
        return view('admin.order.create');
    }

}
