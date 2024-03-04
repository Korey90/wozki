@extends('front.layout.layout')

@section('content')
<div class="container d-flex">

@include('front.layout.sidebar')

<div class="container border">
<div class="row p-2 m-2">
  <div class="d-flex justify-content-between">
    <p class="p-2 display-5">Witaj {{ Auth::user()->name }}</p>
    <p class="fs-6">Twoje Saldo: <big>0.00 zł</big></p>
  </div>

  <div class="col-md-6 mb-3">
    <h3 style="color: #4b49ac;" class="fw-bolder">Dane Firmy:</h3>
    <div class="row">
      <div class="col-md-6 fw-semibold">Nazwa Firmy:</div>
      <div class="col-md-6">{{ $user->company->company_name }}</div>

      <div class="col-md-6 fw-semibold">NIP</div>
      <div class="col-md-6">{{ $user->company->company_nip }}</div>

      <div class="col-md-6 fw-semibold">Regon</div>
      <div class="col-md-6">{{ $user->company->company_regon }}</div>

      <div class="col-md-6 fw-semibold">Adres / Siedziba Firmy <br>
        <span class="text-muted">(powinien byc taki sam jaki widnieje na stronie CIDG)</span>
      </div>
      <div class="col-md-6">{!! nl2br($user->company->company_address) !!}</div>

      <div class="col-md-6 fw-semibold">Telefon</div>
      <div class="col-md-6">{{ $user->company->phone }}</div>
       
      <div class="col-md-6 fw-semibold">Email</div>
      <div class="col-md-6">
        <a href="mailto:{{ $user->company->email }}?subject=this is my Subiect" class="link-secondary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">{{ $user->company->email }}</a>
      </div>


    </div>
  </div>




  <div class="col-md-6">
    <h3 style="color: #4b49ac;" class="fw-bolder">Ostatnie Zamowienia</h3>
<div class="table-responsive">


    <table class="table table-striped">
      <thead>
        <th>Numer Zamowienia</th>
        <th>Wartosc Brutto</th>
        <th>Status</th>
        <th>x</th>
      </thead>
      <tbody>
        @forelse ($orders as $order)
                <tr>
          <td>{{ $order->numer_zamowienia }}</td>
          <td>{{ $order->total_to_pay_amount }} {{ $order->total_to_pay_currency }}</td>
          <td>
            <span class="badge text-bg-warning">{{ $order->status }}</span>
          </td>
          <td>
            <a href="{{ route('order.show', $order->numer_zamowienia) }}">
              <i class="mdi mdi-eye"></i>
            </a>
          </td>
        </tr>
          
        @empty
          <tr>
            <td colspan="3">Brak zamówień</td>
          </tr>
        @endforelse
        
      </tbody>
    </table>
    </div>
    <a href="{{ route('user.orders.index') }}" class="w-75 float-right link-secondary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Zobacz wszystkie</a>

  </div>




    <div class="col-md-6">
    <h3 style="color: #4b49ac;" class="fw-bolder">Adresy Dostawy:</h3>
    <div class="row">
    @forelse ($user->address as $address)
        <div class="col-md-4 shadow p-2 m-1 border flex-fill">
          <b>{{ $user->company->company_name }}</b> <br>
          <u>{{ $address->recivier }}</u> <br>
          
          {{ $address->stline }}, <br>
          {{ $address->post_code }}, {{ $address->town }} <br>
          {{ $address->country }} <br>

        </div>
    @empty
      Dodaj Adres dostawy
    @endforelse
  </div>
  <a href="{{ route('user.deliveryAddress') }}" class="w-75 m-2 float-right link-secondary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Zażądzaj adresami dostaw</a>
  </div>



  <div class="col-md-6">
    <h3 style="color: #4b49ac;" class="fw-bolder">Moje Zapisane Koszyki:</h3>

    @forelse ($carts as $cart)

    <div class="m-1 p-2" style="border-bottom: 1px #dfdfdf solid;">
      <i class="mdi mdi-cart-outline"></i>
      <span class="fw-semibold fs-5">
        @if ($cart->name == null)
          Bez nazwy
        @else
          {{ $cart->name }}
        @endif
      </span>
      na {{ $cart->product_total }} produkty/ow na kwote 
      
      {{ $cart->cart_total+($cart->cart_total*.23) }} zł 
      <i class="float-right mdi mdi-eye"></i>
    </div>

    @empty
        Brak zapisanych Koszykow    
    @endforelse

  </div>

</div><!-- koniec glownego kontenera -->


</div>

</div>

   @endsection('content')