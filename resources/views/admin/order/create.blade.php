@extends('admin.layout.layout')
@section('content')
<div class="main-panel">

     <div class="content-wrapper">
          <div class="row">
               <div class="col-sm-12 col-md-6">
                    <h5>Order #{{-- $order->reference_number --}} <span class="badge badge-info p-1">{{-- ucfirst($order->status) --}}</span></h5>
               </div>
               <div class="col-sm-12 col-md-6">
                    <a href="{{ url()->previous() }}">
                         <i class="mdi mdi-keyboard-backspace icon-md float-right"></i>
                    </a>
               </div>
          </div><!-- ./row -->

          <div class="row"> 
               <div class="col-md-5">
                    <div class="card">
                         <div class="card-body">
                              <div class="card-title">General Information</div>

                              <div class="row">
                                   <div class="col-md-4 text-right">Status:</div>
                                   <div class="col-md">{{-- ucfirst($order->first()->status) --}}</div>
                              </div>

                              <div class=row>     
                                   <div class="col-md-4 text-right">Created At:</div>
                                   <div class="col-md">{{-- ucfirst($order->first()->created_at) --}}</div>
                              </div>

                              <div class=row>     
                                   <div class="col-md-4 text-right">Reference Number:</div>
                                   <div class="col-md">{{-- ucfirst($order->first()->reference_number) --}}</div>
                              </div>
                              
                              <div class=row>     
                                   <div class="col-md-4 text-right">Product EAN:</div>
                                   <div class="col-md">{{-- ucfirst($order->first()->product_ean) --}}</div>
                              </div>

                              <div class=row>     
                                   <div class="col-md-4 text-right">Costumer:</div>
                                   <div class="col-md">{{-- ucfirst($order->first()->user_email) --}}</div>
                              </div>

                         </div>
                    </div>
               </div>

               <div class="col">
                    <div class="card">
                         <div class="card-body">
                              <div class="card-title">Costumer Details</div>

                              <div class="row">
                                   <div class="col-md-4 text-right">First Name:</div>
                                   <div class="col-md">{{-- ucfirst($order->first()->buyer->userDetails->fname) --}}</div>
                              </div>
                              <div class="row">
                                   <div class="col-md-4 text-right">Middle Name:</div>
                                   <div class="col-md">{{-- ucfirst($order->first()->buyer->userDetails->mname) --}}</div>
                              </div>
                              <div class="row">
                                   <div class="col-md-4 text-right">Last Name:</div>
                                   <div class="col-md">{{-- ucfirst($order->first()->buyer->userDetails->lname) --}}</div>
                              </div>





                              <div class="row">
                                   <div class="col-md-4 text-right">Sex:</div>
                                   <div class="col-md">{{-- ucfirst($order->first()->buyer->userDetails->sex) --}}</div>
                              </div>

                              <div class="row">
                                   <div class="col-md-4 text-right">Avatar:</div>
                                   <div class="col-md"><img src="{{-- $order->first()->buyer->userDetails->avatar --}}" alt=""></div>
                              </div>
                         </div>
                    </div>
               </div>

               <div class="col">
                    <div class="card">
                         <div class="card-body">
                              <div class="card-title">Delivery to:</div>
                        
                                   <address>
                                        {{-- $address->stline --}} <br>
                                        {{-- $address->ndline --}} <br>
                                        {{-- $address->town --}} <br>
                                        {{-- $address->post_code --}}
                                   </address>
                        

                         </div>
                    </div>
               </div>

          </div><!-- ./row -->

          <div class="row my-1">
               <div class="col-md">
                    <div class="card">
                         <div class="card-body">
                              <div class="card-title">Order Details</div>
                              {{-- dd($order) --}}
                              
                              <table class="table">
                                   <thead>
                                        <th>NO</th>
                                        <th>Product name</th>
                                        <th>Product Quantinty</th>
                                        <th>Price exc.VAT</th>
                                        <th>Total inc.VAT</th>
                                        <th>Status</th>
                                   </thead>
                                   <tbody>
    
<tr>
                                             <td>numer</td>
                                             <td>{{-- $product->products->first()->title --}}</td>
                                             <td>{{-- $product->qty --}}</td>
                                             <td>{{-- $product->products->first()->price --}}</td>
                                             <td>{{-- ($product->products->first()->price*$product->qty) --}}</td>
                                             <td><span class="badge badge-primary">{{-- $product->status --}}</span></td>
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