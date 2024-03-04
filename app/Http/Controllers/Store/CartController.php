<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DateTime;
use Illuminate\Support\Str;

use App\Models\Admin\Order;
use App\Models\Admin\Cart;
use App\Models\Admin\Product;
use App\Models\Admin\User;

use App\Models\Admin\OrderProduct;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    
    public function searchProduct(Request $request)
    {
        $product = $request->input('query');
        // Użyj modelu Product do wyszukania produktów
        //$products = Product::where('title', 'like', "%{$query}%")->get();

        $products = Product::where(function ($query) use ($product) {
            $query->where('ean_number', 'like', '%' . $product . '%')
                ->orWhere('code', 'like', '%' . $product . '%')
                ->orWhereHas('productDescription', function ($query) use ($product) {
                    $query->where('title', 'like', '%' . $product . '%');
                });
        })->with('productDescription', 'productDetail', 'productPhotos')->get();


        return response()->json($products);
    }


    public function saveNote(Request $request)
    {
        $cartId = $request->input('cartId');
        $note = $request->input('note');
    
        try {
            $cart = Cart::findOrFail($cartId);
            $cart->note = $note;
            $cart->save();
    
            return response()->json(['message' => 'Notatka została zapisana.'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Wystąpił błąd podczas zapisywania notatki.'], 500);
        }
    }



    public function removeFromCart(Request $request){

        $item = Cart::find($request->cart_id);
        $name = null;
        $itemName = $item->name;
        $session = $item->session_id;
        $item->delete();

        
        $check = Cart::where('name', '=', $itemName)->count();
        
        if($check == 0){
            $name = $session;
        }
        
        return response()->json([
            'success' => true,
            'name' => $name,
            'message' => 'Pomyslnie usunieto z koszyka'
        ], 200);

    }

    public function changeQuantity(Request $request) {
        // Pobranie danych z żądania
        $cartId = $request->input('cart_id');
        $newQuantity = $request->input('quantity');
    
        // Wyszukanie elementu koszyka o danym ID
        $cartItem = Cart::find($cartId);
        if(!$cartItem) {
            return response()->json([
                'success' => false,
                'message' => 'Nie znaleziono elementu koszyka o podanym ID'
            ], 404);
        }
    
        // Aktualizacja ilości
        $cartItem->qty = $newQuantity;
        $cartItem->save();
    
        // Zwrócenie odpowiedzi
        return response()->json([
            'success' => true,
            'message' => 'Ilość została zaktualizowana'
        ], 200);
    }
    


    public function addToFavorites(Request $request)
    {
        $productId = $request->input('product_id');
        // Logika dodawania do ulubionych
    }

    
    public function addToCart(Request $request)
{
    $productId = $request->input('product_id');
    $quantity = $request->input('quantity');
    $sessionId = $request->input('session_id'); // nowa linia
    $userId  = $request->input('user_id');

    if(empty($sessionId) OR $sessionId == "Wybierz koszyk") {
        // Tworzymy nową sesję i dodajemy do niej produkt
        $newSessionId = Str::random(40); // Użyj Str::random() do wygenerowania losowego ciągu znaków dla ID sesji
    } else {
        // Użyj dostarczonego sessionId
        $newSessionId = $sessionId;
    }

    // Użyj modelu Product do znalezienia produktu
    $product = Product::find($productId);

    // Sprawdź, czy produkt jest już w koszyku
    $existingCartItem = Cart::where('session_id', $newSessionId)->where('product_id', $productId)->first();

//    dd($existingCartItem-);

    if ($existingCartItem) {
        // Jeśli produkt jest już w koszyku, zaktualizuj ilość
        $cart = $existingCartItem;
        $existingCartItem->qty += $quantity;
        $existingCartItem->save();
    } else {

        $checkSession = Cart::where('session_id', $newSessionId)->first();
        if($checkSession){
            $nowyKoszyk = $checkSession->name;
        }else{
            $nowyKoszyk = 'Nowy Koszyk'.rand(1, 100);
        }
        // Jeśli produktu nie ma w koszyku, dodaj go
        
        $cart = Cart::create([
            'user_id' => $userId, // przyjmując, że użytkownik jest zalogowany
            'session_id' => $newSessionId, // zmienione z session()->getId()
            'product_id' => $productId,
            'name' => $nowyKoszyk, // Wprowadziliśmy zmianę tutaj
            'qty' => $quantity,
            'price' => $product->price,
        ]);
    }

    return response()->json([
        'session_id' => $newSessionId, 
        'name' => $cart->name,
        'message' => 'Koszyk zostal z aktualizowany'
    ], 200); // Zwracamy nowe sessionId, które może być puste, jeśli sesja już istnieje
   
}


    public function loadCart(Request $request)
    {
        $cartId = $request->input('session_id');
        // Użyj modelu Cart do ładowania koszyka
        $cart = Cart::where('session_id', $cartId)->with('product')->get();
        return response()->json($cart);
    }




    public function submitOrder(Request $request)
    {
        $sessionId = $request->input('session_id');
        $type = $request->input('type');
        $orderDate = $request->input('order_date');
        $buyerNotes = $request->input('buyer_notes');
        $deliveryAdres = $request->input('delivery_address');


        $cart = Cart::where('session_id', $sessionId)->get();
        $totalToPayAmount = $cart->sum(function ($item) {
            return $item->price * $item->qty;
        });

    //pobieramy Cart po Sessji
    $cart = Cart::where('session_id', $sessionId)->with('product')->get();

    //przypisujemy zmiene
    //$wartosc_netto = $cart->sum(function ($cart) { return $cart->price * $cart->qty; });
    $wartosc_brutto = $cart->sum(function ($cart) { 
        return ($cart->price*$cart->product->vat/100*$cart->qty)+($cart->price*$cart->qty);
    });
    $wartosc_vat = $cart->sum(function ($cart) { return ($cart->price*$cart->product->vat/100)*$cart->qty; });    
    
    $userAdres = DB::table('user_addresses')->where('id', $deliveryAdres)->first();

// date('Ymd Hms')
    // Tworzymy zamowienie z bazie danych
    $order = new Order([
        'numer_zamowienia'      => 'ZH-'.random_int(10000, 999999).'|B2B|'.date('d-m'),
        'type'                  => $type,
        'order_date'            => $orderDate,
        'total_to_pay_amount'   => $wartosc_brutto, //to nie uwzgladnia dostawy
        'total_to_pay_currency' => 'pln',
        'buyer_notes'           => $buyerNotes,
        'status'                => 'Nowe',
        'user_id'               => $cart->first()->user_id,
        'delivery_id'           => $deliveryAdres
        
    ]);
    $order->save(); // Zapisujemy je

    // przypisujemy produkty z koszyka, ich ilosci oraz ceny do wczesniej utworzonego zamowienia

    foreach($cart as $item){
        $order_product = new OrderProduct([
            'numer_zamowienia' => $order->numer_zamowienia,
            'product_id' => $item->product->id,
            'product_name' =>   $item->product->title,
            'product_price' => $item->product->price,
            'qty' => $item->qty,
            'item_note' => $item->note,
        ]);
        $order_product->save();
    }

    //Tworzymy rekord pod dostawe
    $delivery = DB::table('deliveries')->insertGetId([
        'order_id' => $order->id,
        'delivery_method' => 'null',
        'delivery_address_street' => $userAdres->stline.' '.$userAdres->ndline,
        'delivery_address_zip_code' => $userAdres->post_code,
        'delivery_address_city' => $userAdres->town,
        'delivery_address_country' => $userAdres->country,
    ]);

    //$order->delivery_address()->save($delivery);
    //czyscimy cart
    Cart::where('session_id', '=', $sessionId)->delete();
    
//    return redirect()->route('cart.index')->with('success_message', 'Zamowienie numer: '.$order->numer_zamowienia.' zostalo wyslane.');
    return response()->json([
        'success' => true,
        'message' => 'Zamowienie numer: '.$order->numer_zamowienia.' zostalo wyslane.'
    ]);

    }


}
