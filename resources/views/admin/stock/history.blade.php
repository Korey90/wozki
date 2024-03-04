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
                              <h2>Current Stock Rotation</h2>
                         </div>
                         <div class="col-sm-12 col-md-6"></div>
                    </div>
                    <div class="row">
                         <div class="col-sm-12">
       
                              <table class="table table-bordered table-hover w-100" id="stocks">
                                   <thead class="thead-dark">
                                       <tr>
                                           <th>Id</th>
                                           <th>Product EAN</th>
                                           <th>Stage</th>
                                           <th class="bg-warning text-dark">Quantinty</th>
                                           <th>Action Takken</th>
                                           <th>Actions</th>
                                       </tr>
                                   </thead>
                                   <tbody>
                                       @foreach ($stock as $stock)
                                       <tr>
                                           <td><h5>{{ $stock->id}}</h5></td>
                                           <td><h5>{{ $stock->product_ean}}</h5></td>
                                           <td><h5>{{ $stock->stage}}</h5></td>
                                           <td @if ($stock->qty < 0) class="bg-danger" @else class="bg-success" @endif>
                                             <h5>{{ $stock->qty }}</h5>
                                           </td>


                                           <td><h5>{{ substr($stock->created_at, 0, 16) }}</h5></td>
                                           <td>
                                             <!-- Example split secoundary button -->
                                                  <div class="btn-group">
                                                       <button type="button" class="btn btn-secoundary">View</button>
                                                       <button type="button" class="btn btn-secoundary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                         <span class="sr-only">Toggle Dropdown</span>
                                                       </button>
                                                       <div class="dropdown-menu">
                                                         <a class="dropdown-item" href="#">History</a>
                                                         <a class="dropdown-item" href="#">Cancel</a>
                                                         <a class="dropdown-item" href="#">Realise Order</a>
                                                         <div class="dropdown-divider"></div>
                                                         <a class="dropdown-item" href="#">Add Stock</a>
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
              $('#stocks').DataTable();
          });
          </script>
     

     <!-- Footer -->
     @include('admin.layout.footer')

  </div><!-- end .main-panel -->


@endsection('content')