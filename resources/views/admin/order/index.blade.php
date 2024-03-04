@extends('admin.layout.layout')
@section('content')


<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12">
                <div class="d-flex align-items-start">
                    <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <button class="nav-link active mb-2" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">
                            Wszystkie
                            <span class="position-absolute translate-middle badge rounded-pill bg-info" style="left: 10px;">
                                    {{ $orders->count() }}
                                    <span class="visually-hidden">unread messages</span>
                            </span>
                        </button>
                        @foreach($statusy as $status)
                        @php
                            $iloscStatusu = $orders->where('status', $status)->count();
                        @endphp

                            <button class="nav-link position-relative mb-2" id="v-pills-{{ str_replace(' ', '', $status) }}-tab" data-bs-toggle="pill" data-bs-target="#v-pills-{{ str_replace(' ', '', $status) }}" type="button" role="tab" aria-controls="v-pills-{{ str_replace(' ', '', $status) }}" aria-selected="true">
                                @if($status == 'Nowe')
                                    Nowe zamowienia
                                @else
                                    {{ $status }}
                                @endif
                                <span class="position-absolute translate-middle badge rounded-pill bg-info" style="left: 10px;">
                                    {{ $iloscStatusu }}
                                    <span class="visually-hidden">unread messages</span>
                                </span>
                            </button>
                        @endforeach
                    </div>

                    <div class="tab-content" id="v-pills-tabContent">
                        @foreach($statusy as $status)
                            <div  class="tab-pane fade" id="v-pills-{{ str_replace(' ', '', $status) }}" role="tabpanel" aria-labelledby="v-pills-{{ str_replace(' ', '', $status) }}-tab">
                            @if($status == 'Nowe')
                                   <h4>Nowe zamowienia</h4>
                                @else
                                    <h4>{{ $status }}</h4>
                                @endif <hr>

                                <table class="table table-striped" id="">
                                   <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Numer Referencyjny</th>
                                            <th>Nazwa produktu</th>
                                            <th>Ean Number</th>
                                            <th>VAT [%]</th>
                                            <th>Total brutto</th>
                                            <th>Status</th>
                                            <th>data</th>
                                        </tr>
                                    </thead>
                                   <tbody>           
                                @forelse($orders as $order)
                                
                                @if($order->status == $status)
                                    <!-- mmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmm -->

                                   <tr>
                                        <td>
                                            <div class="form-check">
                                              <input class="form-check-input" type="checkbox" value="{{ $order->order_id }}" name="order_id" id="{{ $order->order_id }}">
                                              <label class="form-check-label" for="{{ $order->order_id }}">
                                                {{ $order->order_id }}
                                              </label>
                                            </div>
                                        </td>

                                        <td>          
                                             <a href="{{ route('order.show', $order->numer_zamowienia) }}" class="text-secondary">
                                                {{ $order->numer_zamowienia }}
                                             </a>
                                             <p class="text-muted py-1">
                                                  {{ ucfirst($order->buyer->userDetails->fname) }} {{ ucfirst($order->buyer->userDetails->lname) }}
                                                  <br>
                                                  {{ $order->OrderProduct->count() }} przedmiotow
                                             </p>
                                        </td>

                                        <td class="lh-sm">
                                             @foreach ($order->OrderProduct->take(3) as $item)
                                             {{ $item->qty }} x {{ $item->product_name }} <br>
                                             @endforeach
                                        </td>

                                        <td class="lh-sm">
                                             @foreach ($order->OrderProduct->take(3) as $item)
                                                  {{ $item->produkty->first()->ean_number }} <br>
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
                                                  

                                    <!-- mmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmm -->
                                        
                                    @endif
                                @empty
                                    Nic tu nie ma.
                                @endforelse

                                </tbody>
                                        </table>
                            </div>
                        @endforeach

    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
    <h4>Wszystkie zamówienia</h4>
    <hr>
    <table class="table table-striped" id="">
                                   <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Numer Referencyjny</th>
                                            <th>Nazwa produktu</th>
                                            <th>Ean Number</th>
                                            <th>VAT [%]</th>
                                            <th>Total brutto</th>
                                            <th>Status</th>
                                            <th>data</th>
                                        </tr>
                                    </thead>
                                   <tbody>           
                                @forelse($orders as $order)
                                
                                <!-- mmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmm -->

                                   <tr>
                                        <td>
                                            <div class="form-check">
                                              <input class="form-check-input" type="checkbox" value="{{ $order->order_id }}" name="order_id" id="{{ $order->order_id }}">
                                              <label class="form-check-label" for="{{ $order->order_id }}">
                                                {{ $order->order_id }}
                                              </label>
                                            </div>
                                        </td>

                                        <td>          
                                             <a href="{{ route('order.show', $order->numer_zamowienia) }}" class="text-secondary">
                                                {{ $order->numer_zamowienia }}
                                             </a>
                                             <p class="text-muted py-1">
                                                  {{ ucfirst($order->buyer->userDetails->fname) }} {{ ucfirst($order->buyer->userDetails->lname) }}
                                                  <br>
                                                  {{ $order->OrderProduct->count() }} przedmiotow
                                             </p>
                                        </td>

                                        <td class="lh-sm">
                                             @foreach ($order->OrderProduct->take(3) as $item)
                                             {{ $item->qty }} x {{ $item->product_name }} <br>
                                             @endforeach
                                        </td>

                                        <td class="lh-sm">
                                             @foreach ($order->OrderProduct->take(3) as $item)
                                                  {{ $item->produkty->first()->ean_number }} <br>
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
                                                  

                                    <!-- mmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmm -->

                                @empty
                                    Nic tu nie ma.
                                @endforelse

                                </tbody>
                                        </table>
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