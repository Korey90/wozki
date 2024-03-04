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
                              <h2>MKSI Faktury</h2>
                         </div>
                         <div class="col-sm-12 col-md-6"></div>
                    </div>
                    <div class="row">
                         <div class="col-sm-12">
       
                              <table class="table table-bordered table-striped w-100" id="example222">
                                   <thead class="thead-dark ">
                                       <tr>
                                           <th>Id</th>
                                           <th>Numer Faktury</th>
                                           <th>Data wystawienia</th>
                                           <th>data sprzedarzy</th>
                                           <th>Metoda płatnosci</th>
                                           <th>Total Netto</th>
                                           <th>Total Brutto</th>
                                           <th>Status</th>
                                           <th>Actions</th>
                                       </tr>
                                   </thead>
                                   <tbody>
                                       @foreach ($invoices as $invoice)
                                       <tr>
                                           <!-- ID -->
                                           <td><h5>{{ $invoice->id }}</h5></td>
                                           
                                           <!-- INVOICE NUMBER -->
                                           <td><h5>
                                             <a href="{{ route('invoice.show', $invoice->invoice_number) }}">
                                                  {{ $invoice->invoice_number }}
                                             </a></h5>
                                           </td>

                                           <!-- DATA WYSTAWIENIA -->
                                           <td><h5>{{ $invoice->date_of_issue }} <a href="{{ url('admin/product', $invoice->product_ean) }}"><i class="mdi mdi-comment-question-outline"></i></a></h5></td>
                                           <!-- DATA SPRZEDAZY -->
                                           <td><h5>{{ $invoice->sale_date }}</h5></td>
                                           <!-- PAYMENT METHOD -->
                                           <td><h5>{{ $invoice->payment_method }}</h5></td>
                                           <!-- TOTAL NETTO -->
                                           <td><h5>{{ $invoice->total_netto }} PLN</h5></td>
                                           <!-- TOTAL BRUTTO -->
                                           <td><h5>{{ $invoice->total_brutto }} PLN</h5></td>
                                           
                                           <td><h5><span class="badge" style="background: rgb(71, 194, 126);">{{ $invoice->status }}</span></h5></td>
                                           
                                           <td>
                                             <!-- Example split secoundary button -->
                                                  <div class="btn-group">
                                                       <button type="button" class="btn btn-secoundary">View</button>
                                                       <button type="button" class="btn btn-secoundary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                         <span class="sr-only">Toggle Dropdown</span>
                                                       </button>
                                                       <div class="dropdown-menu">
                                                         <a class="dropdown-item" href="#">Edit</a>
                                                         <a class="dropdown-item" href="#">Cancel</a>
                                                         <a class="dropdown-item" href="#">Realise Order</a>
                                                         <div class="dropdown-divider"></div>
                                                         <a class="dropdown-item" href="#">Stock</a>
                                                       </div>
                                                     </div>
                                           </td>
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

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

     <script type="text/javascript">
          $(document).ready(function () {
              $('#example222').DataTable();
          });
          </script>
     

     <!-- Footer -->
     @include('admin.layout.footer')

  </div><!-- end .main-panel -->


@endsection('content')