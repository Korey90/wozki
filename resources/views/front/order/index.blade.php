@extends('front.layout.layout')
     
@section('content')

<div class="container d-flex">
     
     @if(session('success_message'))
     <div class="alert alert-success">
          {{ session('success_message') }}
     </div>
     @endif
     
     @include('front.layout.sidebar')
     <div class="container border">

          <div class="row p-2 m-2 lh-lg">
               <div class="d-flex justify-content-between">
                <p class="p-2 display-5">Twoje Zamówienia</p>
                <p class="fs-6">Twoje Saldo: <big>0.00 zł</big></p>
              </div>
          </div>

   
             <!-- ////////////////////////////////////////////// -->

          <table class="table table-striped mt-3" id="example112">
               <thead class="thead-dark">
                    <tr>
                       
                       <th>Numer Zamowienia</th>
                       <th>Produkty</th>
                       <th>Total netto/brutto</th>
                       <th>Status</th>
                       <th>Data</th>
                    </tr>
               </thead>
               <tbody>   
                    @foreach ($orders as $order)
                         <tr>



                              <td class="">          
                                   <a href="{{ route('order.show', $order->numer_zamowienia) }}">
                                      {{ $order->numer_zamowienia }}
                                   </a>
                              </td>
                              
                              <td class="lh-sm fw-light">


                                   {{ $order->OrderProduct->count() }}

                              </td>
                                                 
                              <td>
                                   {{ $order->total_to_pay_amount }} {{ $order->total_to_pay_currency }}
                              </td>
                              <td> <span class="badge text-bg-info">{{ $order->status }}</span></td>
                              <td>{{ $order->order_date }}</td>
                         </tr>
                    @endforeach
               </tbody>
          </table>


          <div class="h4">Statusy Zamowien</div>
     <div class="row">
          <ul class="list-group">
               <li class="list-group-item py-0 d-flex"><span class="fw-semibold">Przyjęte</span> - Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla,</li>
               <li class="list-group-item py-0 d-flex"><span class="fw-semibold">W realizacji</span> - Lorem ipsum iusto provident assumenda sit.</li>
               <li class="list-group-item py-0 d-flex"><span class="fw-semibold">Wysłane</span> - Earum modi dolores libero ipsam obcaecati.</li>
               <li class="list-group-item py-0 d-flex"><span class="fw-semibold">Anulowane</span> - Aperiam sed quam quas beatae voluptatum id ab ullam.</li>
          </ul>
     </div>

     </div>


</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>  
<script src="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/ashl1/datatables-rowsgroup@fbd569b8768155c7a9a62568e66a64115887d7d0/dataTables.rowsGroup.js"></script>

<script type="text/javascript">
          $(document).ready(function () {
               $('#example112').DataTable();

          });
          </script>


@endsection 