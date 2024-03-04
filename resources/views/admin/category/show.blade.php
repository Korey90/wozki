@extends('admin.layout.layout')
@section('content')




<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                 <h5>Categories List</h5>
            </div>
            <div class="col-sm-12 col-md-6"><a href="{{ url()->previous() }}"><i class="mdi mdi-keyboard-backspace icon-md float-right"></i></a></div>
       </div><!-- ./row -->


         <div class="row">
              <div class="col-12">
                <div class="table-responsive">
                  <div id="example_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">

                   <div class="row">
                        <div class="col-sm-12 d-flex flex-wrap">
      
                        @foreach ($categories as $category)
                            <div class="border p-2">
                                
                                   <b>Category ID:</b> {{ $category->id }} <br>
                                   <b>Category Name:</b> {{ $category->name }}  <br>


                                   <h3 class="my-4">LISTA PRODOKTOW DLA TEJ KATEGORII</h3>
                                   TOTAL PRODuktow: {{ $category->products->count() }}
                                    @foreach ($category->products as $product)
                                        <div class="d-flex">
                                            <div>
                                                <b>Product Title:</b>  <a href="{{ route('product.show', $product->id) }}">{{ $product->title }}</a> <br> 
                                                <b>CENA:</b> {{ $product->price }}PLN <br>
                                                <b>Product Description:</b> {{ $product->productDescription->long_description }} 
                                            </div>
                                            <img src="{{ Storage::url($product->productPhotos->first()->photo) }}" alt="" width="160px" height="160px" class="float-right shadow">
                                        </div>
                                        <hr>
                                    @endforeach
                                
                            </div>
                        @endforeach

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

    

    <!-- Footer -->
    @include('admin.layout.footer')

 </div><!-- end .main-panel -->


@endsection('content')