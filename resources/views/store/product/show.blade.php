@extends('front.layout.layout')

@section('content')
<div class="container d-flex">
@include('front.layout.menuBar')

        <div class="container border">
          <div class="my-4 pt-2 px-2 pb-0">
            <div class="card-title">
                <h2 class="text-center my-4">{{ $product->title }} <hr> {{ $product->title_en}} <h2>
            </div>
          
            <div class="card-body">
              <div class="row">
                <div class="col-md-4">
                  @if($product->productPhotos == null)
                    <div class="carousel slide">
                      Brak Zdjęcia
                    </div>
                  @else
                    <div id="carouselExample" class="carousel slide">
                      <div class="carousel-indicators">
                          @forelse($product->productPhotos->photo as $photo)
                            <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="{{ $loop->index }}" class="border @if($loop->first) active" @endif @if($loop->first) aria-current="true" @endif aria-label="photo"></button>
                          @empty
                            nie ma
                          @endforelse
                      </div>
                      <div class="carousel-inner">
                          @forelse($product->productPhotos->photo as $photo)
                          
                            <div class="carousel-item @if($loop->first) active @endif">
                              <img src="{{ asset($photo) }}" class="d-block w-100" alt="..." style="height: 220px;">
                            </div>
                          @empty
                            nie ma
                          @endforelse
                      </div>
                      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon bg-light" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                      </button>
                      <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                        <span class="carousel-control-next-icon bg-light" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                      </button>
                    </div>
                  @endif
                </div><!-- /col-md-4 -->
                <div class="col-md-4 p-0">
                  <div class="d-flex mb-2">
                      <div class="w-25">VAT</div>
                      <div class="flex-fill">{{ $product->vat }}%</div>
                  </div>
                  <div class="d-flex">
                      <div class="w-25">EAN</div>
                      <div class="flex-fill">{{ $product->ean_number }}</div>
                  </div>
                </div><!-- /col-md-4 -->
                <div class="col-md-4 bg-light">
                  <div id="message{{ $product->id }}" class="alert alert-primary invisible"></div>
                  <p class="p-2 fs-4 fw-normal">
                      Stan Magazynu: Jest
                  </p>
                  @auth
                    <div class="d-flex mb-3">
                     <div class="w-50">
                        Netto <span class="p-3 fs-5 fw-bold" style="color: #20c752">{{ $product->price }}</span> PLN
                      </div>
                      <div class="w-50">
                         Brutto <span class="p-3 fs-5 fw-bold" style="color: #00444e">{{ ($product->price*$product->vat)/100+$product->price}}</span> PLN
                      </div>
                    </div>
                    <div class="input-group flex-nowrap">
                      <span class="input-group-text" id="addon-wrapping">{{ $product->price}} zł</span>
                      <input type="number" id="item{{ $product->id }}" class="form-control" placeholder="" min="1" value="1" aria-label="Ilosc" aria-describedby="addon-wrapping">
                      <span class="input-group-text" id="addon-wrapping" role="button" onClick="addToCart({{$product->id}}, 'item{{ $product->id }}', {{Auth::user()->id}}, '{{ 'message'.$product->id }}')"><i class="mdi mdi-cart-plus"></i></span>
                    </div>
                  @elseguest
                    <p class="bg-warning">Musisz być zalogowany aby podziwiać nasze ceny</p>
                  @endauth 
                </div><!-- /col-md-4 -->
              </div><!-- /row -->
            
              <div class="row">
                <h3 class="">Opis:</h3>
                <div class="container">
                  @auth
                    <div class="p-2 row">
                      <div class="col-md-6">
                      {!! nl2br($product->productDescription->long_description) !!}
                      </div>
                      <div class="col-md-6">
                      {!! nl2br($product->productDescription->long_description_en) !!}
                      </div>


</div>
                  @elseguest
                    <p class="p-2">
                      Opis bedzie widoczny po zalogowaniu. <br>
                      Jesli posiadasz konto tutaj się <a href="{{ route('login') }}">zaloguj</a>, jesli nie posiadasz kontna, zachecamy do skozystania z formularza <a href="{{ route('register') }}" >rejestracji</a>.
                    </p>
                  @endauth
                </div>
                <div>
                  <b>Kategorie:</b>
                  @forelse($product->categories as $category)
                    <a href="{{ route('frontShow', $category->name) }}">{{ $category->name }}</a>, 
                  @empty
                     nie ma
                  @endforelse
                </div>
              </div><!-- /row -->
            </div><!-- /card-body -->
          </div><!-- /card -->
        </div><!-- /end container FEATURED products -->
</div>
    

    <script>
  Date.prototype.toDateInputValue = (function() {
    var local = new Date(this);
    local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
    return local.toJSON().slice(0,10);
});
    document.getElementById('datePicker').value = new Date().toDateInputValue();


function addToCart(productId, quantity, userId, messageBox) {
    let sessionId = '{{ session()->getId() }}';
    let qty = document.getElementById(quantity).value;
    console.log(qty);
    fetch('/api/add_to_cart', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}' // token CSRF dla Laravel
        },
        body: JSON.stringify({product_id: productId, quantity: qty, session_id: sessionId, user_id: userId})
    })
    .then(response => response.json())
    .then(data => {
        if(data.session_id && sessionId !== data.session_id) {
            sessionId = data.session_id;
            const cartSelect = document.getElementById('cart-select');

            // Stwórz nową opcję
            const newOption = document.createElement('option');
            newOption.value = sessionId;
            newOption.text = data.name; // Powinieneś tutaj użyć właściwej nazwy koszyka

            // Dodaj nową opcję do rozwijanej listy
            cartSelect.add(newOption);

            // Wybierz nowo dodaną opcję
            cartSelect.value = sessionId;
        }

        document.getElementById(messageBox).classList.remove('invisible');
        document.getElementById(messageBox).textContent = data.message; // Wartość `message` zostanie wyświetlona w elemencie o id `message`
       

        setTimeout(function() {
            document.getElementById(messageBox).classList.add("invisible");
        }, 2000); // 3000 ms (3 sekundy)
    });
}

</script>

    @endsection

