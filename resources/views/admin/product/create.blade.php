@extends('admin.layout.layout')
@section('content')
<div class="main-panel">
     <div class="content-wrapper">
          <div class="row">
               <div class="col-sm-12 col-md-6">
                    <h5>Create New Product</h5>
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


          <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
               @method('post')
               @csrf
          <div class="d-flex flex-wrap">

               <div class="card m-1 flex-fill">
                    <div class="card-body">
                         <div class="card-title">About Product</div>

                         <div class="row mb-1"><!-- this title is used on admin side only -->
                              <label for="title" class="col-4 col-form-label col-form-label-sm">Product Title (office only)</label>
                              <div class="col-8">
                                <input type="text" name="title" class="form-control form-control-sm" id="title" value="{{ old('title') }}" placeholder="">
                              </div>
                         </div>

                         <div class="row mb-1">
                              <label for="supplier_id" class="col-sm-4 col-form-label col-form-label-sm">Supplier</label>
                              <div class="col-sm-8">
                                   <select name="supplier_id" id="supplier_id" class="form-control form-control-sm form-select">
                                        <option>Chose an Supplier</option>
                                        @foreach ($suppliers as $supplier)
                                             <option @if(old('supplier_id') == $supplier->id) selected @endif value="{{ $supplier->id }}">{{ $supplier->title }}</option>
                                        @endforeach
                                   </select>
                              </div>
                         </div>

                         <div class="row mb-1">
                              <label for="ean_number" class="col-sm-4 col-form-label col-form-label-sm">Ean Number
                                   <p class="text-muted text-wrap">Na podstawie numeru przeprowadzam operacje na produkcie tj. edycja stocku, rotacja stoku, identyfikacja itp</p>
                              </label>
                              <div class="col-sm-8">
                                <input name="ean_number" type="text" class="form-control form-control-sm" id="ean_number" value="{{ old('ean_number') }}" placeholder="">
                              </div>
                         </div>

                         <div class="card-title">PHOTOS</div>
                         <div class="row mb-1">
                              <label for="productImages" class="col-sm-4 col-form-label col-form-label-sm">Product Photos</label>
                              <div class="col-sm-8">
                                   <input class="form-control form-control-sm" name="productImages[]" type="file" id="productImages" multiple>
                                   <hr>
                                   <div class="images-preview-div d-flex flex-wrap"></div>
                              </div>
                         </div>
                       

                    </div><!-- card body -->
               </div><!-- card -->

         
                    <div class="card m-1 flex-fill">
                         <div class="card-body">
                              <div class="card-title">Dimensions</div>
                              <div class="row mb-1">
                                   <label for="weight" class="col-sm-4 col-form-label col-form-label-sm">Product Weight</label>
                                   <div class="col-sm-8">
                                        <div class="input-group mb-3">
                                             <span class="input-group-text" id="basic-addon1"><i class="mdi mdi-weight mr-1"></i></span>
                                             <input type="number" name="weight" value="{{ old('weight') }}" min="0" step="0.01" id="weight" class="form-control form-control-sm" placeholder="" aria-label="weight" aria-describedby="basic-addon1">

                                                  <select name="weight_measure" id="" class="form-control form-control-sm form-select">
                                                       <option>weight in</option>
                                                       <option @if(old('weight_measure') == 'kg') selected @endif value="kg" >kg</option>
                                                       <option @if(old('weight_measure') == 'g') selected @endif value="g">g</option>
                                                  </select>


                                        </div>
                                   </div>
                              </div>

                              <div class="row mb-1">
                                   <label for="height" class="col-sm-4 col-form-label col-form-label-sm">Product Height</label>
                                   <div class="col-sm-8">
                                        <div class="input-group mb-3">
                                             <span class="input-group-text" id="basic-addon1"><i class="mdi mdi-swap-vertical mr-1"></i></span>
                                             <input type="number" name="height" value="{{ old('height') }}" id="height" min="0" step="0.01" class="form-control form-control-sm" placeholder="" aria-label="height" aria-describedby="basic-addon1">

                                             <select name="height_measure" id="" class="form-control form-control-sm form-select">
                                                  <option>measure in</option>
                                                  <option @if(old('height_measure') == 'mm') selected @endif value="mm">mm</option>
                                                  <option @if(old('height_measure') == 'cm') selected @endif value="cm">cm</option>
                                                  <option @if(old('height_measure') == 'm') selected @endif value="m">m</option>
                                             </select>
                                        </div>
                                   </div>
                              </div>


                              <div class="row mb-1">
                                   <label for="width" class="col-sm-4 col-form-label col-form-label-sm">Product Width</label>
                                   <div class="col-sm-8">
                                        <div class="input-group mb-3">
                                             <span class="input-group-text" id="basic-addon1"><i class="mdi mdi-swap-horizontal mr-1"></i></span>
                                             <input type="number" name="width" value="{{ old('width') }}" id="width" min="0" step="0.01" class="form-control form-control-sm" placeholder="" aria-label="width" aria-describedby="basic-addon1">

                                             <select name="width_measure" id="" class="form-control form-control-sm form-select">
                                                  <option>measure in</option>
                                                  <option @if(old('width_measure') == 'mm') selected @endif value="mm">mm</option>
                                                  <option @if(old('width_measure') == 'cm') selected @endif value="cm">cm</option>
                                                  <option @if(old('width_measure') == 'm') selected @endif value="m">m</option>
                                             </select>
                                        </div>
                                   </div>
                              </div>

                              <div class="row mb-1">
                                   <label for="deepth" class="col-sm-4 col-form-label col-form-label-sm">Product Deepth</label>
                                   <div class="col-sm-8">
                                        <div class="input-group mb-3">
                                             <span class="input-group-text" id="basic-addon1"><i class="mdi mdi-swap-horizontal mr-1"></i></span>
                                             <input type="number" name="deepth" value="{{ old('deepth') }}" id="deepth" min="0" step="0.01" class="form-control form-control-sm" placeholder="" aria-label="deepth" aria-describedby="basic-addon1">

                                             <select name="deepth_measure" id="" class="form-control form-control-sm form-select">
                                                  <option>measure in</option>
                                                  <option @if(old('deepth_measure') == 'mm') selected @endif value="mm">mm</option>
                                                  <option @if(old('deepth_measure') == 'cm') selected @endif value="cm">cm</option>
                                                  <option @if(old('deepth_measure') == 'm') selected @endif value="m">m</option>
                                             </select>
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
                                     <input type="text" name="front_title" value="{{ old('front_title') }}" class="form-control form-control-sm" id="front_title" placeholder="">
                                   </div>
                              </div>

                              <div class="row mb-1">
                                   <label for="short_description" class="col-sm-4 col-form-label col-form-label-sm">Short Description
                                        <p class="text-muted">Krotki opis bedzie wyswietlany na kafelku produktu, moze byc uzyty w karuzeli</p>
                                   </label>
                                   <div class="col-sm-8">
                                     <textarea name="short_description" class="form-control form-control-sm" id="short_description">{{ old('short_description') }}</textarea>
                                   </div>
                              </div>


                              <div class="row mb-1">
                                   <label for="long_description" class="col-sm-4 col-form-label col-form-label-sm">Long Description
                                        <p class="text-muted">Pełen opis produktu widoczny na stronie produktu (product/show)</p>
                                   </label>
                                   <div class="col-sm-8">
                                     <textarea name="long_description" class="form-control form-control-sm" id="long_description" >{{ old('long_description') }}</textarea>
                                   </div>
                              </div>

                              <div class="row mb-1">
                                   <label for="basket_description" class="col-sm-4 col-form-label col-form-label-sm">Basket Description
                                        <p class="text-muted">Krotki opis produktu dodawany w koszyku</p>
                                   </label>
                                   <div class="col-sm-8">
                                     <textarea name="basket_description" class="form-control form-control-sm" id="basket_description" >{{ old('basket_description') }}</textarea>
                                   </div>
                              </div>



                              <div class="row mb-1"><!-- trzeba zrobic maly tags system tutaj -->
                                   <label for="meta_tags" class="col-sm-4 col-form-label col-form-label-sm">Meta Tags
                                        <p class="text-muted">slowa kluczowe ktore beda ladowane do sekcji Head dokumentu html </p>
                                   </label>
                                   <div class="col-sm-8">
                                     <input type="text" name="meta_tags" class="form-control form-control-sm" id="meta_tags" value="{{ old('meta_tags') }}" placeholder="">
                                   </div>
                              </div>

                              <div class="row mb-1"><!-- trzeba zrobic maly tags system tutaj -->
                                   <label for="meta_description" class="col-sm-4 col-form-label col-form-label-sm">Meta Description
                                        <p class="text-muted">krøtki opis ktory bedzie ladowany do sekcji Head dokumentu html</p>
                                   </label>
                                   <div class="col-sm-8">
                                     <input type="text" name="meta_description" class="form-control form-control-sm" id="meta_description" value="{{ old('meta_description') }}" placeholder="">
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
                                             <input type="number" name="price" id="price" min="0" step="0.01" class="form-control form-control-sm" value="{{ old('price') }}" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
                                        </div>
                                   </div>
                              </div>
                              <div class="row mb-1">
                                   <label for="sale_price" class="col-sm-4 col-form-label col-form-label-sm">Sale Price</label>
                                   <div class="col-sm-8">
                                        <div class="input-group mb-3">
                                             <span class="input-group-text" id="basic-addon1">£</span>
                                             <input type="number" min="0" name="sale_price" id="sale_price" step="0.01" class="form-control form-control-sm" value="{{ old('sale_price') }}" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
                                        </div>
                                   </div>
                              </div>

                              <div class="row mb-1">
                                   <label for="delivery_cost" class="col-sm-4 col-form-label col-form-label-sm">Supplier Delivery Costs</label>
                                   <div class="col-sm-8">
                                        <div class="input-group mb-3">
                                             <span class="input-group-text" id="basic-addon1">£</span>
                                             <input type="number" min="0" name="delivery_cost" step="0.01" class="form-control form-control-sm" id="delivery_cost" value="{{ old('delivery_cost') }}" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
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
                                             <input type="number" name="current_qty" step="1" min="1" id="current_qty" class="form-control form-control-sm" value="{{ old('current_qty') }}" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
                                             <span class="input-group-text" id="basic-addon1">units</span>
                                        </div>
                                   </div>
                              </div>


                              <div class="row mb-1">
                                   <label for="minimum_stock" class="col-sm-4 col-form-label col-form-label-sm">Minimal Stock</label>
                                   <div class="col-sm-8">
                                        <div class="input-group mb-3">
                                             <input type="number" name="minimum_stock" step="1" min="1" id="minimum_stock" class="form-control form-control-sm" value="{{ old('minimum_stock') }}" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
                                             <span class="input-group-text" id="basic-addon1">units</span>
                                        </div>
                                   </div>
                              </div>

                              <div class="row mb-1">
                                   <label for="maximum_stock" class="col-sm-4 col-form-label col-form-label-sm">Maximum Stock</label>
                                   <div class="col-sm-8">
                                        <div class="input-group mb-3">
                                             <input type="number" name="maximum_stock" step="1" min="1" id="maximum_stock" class="form-control form-control-sm" value="{{ old('maximum_stock') }}" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
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
                                        <select name="status" id="status" class="form-control form-control-sm form-select">
                                             <option value="">Product Status</option>
                                             <option @if(old('status') == 'active' ) selected @endif value="active">Active</option>
                                             <option @if(old('status') == 'disabled' ) selected @endif value="disabled">Disabled</option>
                                             <option @if(old('status') == 'pending' ) selected @endif value="pending">Pending for approve</option>
                                             <option @if(old('status') == 'archive' ) selected @endif value="archive">Archive</option>
                                             <option @if(old('status') == 'nohold' ) selected @endif value="nohold">On Hold</option>
                                        </select>
                                   </div>
                              </div>
                              <div class="float-right">
                                   <input type="submit" name="submit" class="btn btn-primary" id="" value="Add new Product" >
                              </div>
                         </div>
                    </div>
                    
                    
               </div><!-- ./row -->
          </form>
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
</script>








@endsection('content')