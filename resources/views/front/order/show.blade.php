@extends('front.layout.layout')
     
@section('content')



<div class="content-wrapper">

     <div class="container w-100">
          <div class="row">
               <div class="col-sm-12 col-md-6">
                    <h5>Zamówienie #{{ $order->numer_zamowienia }} <span class="badge badge-info p-1"></span></h5>
                    @php
                         if(shell_exec('composer update')){
                              echo 'hello shell';
                         }else{
                              echo 'brak';
                         }
                    @endphp
               </div>
               <div class="col-sm-12 col-md-6">
                    <a href="{{ url()->previous() }}">
                         <i class="mdi mdi-keyboard-backspace icon-md float-right"></i>
                    </a>
               </div>
          </div><!-- ./row -->

          <div class="row"> 
               <div class="col-md-5">
                    <div class="card h-100">
                         <div class="card-body">
                              <div class="card-title">Zamówienie</div>

                              <div class="row">
                                   <div class="col-md-4 fw-semibold">Status:</div>
                                   <div class="col-md-8 pl-4">{{ ucfirst($order->status) }}</div>
                              </div>

                              <div class=row>     
                                   <div class="col-md-4 fw-semibold">Data Zamowienia:</div>
                                   <div class="col-md-8 pl-4">{{ ucfirst($order->created_at) }}</div>
                              </div>

                              <div class=row>     
                                   <div class="col-md-4 fw-semibold">Numer Zamowienia:</div>
                                   <div class="col-md-8 pl-4">{{ ucfirst($order->numer_zamowienia) }}</div>
                              </div>

                              <div class=row>     
                                   <div class="col-md-4 fw-semibold">Klijent:</div>
                                   <div class="col-md-8 pl-4">{{ $order->buyer->name }}</div>
                              </div>

                         </div>
                    </div>
               </div>

               <div class="col-md">
                    <div class="card">
                         <div class="card-body">
                              <div class="card-title">Klijent: {{ $order->buyer->name }}</div>

                              <div class="row">
                                   <div class="col-md-4 fw-semibold">Imie:</div>
                                   <div class="col-md-8 pl-4">{{ ucfirst($order->buyer->userDetails->fname) }}</div>
                              </div>
                              <div class="row">
                                   <div class="col-md-4 fw-semibold">Drugie Imie:</div>
                                   <div class="col-md-8 pl-4">@if($order->buyer->userDetails->mname == null) brak @else {{ ucfirst($order->buyer->userDetails->mname) }} @endif</div>
                              </div>
                              <div class="row">
                                   <div class="col-md-4 fw-semibold">Nazwisko:</div>
                                   <div class="col-md-8 pl-4">{{ ucfirst($order->buyer->userDetails->lname) }}</div>
                              </div>
                              <div class="row">
                                   <div class="col-md-4 fw-semibold">Email:</div>
                                   <div class="col-md-8 pl-4">{{ ucfirst($order->buyer->email) }}</div>
                              </div>

                         </div>
                    </div>
               </div>

               <div class="col-md">
                    <div class="card h-100">
                         <div class="card-body">
                              <div class="card-title">Adres Dostawy:</div>


                              
                                   <address>
                                        {{ $order->delivery_address->delivery_address_street }} <br>
                                        {{ $order->delivery_address->delivery_address_city }} <br>
                                        {{ $order->delivery_address->delivery_address_zip_code }}<br>
                                        {{ $order->delivery_address->delivery_address_country }}
                                   </address>
                              

                         </div>
                    </div>
               </div>

          </div><!-- ./row -->

          <div class="row my-1">
               <div class="col-md">
                    <div class="card">
                         <div class="card-body">
                              <div class="card-title">Szczegóły Zamówienia</div>
                            
                              <div class="table-responsive">
                                   <table class="table table-striped border">
                                        <thead>
                                             <th>NO</th>
                                             <th>Nazwa produktu</th>
                                             <th>ilosc</th>
                                             <th>Cena Netto</th>
                                             <th>Razem  Brutto</th>
                                        </thead>
                                        <tbody>

                                                  @foreach ($order->OrderProduct as $product)
                                             <tr>
                                                  <td>{{ $loop->index+1 }}</td>
                                                  <td>
                                                       <p>{{ $product->product_name }} </p>
                                                       @if($product->item_note !== null)<p class="bg-warning p-1 opacity-50">{{ $product->item_note}}</p>@endif
                                                  </td>
                                                  <td>x{{ $product->qty }}</td>
                                                  <td>{{ $product->product_price }} pln</td>
                                                  <td>{{ ($product->product_price*$product->qty)*1.23 }} pln</td>                                            
                                             </tr>
                                                  @endforeach
                                             <tr>
                                                  <td colspan="4" class="text-right pt-3">Zartosc zamowienia:</td>
                                                  <td class="text-left pt-3">{{ $order->total_to_pay_amount }} pln</td>
                                             </tr>
                                             <tr>
                                                  <td colspan="4" class="text-right">VAT:</td>
                                                  <td class="text-left">{{ ($order->total_to_pay_amount*0.23) }} pln</td>
                                             </tr>
                                             <tr>
                                                  <td colspan="4" class="text-right">Koszt Wysyłki:</td>
                                                  <td class="text-left">10 pln</td>
                                             </tr>
                                             <tr>
                                                  <td colspan="4" class="text-right"><b>Razem:</b></td>
                                                  <td class="text-left"><b>{{ $order->total_to_pay_amount+10 }} pln</b></td>
                                             </tr>
                                        </tbody>
                                   </table>
                                   @if($order->status == 'Opłacone' )
                                        To zamowienie zostało opłacone
                                   @else
                                        Opłać Fakture:
                                        <form action="{{ route('generateOrderToPDF') }}" method="post">
                                             @csrf
                                             <input type="hidden" name="totalToPay" value="{{ $order->total_to_pay_amount+10 }}">
                                             <input type="hidden" name="order_id" value="{{ $order->order_id }}">

                                             <button type="submit" class="btn btn-primary">Generuj Proforme</button> Prodorma
                                             
                                        </form>
                                   @endif
                              </div>
                         </div>
                    </div>
               </div>
          </div>

     </div><!-- end container wraper -->

     <!-- Footer -->
     @include('admin.layout.footer')

</div><!-- end content wraper -->

@endsection 