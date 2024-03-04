@extends('admin.layout.layout')
@section('content')
<div class="main-panel">
     <div class="content-wrapper">
 

          <div class="row">
               <div class="col-12">
                 <div class="">
                   <div id="" class="">
                    <div class="row">
                         <div class="col-sm-12 col-md-6">
                              <h4>Lista Produktów</h4>
                         </div>
                         <div class="col-sm-12 col-md-6 text-right">
                              <p>
                                <button class="btn btn-outline-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                  Pokaż Filtry
                                </button>
                              </p>
                         </div>                         
                    </div>
                    <section class="mb-2">
                         <div class="collapse" id="collapseExample">
                              <div class="card card-body w-100">
                                   <form action="{{ route('product.index') }}" class="row" method="GET">
                                        @method('GET')
                                        @csrf
                                        <div class="col-md-2">
                                             <!-- KATEGORIE -->
                                             <div class="form-floating mb-3">
                                                  <select class="form-select" name="kategoria" id="kategoria" aria-label="Floating label select example">
                                                       <option value=""></option>
                                                       @foreach (App\Models\Admin\Category::where('brand', null)->get() as $category)
                                                            <option value="{{ $category->id }}" @if($request->kategoria == $category->id) Selected @endif>{{ $category->name }}</option>
                                                       @endforeach
                                                  </select>
                                                  <label for="kategoria">Kategoria</label>
                                             </div>                                             
                                        </div>

                                        <div class="col-md-2">
                                             <!-- NAZWA PRODUKTU -->
                                             <div class="form-floating mb-3">
                                               <input type="text" class="form-control" id="product_name" name="product_name" placeholder="name@example.com" value="{{ $request->product_name }}">
                                               <label for="product_name">Nazwa produktu</label>
                                             </div>                                             
                                        </div>

                                        <div class="col-md-2">
                                             <!-- PRODUKT ID -->
                                             <div class="form-floating mb-3">
                                               <input type="number" class="form-control" id="product_id" name="product_id" placeholder="produkt Id" value="{{ $request->product_id }}">
                                               <label for="product_id">Id produktu</label>
                                             </div>
                                        </div>

                                        <div class="col-md-2">
                                             <!-- PRODUKT EAN -->
                                             <div class="form-floating mb-3">
                                               <input type="number" class="form-control" id="product_ean" name="product_ean" placeholder="Numer EAN" value="{{ $request->product_ean }}">
                                               <label for="product_ean">EAN</label>
                                             </div>                                             
                                        </div>

                                        <div class="col-md-2">
                                             <!-- PRODUKT VAT -->
                                             <div class="form-floating mb-3">
                                               <input type="number" class="form-control" id="product_vat" name="product_vat" placeholder="VAT %" value="{{ $request->product_vat }}">
                                               <label for="product_vat">VAT</label>
                                             </div>                                             
                                        </div>

                                        <div class="col-md-2">
                                             <!-- STAN / ILOSC Od - Do -->
                                             <div class="d-flex input-group">
                                                  <div class="form-floating mb-3">
                                                       <input type="number" step="1" class="form-control" id="stan_od" name="stan_od" placeholder="Stan Od" value="{{ $request->stan_od }}">
                                                       <label for="stan_od">Stan od</label>
                                                  </div>
                                                  <div class="form-floating mb-3">
                                                       <input type="number" step="1" class="form-control" id="stan_do" name="stan_do" placeholder="Stan do" value="{{ $request->stan_do }}">
                                                       <label for="stan_do">do</label>
                                                  </div>
                                             </div>
                                        </div>

                                        <!-- NEW Row -->

                                        <div class="col-md-2">
                                             <!-- Cena Od - Do -->
                                             <div class="d-flex input-group">
                                                  <div class="form-floating mb-3">
                                                       <input type="number" class="form-control" id="cena_od" name="cena_od" placeholder="Cena od" value="{{ $request->cena_od }}">
                                                       <label for="cena_od">Cena od</label>
                                                  </div>
                                                  <div class="form-floating mb-3">
                                                       <input type="number" class="form-control" id="cena_do" name="cena_do" placeholder="Cena do" value="{{ $request->cena_do }}">
                                                       <label for="cena_do">do</label>
                                                  </div>
                                             </div>
                                        </div>

                                        <div class="col-md-2">
                                             <!-- Waga Od - Do -->
                                             <div class="d-flex input-group">
                                                  <div class="form-floating mb-3">
                                                       <input type="number" step="0.1" class="form-control" id="waga_od" name="waga_od" placeholder="Waga od" value="{{ $request->waga_od }}">
                                                       <label for="waga_od">Waga od</label>
                                                  </div>
                                                  <div class="form-floating mb-3">
                                                       <input type="number" step="0.1" class="form-control" id="waga_do" name="waga_do" placeholder="Waga do" value="{{ $request->waga_do }}">
                                                       <label for="waga_do">do</label>
                                                  </div>
                                             </div>
                                        </div>

                                        <div class="col-md-2">
                                             <!-- Wysokość Od - Do -->
                                             <div class="d-flex input-group">
                                                  <div class="form-floating mb-3">
                                                       <input type="number" step="0.01" class="form-control" id="wysokosc_od" name="wysokosc_od" placeholder="Wysokość od" value="{{ $request->wysokosc_od }}">
                                                       <label for="wysokosc_od">Wysokość od</label>
                                                  </div>
                                                  <div class="form-floating mb-3">
                                                       <input type="number" step="0.01" class="form-control" id="wysokosc_do" name="wysokosc_do" placeholder="Wysokość do" value="{{ $request->wysokosc_do }}">
                                                       <label for="wysokosc_do">do</label>
                                                  </div>
                                             </div>
                                        </div>

                                        <div class="col-md-2">
                                             <!-- Szerokość Od - Do -->
                                             <div class="d-flex input-group">
                                                  <div class="form-floating mb-3">
                                                       <input type="number" step="0.01" class="form-control" id="szerokosc_od" name="szerokosc_od" placeholder="Szerokość od" value="{{ $request->szerokosc_od }}">
                                                       <label for="szerokosc_od">Szerokość od</label>
                                                  </div>
                                                  <div class="form-floating mb-3">
                                                       <input type="number" step="0.01" class="form-control" id="szerokosc_do" name="szerokosc_do" placeholder="Szerokość do" value="{{ $request->szerokosc_do }}">
                                                       <label for="szerokosc_do">do</label>
                                                  </div>
                                             </div>
                                        </div>

                                        <div class="col-md-2">
                                             <!-- Głębokość Od - Do -->
                                             <div class="d-flex input-group">
                                                  <div class="form-floating mb-3">
                                                       <input type="number" step="0.01" class="form-control" id="glebokosc_od" name="glebokosc_od" placeholder="Głębokość od" value="{{ $request->glebokosc_od }}">
                                                       <label for="glebokosc_od">Głębokość od</label>
                                                  </div>
                                                  <div class="form-floating mb-3">
                                                       <input type="number" step="0.01" class="form-control" id="glebokosc_do" name="glebokosc_do" placeholder="Głębokość do" value="{{ $request->glebokosc_do }}">
                                                       <label for="glebokosc_do">do</label>
                                                  </div>
                                             </div>
                                        </div>

                                        <div class="col-md-2">
                                             <!-- PRODUCENCI -->
                                             <div class="form-floating">
                                                  <select class="form-select" id="producent" name="producent" aria-label="Producent">
                                                       <option value=""></option>
                                                       @foreach (App\Models\Admin\Supplier::all() as $supplier)
                                                            <option value="{{ $supplier->id }}" @if($request->producent == $supplier->id) selected @endif>{{ $supplier->title }}</option>
                                                       @endforeach
                                                  </select>
                                                  <label for="producent">Producent</label>
                                             </div>
                                        </div>

                                        <div class="col-md-6">
                                             <p>Znaleziono {{ $products->total() }} pasujących produktów.</p>
                                             {{ $products->appends(request()->query())->links() }}

                                        </div>
                                        <div class="col-md-6 text-right">
                                             <input class="btn btn-sm btn-outline-warning" type="reset" value="Wyczyść">
                                             <input class="btn btn-sm btn-outline-success" type="submit" value="Ustaw Filtry">
                                        </div>                                        
                                   </form>                              
                              </div>
                         </div>
                    </section>

                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<style>
.sticky-header thead {

    top: 60px; /* Ustaw tę wartość na wysokość paska nawigacji */
    background-color: white;

}
.fixed-table-header {
    position: fixed;
    top: 60px; /* Ustaw na wysokość paska nawigacji */
    right: 50px;
    display: none;
    background-color: white;
    z-index: 9005;
    border: solid 1px #fff;
}

</style>
                    <div class="row">
                         <div class="col-sm-12">
       
                              <table class="table sticky-header">
                                   <thead>
                                       <tr>
                                           <th class="fw-bold px-0 py-3"><input type="checkbox" disabled class="ml-2"></th>
                                           <th class="fw-bold px-0 py-3 sorting">@sortablelink('TITLE')</th>
                                           <th class="fw-bold px-0 py-3">STAN</th>
                                           <th class="fw-bold px-0 py-3">Cena</th>
                                           <th class="fw-bold px-0 py-3 sorting">@sortablelink('STATUS')</th>
                                           <th class="fw-bold px-0 py-3 sorting_disabled">ACTIONS</th>
                                       </tr>
                                   </thead>
                                   <tbody>


                                        @forelse($products as $product)
                                        <tr>
                                             <td class="m-0 pt-0 pr-0 pb-0 pl-2">
                                                  <input type="checkbox" name="product_id" id="">
                                             </td>
                                             <td class="m-0 p-0">
                                                  <a href="{{ route('product.show', [$product->id]) }}" class="nav-link">
                                                       {{ $product->title }}
                                                  </a>
                                                 <u>EAN:</u> {{ $product->ean_number }}  <u>ID:</u> {{ $product->id }} <u>SKU:</u> {{ $product->code}}  <br>
                                                 Waga: {{ $product->productDetail->weight }} Wysokość: {{ $product->productDetail->height }} Szerokość: {{ $product->productDetail->width }} Głębokość: {{ $product->productDetail->deepth }}
                                             </td>
                                             <td class="m-0 p-0">{{ $product->productStock->current_qty }} szt.</td>
                                             <td class="m-0 p-0">{{ $product->sale_price }} PLN</td>
                                             <td class="m-0 p-0">{{ $product->status }}</td>
                                             <td class="m-0 p-0">
                                                  <form action="{{ route('product.delete') }}" method="post">
                                                       @method('DELETE')
                                                       @csrf
                                                       <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                       <button type="sumbit" class="btn">Delete</button>
                                                  </form>
                                                  <a href="{{ route('product.edit', $product->id) }}" type="sumbit" class="btn">Edit</a>
                                             </td>

                                        </tr>
                          
                                        @empty
                                        <tr>
                                             <td colspan="6" class="border">Nic tu nie ma</td>
                                        </tr>

                                        @endforelse
                                        
                                        <tr>
                                             <td colspan="6" class="">
                                                  <a href="{{ route('product.create') }}" class="btn btn-primary float-right">Add new product</a>
                                             </td>
                                        </tr>
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
<script>

     $(document).ready(function() {
    var tableOffset = $(".table.sticky-header").offset().top;
    var $header = $(".table.sticky-header > thead").clone();
    var $fixedHeader = $('<table class="table"></table>').append($header).addClass("fixed-table-header");

    // Ustaw szerokość klonowanego nagłówka taką samą jak oryginalnej tabeli
    $fixedHeader.width($(".table.sticky-header").width());

    $("body").append($fixedHeader);

    $(window).on("scroll", function() {
        var currentScroll = $(window).scrollTop();
        
        if (currentScroll >= tableOffset && $fixedHeader.is(":hidden")) {
            $fixedHeader.show();
            
            // Ustaw szerokość każdej komórki w klonowanym nagłówku taką samą jak w oryginalnej tabeli
            var $originalCells = $(".table.sticky-header > thead > tr > th");
            $fixedHeader.find("th").each(function(index, cell) {
                $(cell).width($originalCells.eq(index).width());
            });
        } else if (currentScroll < tableOffset) {
            $fixedHeader.hide();
        }
    });

    // Aktualizuj szerokość klonowanego nagłówka i komórek, gdy okno jest przeskalowane
    $(window).on("resize", function() {
        $fixedHeader.width($(".table.sticky-header").width());
        var $originalCells = $(".table.sticky-header > thead > tr > th");
        $fixedHeader.find("th").each(function(index, cell) {
            $(cell).width($originalCells.eq(index).width());
        });
    });
});


</script>
     

     <!-- Footer -->
     @include('admin.layout.footer')

  </div><!-- end .main-panel -->


@endsection('content')