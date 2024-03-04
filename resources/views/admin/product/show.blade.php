@extends('admin.layout.layout')
@section('content')
<div class="main-panel">
     <div class="content-wrapper">
          <div class="row">
               <div class="col-sm-12 col-md-6">
                    <h5>Product Details</h5>
               </div>
               <div class="col-sm-12 col-md-6"><a href="{{ url()->previous() }}"><i class="mdi mdi-keyboard-backspace icon-md float-right"></i></a></div>
          </div><!-- ./row -->



          @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
        @endif
        @if (session('status'))
          <div class="alert alert-info">
              <ul>
    
                      <li>{{ session('status') }}</li>
    
              </ul>
          </div>
        @endif



          <div class="d-flex flex-wrap">


                    <div class="card m-1 w-25">
                         <div class="card-body">
                              <div class="card-title">Product Information</div>
                              <p class="card-text">
                                   Title:
                                   <span class="text-muted float-right">
                                        {{ $product->title }}
                                   </span>
                              </p>
                              <p class="card-text">
                                   Product ID: 
                                   <span class="text-muted float-right">
                                        {{ $product->id }}
                                   </span>
                              </p>
                              <p class="card-text">
                                   EAN Number: 
                                   <span class="text-muted float-right">
                                        {{ $product->ean_number }}
                                   </span>
                              </p>
                              <p class="card-text">
                                   Supplier Price: 
                                   <span class="text-muted float-right">
                                       £{{ $product->price }}
                                   </span>
                              </p>
                              <p class="card-text">
                                   Vat:
                                   <span class="text-muted float-right">
                                       {{ $product->vat }}%
                                   </span>
                              </p>
                              <p class="card-text">
                                   Sale Price: 
                                   <span class="text-muted float-right">
                                       £{{ $product->sale_price }}
                                   </span>
                              </p>
                              <hr>
                              <p class="card-text">
                                   Profit: 
                                   <span class="text-muted float-right">
                                       £{{ number_format($product->sale_price-$product->price, 2) }}
                                   </span>
                              </p>

                         </div>
                    </div>
                    
                    <div class="card m-1 w-25">
                         <div class="card-body">
                              <div class="card-title">SUPPLAYER INFORMATION</div>
                              <img src="{{ $product->productSupplier->supplierCompany->logo }}" alt="Company Logo" class="img-fluid">
                              <p class="">Supplier ID: <span class="text-muted float-right">{{ $product->productSupplier->id }}</span> </p>
                              <p class="">Title: <a href="{{ route('supplier.show', $product->productSupplier->id) }}"><span class="text-muted float-right">{{ $product->productSupplier->title }}</span></a> </p>
                              <p class="">Language: <span class="text-muted float-right">{{ $product->productSupplier->language }}</span> </p>
                              <p class="">Name: <span class="text-muted float-right">{{ $product->productSupplier->fname }} {{ $product->productSupplier->lname }}</span> </p>
                              <hr>
                              <p class="">
                                   <a class="m-1" href="mailto:{{ $product->productSupplier->supplierContact->email }}"><i class="mdi mdi-email icon-md"></i></a>
                                   <a class="m-1" href="tel:{{ $product->productSupplier->supplierContact->phone }}"><i class="mdi mdi-phone-classic icon-md"></i></a>
                                   <a class="m-1" href="fax:{{ $product->productSupplier->supplierContact->fax }}"><i class="mdi mdi-fax icon-md"></i></a>
                                   <a class="m-1" href="{{ $product->productSupplier->supplierContact->facebook }}"><i class=" mdi mdi-facebook-box icon-md"></i></a>
                                   <a class="m-1" href="https://telegram.me/{{ $product->productSupplier->supplierContact->telegram }}" target="_blank"><i class="mdi mdi-telegram icon-md"></i></a>
                                   <a class="m-1" href="https://api.whatsapp.com/send?phone={{ $product->productSupplier->supplierContact->whatsapp }}"><i class="mdi mdi-whatsapp icon-md"></i></a>
                                   <a class="m-1" href="{{ $product->productSupplier->supplierContact->website }}"><i class="mdi mdi-web icon-md"></i></a>

                              </p>
                         </div>
                    </div>
           
                    

                    <div class="card m-1 flex-fill">
                         <div class="card-body">
                              <div class="card-title">FINANCIAL</div>
                              <p class="">SUPPLIER PRICE : <span class="text-muted float-right">£{{ $product->price }} / unit</span> </p>
                              <p class="">SALE PRICE: <span class="text-muted float-right">£{{ $product->sale_price }}</span> </p>
                              <p class="">DELIVERY COST: <span class="text-muted float-right">£{{ $product->delivery_cost }}</span> </p>
                              <p class="">STATUS: <span class="text-muted float-right">{{ $product->status }}</span> </p>
                              <hr>
                              <p class="">ESTIMATED PROFIT <span class="text-muted float-right">£{{ number_format($product->sale_price-$product->price, 2) }}</span></p>
                         </div>
                    </div>


                    <div class="card m-1 flex-fill">
                         <div class="card-body">
                              <div class="card-title">PHOTOS</div>
                              <div class="d-flex">

                                   @foreach ($product->productPhotos->photo as $photo)
                                             <a href="{{ asset($photo) }}" target="_blank" class="d-inline">
                                                  <img src="{{ asset($photo) }}" alt="Brak Obrazka" class="img-thumbnail mr-2" style="width: 250px;">
                                             </a>
                                   @endforeach
                              </div>
                         </div>
                    </div>
                         



                    <div class="card m-1 w-25">
                         <div class="card-body">
                         <div class="card-title">Dimensions</div>
                         <p class="card-text"><i class="mdi mdi-weight mr-1"></i> Weight: <span class="text-muted float-right">@if(isset($product->productDetail->weight)) {{ $product->productDetail->weight }} @endif </span></p>
                         <p class="card-text"><i class="mdi mdi-swap-vertical mr-1"></i> Height: <span class="text-muted float-right">@if(isset($product->productDetail->height)) {{ $product->productDetail->height }} @endif </span></p>
                         <p class="card-text"><i class="mdi mdi-swap-horizontal mr-1"></i>Width: <span class="text-muted float-right">@if(isset($product->productDetail->width)) {{ $product->productDetail->width }} @endif </span></p>
                         <p class="card-text"><i class="mdi mdi-gavel mr-1"></i>Deepth: <span class="text-muted float-right">@if(isset($product->productDetail->deepth)) {{ $product->productDetail->deepth }} @endif </span></p>
                         </div>
                    </div>

                    <div class="card m-1 flex-fill">
                         <div class="card-body">
                              <div class="card-title">STOCK</div>
                              <p class="">ACTUAL CTOCK : <span class="text-muted float-right">{{ $product->productStock->current_qty }} / unit</span> </p>
                              <p class="">MINIMAL STOCK: <span class="text-muted float-right">{{ $product->productStock->minimum_stock }} / unit</span> </p>
                              <p class="">MAXIMAL COST: <span class="text-muted float-right">{{ $product->productStock->maximum_stock }} / unit</span> </p>
                         </div>
                    </div>

                    <div class="card m-1 w-50">
                         <div class="card-body">
                              <div class="card-title">META DATA</div>
                              <p class="">PRODUCT TITLE:      <span class="ml-2 text-muted text-right"> {{ $product->productDescription->front_title }} </span> </p>
                              <p class="">META TAGS:          <span class="ml-2 text-muted text-right"> {{ $product->productDescription->meta_tags }} </span> </p>
                              <p class="">META DESCRIPTION:   <span class="ml-2 text-muted text-right"> {{ $product->productDescription->meta_description }} </span> </p>
                              <p class="">SHORT DESCRIPTION:  <span class="ml-2 text-muted text-right"> {{ $product->productDescription->short_description }} </span> </p>
                              <p class="">LONG DESCRIPTION: <br><span class="ml-2 text-muted text-right"> {!! nl2br($product->productDescription->long_description) !!} </span> </p>
                              <p class="">BASKET DESCRIPTION: <span class="ml-2 text-muted text-right"> {{ $product->productDescription->basket_description }} </span> </p>                                                                           
                         </div>
                    </div>


                    <div class="card m-1 flex-fill">
                         <div class="card-body">
                              <div class="card-title">Categories</div>
                              @foreach ($product->categories as $category)
                                   <a href="{{ route('category.show', $category->name) }}">{{ $category->name }}</a><br>
                              @endforeach
                         </div>
                    </div>     



          </div><!-- ./row -->
          <div class="row">
               <div class="col-sm-12 col-md-5"></div>
               <div class="col-sm-12 col-md-7"></div>
          </div>

</div><!-- end content wraper -->

     

     <!-- Footer -->
     @include('admin.layout.footer')

  </div><!-- end .main-panel -->


@endsection('content')