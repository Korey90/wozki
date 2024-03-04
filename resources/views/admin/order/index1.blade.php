@extends('admin.layout.layout')
@section('content')
<div class="main-panel">
     <div class="content-wrapper">
           <div class="row">
               <div class="col-12">
                 <div class="table-responsive">
                   <div id="" class="">
                    <div class="row">
                         <div class="col-sm-12 col-md-6">
                              <h2>JK Sales List</h2>
                         </div>
                         <div class="col-sm-12 col-md-6"></div>
                    </div>
                    <div class="row">
                         <div class="col-sm-12">
                              <table class="table table-striped w-100" id="example11">
                                   <thead class="thead-dark p-2">
                                        <tr>
                                            <th>Id</th>
                                            <th>Numer Referencyjny</th>
                                            <th>KOD Produktu</th>
                                            <th>Nazwa produktu</th>
                                            <th>Ean Number</th>
                                            <th>Ilosc</th>
                                            <th>Cena brutto</th>
                                            <th>VAT [%]</th>
                                            <th>Total brutto</th>
                                            <th>Status</th>
                                            <th>data</th>
                                        </tr>
                                    </thead>
                                   <tbody>   
                                        @foreach ($orders as $order)
                                   <tr>
                                        <td>
                                             {{ $order->order_id }}
                                        </td>

                                        <td>          
                                             <a href="{{ route('order.show', $order->numer_zamowienia) }}">
                                                {{ $order->numer_zamowienia }}
                                             </a>
                                             <p>
                                                  {{ $order->buyer->userDetails->fname }} {{ $order->buyer->userDetails->lname }}
                                                  <br>
                                                  {{ $order->OrderProduct->count() }} przedmiotow
                                             </p>
                                        </td>

                                        <td class="lh-sm">
                                             @foreach ($order->OrderProduct->take(3) as $item)
                                                  {{ $item->produkty->first()->code }} <br>
                                             @endforeach
                                        </td>

                                        <td class="lh-sm">
                                             @foreach ($order->OrderProduct->take(3) as $item)
                                                   {{ $item->product_name }} <br>
                                             @endforeach
                                        </td>

                                        <td class="lh-sm">
                                             @foreach ($order->OrderProduct->take(3) as $item)
                                                  {{ $item->produkty->first()->ean_number }} <br>
                                             @endforeach
                                        </td>

                                        <td class="lh-sm">
                                             @foreach ($order->OrderProduct->take(3) as $item)
                                                  {{ $item->qty }} <br>
                                             @endforeach
                                        </td>

                                        <td class="lh-sm">
                                             @foreach ($order->OrderProduct->take(3) as $item)
                                                  {{ $item->product_price }} pln <br>
                                             @endforeach
                                        </td>

                                        <td class="lh-sm">
                                             @foreach ($order->OrderProduct->take(3) as $item)
                                                  {{ $item->produkty->first()->vat }} % <br>
                                             @endforeach
                                        </td>


                                        <td>
                                             {{ $order->total_to_pay_amount }} {{ $order->total_to_pay_currency }}
                                        </td>
                                        <td>{{ $order->status }}</td>
                                        <td>{{ $order->order_date }}</td>
</tr>
                                                  
                                                  
                                             @endforeach
                                             </tbody>
                                        </table>
  


                         </div>
                    </div>
                    <div class="row">
                         <div class="col-sm-12 col-md-5"></div>
                         <div class="col-sm-12 col-md-7"></div>
                    </div>
               </div>
                 </div>
               </div>
             </div>



     </div><!-- end content wraper -->

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>  
<script src="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/ashl1/datatables-rowsgroup@fbd569b8768155c7a9a62568e66a64115887d7d0/dataTables.rowsGroup.js"></script>

<script type="text/javascript">
          $(document).ready(function () {
               $('#example11').DataTable();
          });
          </script>
     

     <!-- Footer -->
     @include('admin.layout.footer')

  </div><!-- end .main-panel -->


@endsection('content')