<?php

namespace App\Http\Controllers;

use App\Models\Admin\Order;
use Illuminate\Http\Request;

class StripeController extends Controller
{
    public function index(){
        return view('stripe');
    }

    public function checkout(Request $request){

        //dd($request->orderId);
        //dd($request->totalToPay);

        \Stripe\Stripe::setApiKey(config('stripe.sk'));

        $session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card', 'p24', 'blik'],
            'line_items' => [
                [
                    'price_data' => [
                        'currency'  => 'pln',
                        'product_data' => [
                            'name' => 'MKSI - Zamówienie numer:'.$request->numer_zamowienia,
                        ],
                        'unit_amount' => $request->totalToPay * 100, //£5.00
                    ],
                    'quantity' => 1,
                ],
            ],
            'mode'  => 'payment',
            'success_url' => route('stripe.success', ['numer_zamowienia' => $request->numer_zamowienia]),
            'cancel_url'  => route('user.orders.index'),
        ]);
        return redirect()->away($session->url);
    }

    public function success(Request $request){

        if(isset($request->numer_zamowienia)){
           $order = Order::where('numer_zamowienia', $request->numer_zamowienia)->update(['status' => 'Opłacone']);
        }else{
            return 'Error';
        }


       return view('stripe', ['wiad' => 'Zamówienie numer '.$request->numer_zamowienia.' zostało opłacone.']);
    }


}
