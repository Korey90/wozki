@extends('admin.layout.layout')
@section('content')
<div class="main-panel">

     <div class="content-wrapper">
          <div class="row">
               <div class="col-sm-12 col-md-6">
                    <h5>Faktura #{{ $invoice->invoice_number }} <span class="badge badge-info p-1">{{ ucfirst($invoice->status) }}</span></h5>
               </div>
               <div class="col-sm-12 col-md-6">
                    <a href="{{ url()->previous() }}">
                         <i class="mdi mdi-keyboard-backspace icon-md float-right"></i>
                    </a>
               </div>
          </div><!-- ./row -->
 
          <div class="row"> 
               <div class="col-md">
                    <div class="card h-100">
                         <div class="card-body">
                              <div class="card-title">Sprzedawca/usługodawca</div>

                                   <p class="h5 text-center">PRZEDSIEBIORSTWO HANDLOWE KONRAD SZCZEPANIK MKSI</p>

                              <div class=row>     
                                   <div class="col-md-4 text-right">Adres:</div>
                                   <div class="col-md border">ul. Spokojna 74 <br> 43-230 Goczałkowice - Zdrój</div>
                              </div>

                              <div class=row>     
                                   <div class="col-md-4 text-right">Telefon:</div>
                                   <div class="col-md border">0-32 4453812</div>
                              </div>
                              
                              <div class=row>     
                                   <div class="col-md-4 text-right">NIP:</div>
                                   <div class="col-md border">6380006583</div>
                              </div>

                              <div class=row>     
                                   <div class="col-md-4 text-right">BDO:</div>
                                   <div class="col-md border">000217047</div>
                              </div>

                              <div class=row>
                                   <div class="col-md-4 text-right">Rachunek:</div>
                                   <div class="col-md border">ING Bank Śląski S.A. ING O. w Pszczynie <br>
                                        59 1050 1315 1000 0001 0316 2178</div>
                              </div>

                         </div>
                    </div>
               </div>

               <div class="col-md-5">

                    <div class="card mb-2">
                         <div class="card-body">
                              <div class="card-title text-center mb-0">--- Faktura VAT ---</div>

                              <p class="text-center fw-bold display-5">{{ $invoice->invoice_number }}</p>

                              <div class="row">
                                   <div class="col-md-5 text-right">Data Wystawienia:</div>
                                   <div class="col-md">{{ $invoice->date_of_issue }}</div>
                              </div>
                              <div class="row">
                                   <div class="col-md-5 text-right">Data dostawy/wykonania usługi:</div>
                                   <div class="col-md">{{ $invoice->sale_date }}</div>
                              </div>
                              
                         </div>
                    </div><!-- /card -->


                    <div class="card">
                         <div class="card-body">
                              <div class="card-title">Nabywca / Odbiorca</div>

                              <p class="h5 text-center">MAJA DZIECHCIARUK SKLEPY INTERNETOWE</p>

                              <div class="row">
                                   <div class="col-md-4 text-right">Imie i Nazwisko:</div>
                                   <div class="col-md">Maja Dzieciaruk</div>
                              </div>
                              <div class="row">
                                   <div class="col-md-4 text-right">Adres:</div>
                                   <div class="col-md border">
                                        Batalionów Chłopskich 4/107 <br>
                                        94-058 Łódź
                                   </div>
                              </div>
                              <div class="row">
                                   <div class="col-md-4 text-right">NIP:</div>
                                   <div class="col-md border">7252283515</div>
                              </div>
                         </div>
                    </div><!-- /card -->
               </div><!-- /col -->

               <div class="col">
                    <div class="card h-100">
                         <div class="card-body">
                              <div class="card-title">Delivery to:</div>
                              {{ $invoice->invoiceDelivery->reference_number }} <br>
                              {{ $invoice->invoiceDelivery->costumer_name }} <br>
                              {{ $invoice->invoiceDelivery->address_street }} {{ $invoice->invoiceDelivery->building_number }} m. {{ $invoice->invoiceDelivery->door_number }} <br>
                              {{ $invoice->invoiceDelivery->post_code }} Łodz
                              <hr>

                         </div>
                    </div>
               </div>

          </div><!-- ./row -->

          <div class="row my-1">
               <div class="col-md">
                    <div class="card">
                         <div class="card-body">
                              <div class="card-title">Order Details</div>
                            
                              
                              <table class="table table-striped border">
                                   <thead>
                                        <th>Numer Faktury</th>
                                        <th>Nazwa Produktu</th>
                                        <th>Ilosc [sztuk]</th>
                                        <th>Cena Netto</th>
                                        <th>VAT [%]</th>
                                        <th>Cena Brutto</th>
                                        <th>Całkowita kwota Netto</th>
                                        <th>Całkowity VAT [PLN]</th>
                                        <th>Całkowita cena Brutto</th>
                                   </thead>
                                   <tbody>
                                        {{-- dd($invoice) --}}
                                        @forelse ($invoice->invoiceProducts as $product)
                                             <tr>
                                                  <td>{{ $product->invoice_number }}</td>
                                                  <td>{{ $product->product_name }}</td>
                                                  <td>{{ $product->qty }}</td>
                                                  <td>{{ $product->price_netto }} PLN</td>
                                                  <td>{{ $product->product_vat }}%</td>
                                                  <td>{{ $product->price_brutto }} PLN</td>
                                                  <td>{{ $product->total_price_netto }} PLN</td>
                                                  <td>{{ $product->total_vat }} PLN</td>
                                                  <td>{{ $product->total_price_brutto }} PLN</td>
                                             </tr>
                                        @empty
                                             faktura bez produktow?
                                        @endforelse
                                                                                     
                                        <tr>
                                             <td colspan="8" class="text-right pt-3">Order value (netto):</td>
                                             <td class="text-left pt-3">{{ $invoice->total_netto }} PLN</td>
                                        </tr>
                                        <tr>
                                             <td colspan="8" class="text-right">23% VAT:</td>
                                             <td class="text-left">{{ ($invoice->total_brutto-$invoice->total_netto) }} PLN</td>
                                        </tr>
                                        <tr>
                                             <td colspan="8" class="text-right pt-3">Order value (brutto):</td>
                                             <td class="text-left pt-3">{{ $invoice->total_brutto }} PLN</td>
                                        </tr>

                                        <tr>
                                             <td colspan="8" class="text-right">Shipping Cost (inc.vat):</td>
                                             <td class="text-left">15.00 PLN <hr></td>
                                        </tr>
                                        
                                        <tr>
                                             <td colspan="8" class="text-right">Forma Płatnosci:</td>
                                             <td class="text-left">
                                                  {{ $invoice->payment_method }}
                                                  
                                             </td>
                                        </tr>
                                        <tr>
                                             <td colspan="8" class="text-right"><b>Razem:</b></td>
                                             <td class="text-left"><b>332.09 PLN</b></td>
                                        </tr>
                                        </tbody>
                                   </table>
                         </div>
                    </div>
               </div>
          </div>

          <div class="row">
               <div class="col-sm-12 col-md-5"></div>
               <div class="col-sm-12 col-md-7"></div>
          </div>

     </div><!-- end content wraper -->

     <!-- Footer -->
     @include('admin.layout.footer')

</div><!-- end .main-panel -->

@endsection('content')