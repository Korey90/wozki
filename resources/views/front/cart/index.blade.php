@extends('front.layout.layout')
     
@section('content')



<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="p-2">Koszyk</h1>
            @if(session('success_message'))
    <div class="alert alert-success">
        {{ session('success_message') }}
    </div>
@endif


            @if (count($carts) > 0)
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nazwa produktu</th>
                        <th>Cena netto</th>
                        <th>vat</th>
                        <th>Ilość</th>
                        <th>Suma netto</th>
                        <th>Suma brutto</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($carts as $cart)
                    <tr>
                        <td>
                            <img src="{{ Storage::url($cart->product->productPhotos->first()->photo) }}" alt="" style="height: 75px; width: 75px;">
                            {{ $cart->product->title }}
                        </td>
                        <td>{{ $cart->price }} zł</td>
                        <td>{{ $cart->product->vat }}%</td>
                        <td>
                            <form method="post" action="{{ route('cart.update', $cart->id) }}">
                                @csrf
                                @method('PUT')
                                <input type="number" name="qty" value="{{ $cart->qty }}" min="1" max="99">
                                <button type="submit" class="btn btn-sm btn-outline-primary">Zaktualizuj</button>
                            </form>
                        </td>
                        <td>{{ $cart->price * $cart->qty }} zł</td>
                        <td>{{ ($cart->price*$cart->product->vat/100*$cart->qty)+($cart->price*$cart->qty) }} zł</td>
                        <td>
                            <form method="post" action="{{ route('cart.remove', $cart->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">Usuń</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="2">Razem netto:</td>
                        <td>{{ $carts->sum(function ($cart) { return $cart->price * $cart->qty; }) }} zł</td>
                    </tr>
                    <tr>
                        <td colspan="2">Razem Brutto</td>
                        <td>{{ $carts->sum(function ($cart) { return ($cart->price*$cart->product->vat/100*$cart->qty)+($cart->price*$cart->qty); }) }} zł</td>
                    </tr>
                </tfoot>
            </table>
            <div class="text-center border mb-2 p-2" style="background-color: #ecf8ff;">

                <form action="{{ route('cart.makeOrder', $cart->session_id) }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="row">
                        <div class="col-md-6"> 
                          <label for="sposobDostawy" class="form-label fs-5">Sposób Dostawy</label>
                          <select class="form-select" name="delivery_method" aria-label="" id="sposobDostawy">
                              <option selected></option>
                              <option value="do_uzgodnienia">do uzgodnienia</option>
                              <option value="dropshipping">dropshipping</option>
                              <option value="kurier_pobranie">kurier pobranie</option>
                              <option value="kurier_przedplata">kurier przedpłata</option>
                              <option value="odbior_osobisty">odbiór osobisty</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="message" class="form-label fs-5">Wiadomość dla sprzedawcy</label>
                            <textarea type="text" name="buyer_notes" class="form-control" id="message"></textarea>
                        </div>

                        <div class="col-6">
                            <label for="dataRealizacji" class="form-label fs-5">Data zamowienia</label>
                            <input type="date" name="order_date" class="form-control" id="dataRealizacji" value="{{ date('Y-m-d') }}" readonly>
                        </div>

                        <div class="col-6">
                            <label for="adresWysylki" class="form-label fs-5">Address Wysyłki</label>
                            <select name="delivery_address" id="adresWysylki" class="form-select p-2">
                                @foreach ($adresy as $adres)
                                    <option value="{{ $adres->id }}" class="adres-option">
                                        {{ $adres->stline }}<br>
                                        {{ $adres->ndline }}<br>
                                        {{ $adres->post_code }} {{ $adres->town }}<br>
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 offset-6">
                            <h2 class="fs-5">Podsumowanie zamówienia</h2>
                            <p class="text-left">wartosc zamówienia netto: 
                                <span class="fs-5 p-2 text-green">
                                    {{ $carts->sum(function ($cart) { return $cart->price * $cart->qty; }) }} zł
                                </span>
                            </p>
                            <p class="text-left">wartosc zamówienia brutto:
                                <span class="fs-5 p-2 text-green">
                                    {{ $carts->sum(function ($cart) { return ($cart->price*$cart->product->vat/100*$cart->qty)+($cart->price*$cart->qty); }) }} zł
                                </span>
                            </p>
                            <p class="text-left">wartosc VAT:
                                <span class="fs-5 p-2 text-green">
                                    {{ $carts->sum(function ($cart) { return ($cart->price*$cart->product->vat/100)*$cart->qty; }) }} zł
                                </span>
                            </p>

                        </div>


                        <div class="col-md-12 text-right">
                            <button type="submit" class="btn btn-md btn-success">Złuż zamowienie</button>
                        </div>
 
                    </div>


                
               


            </form>
            </div>
            @else
            <p>Koszyk jest pusty.</p>
            @endif
            <button>Dodaj Koszyk</button>
        </div>
    </div>
</div>
@endsection 