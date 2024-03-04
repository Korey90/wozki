@extends('admin.layout.layout')
@section('content')
<div class="main-panel">
     <div class="content-wrapper">
          <div class="row">
               <div class="col-sm-12 col-md-6">
                    <h5>Edit Product #EAN: {{ $product->ean_number }}</h5>
               </div>
               <div class="col-sm-12 col-md-6"><a href="{{ url()->previous() }}"><i class="mdi mdi-keyboard-backspace icon-md float-right"></i></a></div>
          </div><!-- ./row -->


          @if ($errors->any())
          <div class="alert alert-danger">
              <ol class="list-group list-group-numbered">
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ol>
          </div>
        @endif

          <div class="d-flex flex-wrap">

               <div class="card m-1 flex-fill">
                    <div class="card-body">
                         <div class="card-title">O produkcie</div>

                         <div class="row mb-1"><!-- this title is used on admin side only -->
                              <label for="title" class="col-4 col-form-label col-form-label-sm">Nazwa Produktu (office only)</label>
                              <div class="col-8">
                                <input type="text" data-id="{{ $product->ean_number }}" name="title" class="form-control form-control-sm" id="title" value="{{ $product->title }}" onkeyup="saveMe(this)" placeholder="">

                              </div>
                         </div>

                         <div class="row mb-1">
                              <label for="supplier_id" class="col-sm-4 col-form-label col-form-label-sm">Producent</label>
                              <div class="col-sm-8">
                                   <select data-id="{{ $product->ean_number }}" name="supplier_id" id="supplier_id" class="form-control form-control-sm form-select" onchange="saveMe(this)">
                                        <option>Wybierz producenta</option>
                                        @foreach ($suppliers as $supplier)
                                             <option @if($product->supplier_id == $supplier->id) selected @endif value="{{ $supplier->id }}">{{ $supplier->title }}</option>
                                        @endforeach
                                   </select>
                              </div>
                         </div>

                         <div class="row mb-1">
                              <label for="ean_number" class="col-sm-4 col-form-label col-form-label-sm">Numer EAN
                                   <p class="text-muted text-wrap">Na podstawie numeru przeprowadzam operacje na produkcie tj. edycja stocku, rotacja stoku, identyfikacja itp</p>
                              </label>
                              <div class="col-sm-8">
                                   <input type="text" data-id="{{ $product->ean_number }}" name="ean_number" class="form-control form-control-sm" id="ean_number" value="{{ $product->ean_number }}" readonly placeholder="">                                   
                              </div>
                         </div>

                    </div><!-- card body -->
               </div><!-- card -->



               <div class="card m-1 flex-fill">
                    <div class="card-body">
                         <div class="card-title">ZDJĘCIA</div>
                         <div class="d-flex">

                              @foreach ($product->productPhotos->photo as $photo)
                                             <a href="{{ asset($photo) }}" target="_blank" class="d-inline">
                                        <img src="{{ asset($photo) }}" alt="product photo" class="img-thumbnail mr-2" style="width: 250px;">
                                   </a>
                                   <div class="position-relative">
                                        <form action="{{ route('product.photo.delete') }}" name="delete_photo" method="post">
                                             @method('DELETE')
                                             @csrf
                                             <input type="hidden" name="deletedPhoto" value="{{ $photo }}">
                                             <button type="submit" class="btn mdi mdi-delete position-absolute icon-md text-danger" style="top: 5px; right: 5px;"></button>
                                        </form>
                                   </div>
                              @endforeach
                              
                         </div>
                         <hr>
                         <div class="row mb-1">
                              <form action="{{ route('product.photo.update') }}" method="POST" class="form form-horizontal" enctype="multipart/form-data">
                                   @method('POST')
                                   @csrf
                                   <input type="hidden" name="editedPhoto" value="{{ $product->id }}">
                                   <input type="hidden" name="id" value="{{ $product->id }}">
                                   <label for="productImages" class="col-sm-4 col-form-label col-form-label-sm">Dodaj Zdjecia</label>
                                   <div class="col-sm-8">
                                        <input class="form-control" name="productImages[]" type="file" id="productImages" multiple required>
                                        <div class="images-preview-div d-flex flex-wrap"></div>
                                        <input class="btn btn-info ml-2" type="submit" value="upload">
                                   </div>
                              </form>
                         </div>
                    </div>
               </div>


         
                    <div class="card m-1 flex-fill">
                         <div class="card-body">
                              <div class="card-title">ROZMIARY</div>
                              <div class="row mb-1">
                                   <label for="weight" class="col-sm-4 col-form-label col-form-label-sm">Waga Produktu</label>
                                   <div class="col-sm-8">
                                        <div class="input-group mb-3">
                                             <span class="input-group-text" id="basic-addon1"><i class="mdi mdi-weight mr-1"></i></span>
                                             <input type="text" data-id="{{ $product->ean_number }}" name="weight" class="form-control form-control-sm" id="weight" value="{{ $product->productDetail->weight }}" onkeyup="saveMe(this)" placeholder="">
                                        </div>
                                   </div>
                              </div>

                              <div class="row mb-1">
                                   <label for="height" class="col-sm-4 col-form-label col-form-label-sm">Wysokość</label>
                                   <div class="col-sm-8">
                                        <div class="input-group mb-3">
                                             <span class="input-group-text" id="basic-addon1"><i class="mdi mdi-swap-vertical mr-1"></i></span>
                                             <input type="text" data-id="{{ $product->ean_number }}" name="height" class="form-control form-control-sm" id="height" value="{{ $product->productDetail->height }}" onkeyup="saveMe(this)" placeholder="">
                                        </div>
                                   </div>
                              </div>


                              <div class="row mb-1">
                                   <label for="width" class="col-sm-4 col-form-label col-form-label-sm">Szerokość</label>
                                   <div class="col-sm-8">
                                        <div class="input-group mb-3">
                                             <span class="input-group-text" id="basic-addon1"><i class="mdi mdi-swap-horizontal mr-1"></i></span>
                                             <input type="text" data-id="{{ $product->ean_number }}" name="width" class="form-control form-control-sm" id="width" value="{{ $product->productDetail->width }}" onkeyup="saveMe(this)" placeholder="">
                                        </div>
                                   </div>
                              </div>

                              <div class="row mb-1">
                                   <label for="deepth" class="col-sm-4 col-form-label col-form-label-sm">Głębokość</label>
                                   <div class="col-sm-8">
                                        <div class="input-group mb-3">
                                             <span class="input-group-text" id="basic-addon1"><i class="mdi mdi-swap-horizontal mr-1"></i></span>
                                             <input type="text" data-id="{{ $product->ean_number }}" name="deepth" class="form-control form-control-sm" id="deepth" value="{{ $product->productDetail->deepth }}" onkeyup="saveMe(this)" placeholder="">
                                        </div>
                                   </div>
                              </div>

                              <img src="{{ asset('front/dimensions.png') }}" alt="image">

                         </div><!-- ./card body -->
                    </div><!-- ./card -->


                    <div class="card m-1 flex-fill" style="max-width: 50%;" >
                         <div class="card-body">
                              <div class="card-title">META DATA</div>

                              <div class="row mb-1">
                                   <label for="front_title" class="col-sm-4 col-form-label col-form-label-sm">Product Title
                                        <p class="text-muted">tytul widziany na kafelku produktu oraz w szczegulach produktu</p>
                                   </label>
                                   <div class="col-sm-8">
                                        <input type="text" data-id="{{ $product->ean_number }}" name="front_title" class="form-control form-control-sm" id="front_title" value="{{ $product->productDescription->front_title }}" onkeyup="saveMe(this)" placeholder="">
                                   </div>
                              </div>

                              <div class="row mb-1">
                                   <label for="short_description" class="col-sm-4 col-form-label col-form-label-sm">Short Description
                                        <p class="text-muted">Krotki opis bedzie wyswietlany na kafelku produktu, moze byc uzyty w karuzeli</p>
                                   </label>
                                   <div class="col-sm-8">
                                        <textarea data-id="{{ $product->ean_number }}" name="short_description" class="form-control form-control-sm" id="short_description" onchange="saveMe(this)" placeholder="">{{ $product->productDescription->short_description }}</textarea>
                                   </div>
                              </div>


                              <div class="row mb-1">
                                   <label for="long_description" class="col-sm-4 col-form-label col-form-label-sm">Long Description
                                        <p class="text-muted">Pełen opis produktu widoczny na stronie produktu (product/show)</p>
                                   </label>
                                   <div class="col-sm-8">
                                        <textarea data-id="{{ $product->ean_number }}" name="long_description" class="form-control form-control-sm" id="long_description" onkeyup="saveMe(this)" placeholder="">{{ $product->productDescription->long_description }}</textarea>
                                   </div>
                              </div>

                              <div class="row mb-1">
                                   <label for="basket_description" class="col-sm-4 col-form-label col-form-label-sm">Basket Description
                                        <p class="text-muted">Krotki opis produktu dodawany w koszyku</p>
                                   </label>
                                   <div class="col-sm-8">
                                     <textarea data-id="{{ $product->ean_number }}" name="basket_description" class="form-control form-control-sm" id="basket_description" onkeyup="saveMe(this)" placeholder="">{{ $product->productDescription->basket_description }}</textarea>
                                   </div>
                              </div>



                              <div class="row mb-1"><!-- trzeba zrobic maly tags system tutaj -->
                                   <label for="meta_tags" class="col-sm-4 col-form-label col-form-label-sm">Meta Tags
                                        <p class="text-muted">slowa kluczowe ktore beda ladowane do sekcji Head dokumentu html </p>
                                   </label>
                                   <div class="col-sm-8">
                                     <input type="text" data-id="{{ $product->ean_number }}" name="meta_tags" class="form-control form-control-sm" id="meta_tags" value="{{ $product->productDescription->meta_tags }}" onkeyup="saveMe(this)" placeholder="">   
                                   </div>
                              </div>

                              <div class="row mb-1"><!-- trzeba zrobic maly tags system tutaj -->
                                   <label for="meta_description" class="col-sm-4 col-form-label col-form-label-sm">Meta Description
                                        <p class="text-muted">krøtki opis ktory bedzie ladowany do sekcji Head dokumentu html</p>
                                   </label>
                                   <div class="col-sm-8">
                                     <input type="text" data-id="{{ $product->ean_number }}" name="meta_description" class="form-control form-control-sm" id="meta_description" value="{{ $product->productDescription->meta_description }}" onkeyup="saveMe(this)" placeholder="">   
                                   </div>
                              </div>

                         </div>
                    </div>


                    <div class="card m-1 flex-fill" style="max-width: 50%;">
                         <div class="card-body">
                              <div class="card-title">FINANCIAL</div>

                              <div class="row mb-1">
                                   <label for="price" class="col-sm-4 col-form-label col-form-label-sm">Supplier Price</label>
                                   <div class="col-sm-8">
                                        <div class="input-group mb-3">
                                             <span class="input-group-text" id="basic-addon1">£</span>
                                             <input type="number" min="0" step="0.01" data-id="{{ $product->ean_number }}" name="price" class="form-control form-control-sm" id="price" value="{{ $product->price }}" onkeyup="saveMe(this)" placeholder="">
                                        </div>
                                   </div>
                              </div>
                              <div class="row mb-1">
                                   <label for="sale_price" class="col-sm-4 col-form-label col-form-label-sm">Sale Price</label>
                                   <div class="col-sm-8">
                                        <div class="input-group mb-3">
                                             <span class="input-group-text" id="basic-addon1">£</span>
                                             <input type="number" min="0" step="0.01" data-id="{{ $product->ean_number }}" name="sale_price" class="form-control form-control-sm" id="sale_price" value="{{ $product->sale_price }}" onkeyup="saveMe(this)" placeholder="">
                                        </div>
                                   </div>
                              </div>

                              <div class="row mb-1">
                                   <label for="delivery_cost" class="col-sm-4 col-form-label col-form-label-sm">Supplier Delivery Costs</label>
                                   <div class="col-sm-8">
                                        <div class="input-group mb-3">
                                             <span class="input-group-text" id="basic-addon1">£</span>
                                             <input type="number" min="0" step="0.01" data-id="{{ $product->ean_number }}" name="delivery_cost" class="form-control form-control-sm" id="delivery_cost" value="{{ $product->delivery_cost }}" onkeyup="saveMe(this)" placeholder="">
                                        </div>
                                   </div>
                              </div>
                              

                              <div class="card-title">Categories</div>
                              <div class="row mb-1">
                                   <label for="categories" class="col-sm-4 col-form-label col-form-label-sm">Product Category
                                        <p class="text-muted">no tutaj jeszcze trzeba dodac jakies kategorie - tagi na podstawie tego bede mogl se filtrowac produkty</p>
                                   </label>
                                   <div class="col-sm-8">
                                        <div class="input-group mb-3">
                                             <span class="input-group-text" id="basic-addon1"><i class="mdi mdi-swap-vertical mr-1"></i></span>

                                             <select name="categories" id="categories" class="form-control form-control-sm form-select">
                                                  <option selected>Chose a Categories</option>
                                                  <option @if(old('categories') == 'category 1') selected @endif value="category 1">category mm</option>
                                                  <option @if(old('categories') == 'category 2') selected @endif value="category 2">category cm</option>
                                                  <option @if(old('categories') == 'category 3') selected @endif value="category 3">category m</option>
                                             </select>
                                        </div>
                                   </div>
                              </div>


                         </div>
                    </div>


                    <div class="card m-1 flex-fill">
                         <div class="card-body">
                              <div class="card-title">STOCK</div>


                              <div class="row mb-1">
                                   <label for="current_qty" class="col-sm-4 col-form-label col-form-label-sm">Actual Stock</label>
                                   <div class="col-sm-8">
                                        <div class="input-group mb-3">
                                             <input type="number" step="1" min="1" data-id="{{ $product->ean_number }}" name="current_qty" class="form-control form-control-sm" id="current_qty" value="{{ $product->productStock->current_qty }}" onkeyup="saveMe(this)" placeholder="">   
                                             <span class="input-group-text" id="basic-addon1">units</span>
                                        </div>
                                   </div>
                              </div>


                              <div class="row mb-1">
                                   <label for="minimum_stock" class="col-sm-4 col-form-label col-form-label-sm">Minimal Stock</label>
                                   <div class="col-sm-8">
                                        <div class="input-group mb-3">
                                             <input type="number" step="1" min="1" data-id="{{ $product->ean_number }}" name="minimum_stock" class="form-control form-control-sm" id="minimum_stock" value="{{ $product->productStock->minimum_stock }}" onkeyup="saveMe(this)" placeholder="">   
                                             <span class="input-group-text" id="basic-addon1">units</span>
                                        </div>
                                   </div>
                              </div>

                              <div class="row mb-1">
                                   <label for="maximum_stock" class="col-sm-4 col-form-label col-form-label-sm">Maximum Stock</label>
                                   <div class="col-sm-8">
                                        <div class="input-group mb-3">
                                             <input type="number" step="1" min="1" data-id="{{ $product->ean_number }}" name="maximum_stock" class="form-control form-control-sm" id="maximum_stock" value="{{ $product->productStock->maximum_stock }}" onkeyup="saveMe(this)" placeholder="">                                                
                                             <span class="input-group-text" id="basic-addon1">units</span>
                                        </div>
                                   </div>
                              </div>

                              <div class="card-title">TAGS</div>

                              <div class="row mb-1">
                                   <label for="tags" class="col-sm-4 col-form-label col-form-label-sm">Meta Tags</label>
                                   <div class="col-sm-8">
                                     <input type="text" name="tags" id="tags" class="form-control form-control-sm" value="{{ old('tags') }}" placeholder="">
                                   </div>
                              </div>



                         </div>
                    </div>


                    

                    <div class="card m-1 w-100 ">
                         <div class="card-body d-flex justify-content-between">
                              <div class="mb-1 w-75">
                                   <label for="status" class="col-sm-4 col-form-label col-form-label-sm">Product Status
                                        <p class="text-muted text-wrap">Active = widoczny w sklepie oraz ze mozna go kupic.</p>
                                   </label>
                                   <div class="col-sm-8">
                                        <select data-id="{{ $product->first()->ean_number }}" name="status" id="status" class="form-control form-control-sm form-select" onchange="saveMe(this)">
                                             <option value="">Product Status</option>
                                             <option @if($product->first()->status == 'active' ) selected @endif value="active">Active</option>
                                             <option @if($product->first()->status == 'disabled' ) selected @endif value="disabled">Disabled</option>
                                             <option @if($product->first()->status == 'pending' ) selected @endif value="pending">Pending for approve</option>
                                             <option @if($product->first()->status == 'archive' ) selected @endif value="archive">Archive</option>
                                             <option @if($product->first()->status == 'nohold' ) selected @endif value="nohold">On Hold</option>
                                        </select>
                                   </div>
                              </div>
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



  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script type="text/javascript">

     $(function() {
          // Multiple images preview with JavaScript
          var previewImages = function(input, imgPreviewPlaceholder) {
               if (input.files) {
                    var filesAmount = input.files.length;
                    for (i = 0; i < filesAmount; i++) {
                         var reader = new FileReader();
                         reader.onload = function(event) {
                              $($.parseHTML('<img>')).attr('src', event.target.result).attr('width', '150px').attr('height', 'auto').addClass('m-2').appendTo(imgPreviewPlaceholder);
                         }
                         reader.readAsDataURL(input.files[i]);
                    }

               }
          };
          $('#productImages').on('change', function() {
               previewImages(this, 'div.images-preview-div');
               $('.images-preview-div').empty();
          });

      
     });


function saveMe(e){
     const CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
     const value = $(e).val();
     const field = $(e).attr('name');
     const ean = $(e).attr('data-id');
          //          console.log(value);

     $.ajax({
          url: '/saveMe',
          type: 'put',
          data: {
               _token: '{{ csrf_token() }}',
               value: value,
               field: field,
               ean:ean
          },

     success: function (data){
          console.log(data);
          if( data[0]==1){
               $(e).addClass('is-invalid');
          }else{
               $(e).addClass('is-valid');
          }
     },
     error: function (data){
     }
     });

}


</script>




@endsection('content')